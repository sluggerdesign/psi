<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

  public function index() {
    $this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Workmodel');

		$data['title'] = "Reports | Petroleum Solutions Project Management";
		$data['branches'] = $this->Branchesmodel->getActiveRecords();
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();

		$this->load->view('header', $data);
		$this->load->view('reports/index');
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
