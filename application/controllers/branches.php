<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branches extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('branchs');

		$data['title'] = "Branches | Petroleum Solutions Project Management";
		$data['branches'] = $this->branchs->getBranches();

		$this->load->view('header', $data);
		$this->load->view('branches/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('branchs');

		$data['title'] = "Create Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('branches/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('branchs');

		$data['title'] = "Edit Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('branches/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('branchs');

		$data['title'] = "Delete Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('branches/index');
		$this->load->view('footer');
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
