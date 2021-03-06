<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Jobsmodel');
		$this->load->model('Branchesmodel');

		$data['title'] = "Jobs | Petroleum Solutions Project Management";
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['branches_menu'] = $this->Branchesmodel->getActiveRecords(NULL);

		if($_POST) {
			$id = $this->input->post('branch');
			switch ($id) {
		    case "All":
	        redirect('jobs');
		    case "All Completed":
					$data['branches'] = $this->Branchesmodel->getActiveRecords('1');
					$data['jobs'] = $this->Jobsmodel->getCompletedRecords();
					$this->session->set_flashdata('filter', 'completed');

					$this->load->view('header', $data);
					$this->load->view('jobs/index');
					$this->load->view('footer');
	        return;
		    default:
					$data['branches'] = $this->Branchesmodel->getRecord($id);
					$data['jobs'] = $this->Jobsmodel->getActiveRecords($id);
					$this->session->set_flashdata('filter', 'single');
			}
		} else {
			$data['branches'] = $this->Branchesmodel->getActiveRecords(NULL);
		}

		$this->load->view('header', $data);
		$this->load->view('jobs/index');
		$this->load->view('footer');
	}

	public function fetch() {
		$this->authorize();
		$this->load->model('Jobsmodel');

		$data['job'] = $this->Jobsmodel->getRecord($this->uri->segment(3));

		echo json_encode($data['job']);
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
			$completed = $this->input->post('completed');

			$data = array(
				'name' => $name,
				'number' => $number,
				'branch' => $branch,
				'completed' => $completed
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
		$data['assigned'] = $this->Crewmodel->getAssigned();
		$data['available'] = $this->Crewmodel->getAvailable();

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$number = $this->sanitize->trimFirstCaps($this->input->post('number'));
			$branch = $this->input->post('branch');
			$completed = $this->input->post('completed');

			if ($completed == true) {
				$data = array('assigned' => NULL);
				$this->Crewmodel->updateAssigned($data, $id);
			} else {
				$data = array('assigned' => 1);
				$this->Crewmodel->updateAssigned($data, $id);
			}

			$data = array(
				'name' => $name,
				'number' => $number,
				'branch' => $branch,
				'completed' => $completed
			);

			$this->Jobsmodel->update($data, $id);

			if ($completed == 1) {
				$this->session->set_flashdata('completed', $name);
			} else {
				$this->session->set_flashdata('updated', $name);
			}
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
