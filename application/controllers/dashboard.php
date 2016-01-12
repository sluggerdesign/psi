<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Workmodel');

		$data['title'] = "Dashboard | Petroleum Solutions Project Management";
		$data['allbranches'] = $this->Branchesmodel->getRecords();
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();

		if ($data['allbranches']) {
			$data['branches'] = array();
			foreach ($data['allbranches'] as $b) {
				foreach ($data['jobs'] as $j) {
					if ($j->branch == $b->id) {
						$o = new stdClass;
    				$o->id=$b->id;
    				$o->name=$b->name;
						array_push($data['branches'], $o);
					}
				}
			}
			//$data['branches'] = array_unique($data['branches']);
			sort($data['branches']);
		}

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
