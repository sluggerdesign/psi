<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

  public function index() {
    $this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Workmodel');

		$data['title'] = "Reports | Petroleum Solutions Project Management";
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();
    $data['branches_menu'] = $this->Branchesmodel->getActiveRecords(NULL);

    if($_POST) {
			$id = $this->input->post('branch');

			if ($id == "All") {
				redirect('reports');
			}

			$data['branches'] = $this->Branchesmodel->getRecord($id);
			$this->session->set_flashdata('filter', 'true');

		} else {
			$data['branches'] = $this->Branchesmodel->getActiveRecords(NULL);
		}

		$this->load->view('header', $data);
		$this->load->view('reports/index');
		$this->load->view('footer');
  }

  public function printme() {
    $this->authorize();
		$this->load->model('Branchesmodel');
		$this->load->model('Jobsmodel');
		$this->load->model('Workmodel');

    $data['title'] = "Reports | Petroleum Solutions Project Management";
		$data['jobs'] = $this->Jobsmodel->getRecords();
		$data['work'] = $this->Workmodel->getAllRecords();
    $data['branches'] = $this->Branchesmodel->getActiveRecords(NULL);

    $this->load->view('print_head', $data);
		$this->load->view('reports/printme');
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
