<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index() {
		$this->authorize();
		$this->load->model('usersModel');

		$data['title'] = "Users | Petroleum Solutions Project Management";
		$data['users'] = $this->usersModel->getRecords();

		$this->load->view('header', $data);
		$this->load->view('users/index');
		$this->load->view('footer');
	}

	public function create() {
		$this->authorize();
		$this->load->model('usersModel');

		if($_POST) {
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$email = $this->sanitize->trimAllLower($this->input->post('email'));
			$password = $this->input->post('password');

			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => $password
			);

			$this->usersModel->create($data);

			$this->session->set_flashdata('added', $name);
			redirect('users/index');
		}

		$data['title'] = "Add User | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('users/create');
		$this->load->view('footer');
	}

	public function edit() {
		$this->authorize();
		$this->load->model('usersModel');

		$data['users'] = $this->usersModel->getRecord($this->uri->segment(3));

		if($_POST) {
			$id = $this->input->post('id');
			$name = $this->sanitize->trimFirstCaps($this->input->post('name'));
			$email = $this->sanitize->trimAllLower($this->input->post('email'));
			$password = $this->input->post('password');

			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => $password
			);

			$this->usersModel->update($data, $id);

			$this->session->set_flashdata('updated', $name);
			redirect('users/index');
		}

		$data['title'] = "Edit User | Petroleum Solutions Project Management";

		$this->load->view('header', $data);
		$this->load->view('users/edit');
		$this->load->view('footer');
	}

	public function delete() {
		$this->authorize();
		$this->load->model('usersModel');

		$this->usersModel->delete($this->uri->segment(3));

		$this->session->set_flashdata('removed', urldecode($this->uri->segment(4)));
		redirect('users/index');
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
