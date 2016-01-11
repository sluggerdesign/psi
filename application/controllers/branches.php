<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Branchesmodel');

		$data['title'] = "Branches | Petroleum Solutions Project Management";
		$data['branches'] = $this->Branchesmodel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('branches/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('Branchesmodel');

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Branchesmodel->create($data);

			$this->session->set_flashdata('added', $name);
			redirect('branches/index');
		}

		$data['title'] = "Add Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('branches/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('Branchesmodel');

		$data['branch'] = $this->Branchesmodel->getRecord($this->uri->segment(3));

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Branchesmodel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('branches/index');
		}

		$data['title'] = "Edit Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('branches/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('Branchesmodel');

		$this->Branchesmodel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('branches/index');
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
