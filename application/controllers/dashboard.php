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
					if ($j->branch == $b->id && $j->completed == NULL) {
						$o = new stdClass;
    				$o->id=$b->id;
    				$o->name=$b->name;
						array_push($data['branches'], $o);
					}
				}
			}
			$data['branches'] = array_map('json_encode', $data['branches']);
			$data['branches'] = array_unique($data['branches']);
			$data['branches'] = array_map('json_decode', $data['branches']);
			sort($data['branches']);
		}

		$this->load->view('header', $data);
		$this->load->view('dashboard');
		$this->load->view('footer');
	}

	public function filter() {
		$this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Workmodel');

		$id = $this->input->post('branch');

		if ($id == "All") {
			redirect('dashboard');
		}

		$data['title'] = "Dashboard | Petroleum Solutions Project Management";
		$data['branch'] = $this->Branchesmodel->getRecord($id);
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();
		$data['allbranches'] = $this->Branchesmodel->getRecords();

		if ($data['branch']) {
			$data['branches'] = array();
			foreach ($data['branch'] as $b) {
				foreach ($data['jobs'] as $j) {
					if ($j->branch == $b->id && $j->completed == NULL) {
						$o = new stdClass;
    				$o->id=$b->id;
    				$o->name=$b->name;
						array_push($data['branches'], $o);
					}
				}
			}
			$data['branches'] = array_map('json_encode', $data['branches']);
			$data['branches'] = array_unique($data['branches']);
			$data['branches'] = array_map('json_decode', $data['branches']);
			sort($data['branches']);
		}

		if ($data['allbranches']) {
			$data['dropbranches'] = array();
			foreach ($data['allbranches'] as $b) {
				foreach ($data['jobs'] as $j) {
					if ($j->branch == $b->id && $j->completed == NULL) {
						$o = new stdClass;
    				$o->id=$b->id;
    				$o->name=$b->name;
						array_push($data['dropbranches'], $o);
					}
				}
			}
			$data['dropbranches'] = array_map('json_encode', $data['dropbranches']);
			$data['dropbranches'] = array_unique($data['dropbranches']);
			$data['dropbranches'] = array_map('json_decode', $data['dropbranches']);
			sort($data['dropbranches']);
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
