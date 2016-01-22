<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crew extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('Crewmodel');

		$data['title'] = "Tasks | Petroleum Solutions Project Management";
		$data['crew'] = $this->Crewmodel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('crew/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('Crewmodel');

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Crewmodel->create($data);

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
		$this->load->model('Crewmodel');

		$data['crew'] = $this->Crewmodel->getRecord($this->uri->segment(3));

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));

			$data = array(
				'name' => $name
			);

			$this->Crewmodel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('crew/index');
		}

		$data['title'] = "Edit Branch | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('crew/edit');
		$this->load->view('footer');
	}

	public function getAssigned() {
		$this->authorize();
		$this->load->model('Crewmodel');

		$data['assigned'] = $this->Crewmodel->getAssigned();
		echo json_encode($data['assigned']);
	}

	public function delete() {
		$this->authorize();
		$this->load->model('Crewmodel');

		$this->Crewmodel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('crew/index');
	}

	// function parse()
	// {
	// 	$this->authorize();
	// 	$this->load->model('Crewmodel');
	//
	// 	$filename = "./uploads/crew.csv";
	//
	//     $handle = fopen("$filename", "r");
	//
	// 	$row = 0;
	//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
	//     {
	// 	    $row++;
	// 	    if ($row > 1) {
	// 	   		$data = array(
	// 	   			'name' => $data[0],
	// 	   			'branch' => $data[1],
	// 					'leader' => $data[2]
	// 	   		);
	// 	        $this->Crewmodel->create($data);
  //      	    }
 // 		}
  //    	fclose($handle);
	// }

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
