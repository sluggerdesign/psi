<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Tasksmodel');

		$data['title'] = "Tasks | Petroleum Solutions Project Management";
		$data['tasks'] = $this->Tasksmodel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('tasks/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('Tasksmodel');

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Tasksmodel->create($data);

			$this->session->set_flashdata('added', $name);
			redirect('tasks/index');
		}

		$data['title'] = "Add Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('tasks/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('Tasksmodel');

		$data['task'] = $this->Tasksmodel->getRecord($this->uri->segment(3));

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Tasksmodel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('tasks/index');
		}

		$data['title'] = "Edit Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('tasks/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('Tasksmodel');

		$this->Tasksmodel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('tasks/index');
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
