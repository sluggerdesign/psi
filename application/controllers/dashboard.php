<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Projectsmodel');
		$this->load->model('Workmodel');

		$data['title'] = "Dashboard | Petroleum Solutions Project Management";
		$data['branches'] = $this->Branchesmodel->getRecords();
		$data['projects'] = $this->Projectsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();

		$this->load->view('header', $data);
		$this->load->view('dashboard');
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
