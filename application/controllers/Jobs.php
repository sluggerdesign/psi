<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Jobsmodel');
		$this->load->model('Branchesmodel');

		$data['branches'] = $this->Branchesmodel->getRecords();

		$data['title'] = "Jobs | Petroleum Solutions Project Management";
		$data['jobs'] = $this->Jobsmodel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('jobs/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('Jobsmodel');
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

			$this->Jobsmodel->create($data);
			$postid = $this->db->insert_id();

			$this->session->set_flashdata('added', $name);
			redirect('jobs/edit/' . $postid);
		}

		$data['title'] = "Add Project | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('jobs/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('Jobsmodel');
		$this->load->model('Branchesmodel');
		$this->load->model('Workmodel');
		$this->load->model('Tasksmodel');
		$this->load->model('Crewmodel');

		$data['branches'] = $this->Branchesmodel->getRecords();
		$data['jobs'] = $this->Jobsmodel->getRecord($this->uri->segment(3));
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

			$this->Jobsmodel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('jobs/index');
		}

		$data['title'] = "Edit Project | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('jobs/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('Jobsmodel');

		$this->Jobsmodel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('jobs/index');
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
