<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('crewModel');

		$data['title'] = "Tasks | Petroleum Solutions Project Management";
		$data['crew'] = $this->crewModel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('crew/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('crewModel');

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->crewModel->create($data);

			$this->session->set_flashdata('added', $name);
			redirect('crew/index');
		}

		$data['title'] = "Add Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('crew/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('crewModel');

		$data['crew'] = $this->crewModel->getRecord($this->uri->segment(3));

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->crewModel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('crew/index');
		}

		$data['title'] = "Edit Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('crew/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('crewModel');

		$this->crewModel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('crew/index');
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
