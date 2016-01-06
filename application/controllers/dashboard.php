<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$this->authorize();
		//$this->load->model('dashboard');

		$data['title'] = "Dashboard | Petroleum Solutions Project Management";

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
