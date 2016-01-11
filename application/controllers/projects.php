<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Projectsmodel');
		$this->load->model('Branchesmodel');

		$data['branches'] = $this->Branchesmodel->getRecords();

		$data['title'] = "Projects | Petroleum Solutions Project Management";
		$data['projects'] = $this->Projectsmodel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('projects/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('Projectsmodel');
		$this->load->model('Branchesmodel');

		$data['branches'] = $this->Branchesmodel->getRecords();

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$number = $this->sanitize->trimFirstCaps($this->input->post('number'));
			$branch = $this->input->post('branch');

			$data = array(
				'name' => $name,
				'number' => $number,
				'branch' => $branch
			);

			$this->Projectsmodel->create($data);
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
		$this->load->model('Projectsmodel');
		$this->load->model('Branchesmodel');
		$this->load->model('Workmodel');
		$this->load->model('Tasksmodel');
		$this->load->model('Crewmodel');

		$data['branches'] = $this->Branchesmodel->getRecords();
		$data['projects'] = $this->Projectsmodel->getRecord($this->uri->segment(3));
		$data['work'] = $this->Workmodel->getRecords($this->uri->segment(3));
		$data['tasks'] = $this->Tasksmodel->getRecords();
		$data['crew'] = $this->Crewmodel->getRecords();

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

			$this->Projectsmodel->update($data, $id);

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
		$this->load->model('Projectsmodel');

		$this->Projectsmodel->delete($this->uri->segment(3));

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
