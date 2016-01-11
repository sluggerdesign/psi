<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('projectsModel');
		$this->load->model('branchesModel');

		$data['branches'] = $this->branchesModel->getRecords();

		$data['title'] = "Projects | Petroleum Solutions Project Management";
		$data['projects'] = $this->projectsModel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('projects/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('projectsModel');
		$this->load->model('branchesModel');

		$data['branches'] = $this->branchesModel->getRecords();

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$number = $this->sanitize->trimFirstCaps($this->input->post('number'));
			$branch = $this->input->post('branch');

			$data = array(
				'name' => $name,
				'number' => $number,
				'branch' => $branch
			);

			$this->projectsModel->create($data);
			$postid = $this->db->insert_id();

			$this->session->set_flashdata('added', $name);
			redirect('projects/edit/' . $postid);
		}

		$data['title'] = "Add Project | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('projects/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('projectsModel');
		$this->load->model('branchesModel');
		$this->load->model('workModel');
		$this->load->model('tasksModel');
		$this->load->model('crewModel');

		$data['branches'] = $this->branchesModel->getRecords();
		$data['projects'] = $this->projectsModel->getRecord($this->uri->segment(3));
		$data['work'] = $this->workModel->getRecords($this->uri->segment(3));
		$data['tasks'] = $this->tasksModel->getRecords();
		$data['crew'] = $this->crewModel->getRecords();

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$number = $this->sanitize->trimFirstCaps($this->input->post('number'));
			$branch = $this->input->post('branch');

			$data = array(
				'name' => $name,
				'number' => $number,
				'branch' => $branch
			);

			$this->projectsModel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('projects/index');
		}

		$data['title'] = "Edit Project | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('projects/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('projectsModel');

		$this->projectsModel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('projects/index');
	}

	// Authentication

	private
	function authorize()
	{
	  if($this->session->userdata('name')) {
	  	return true;
	  } else {
		redirect('login');
		}
	}
}
