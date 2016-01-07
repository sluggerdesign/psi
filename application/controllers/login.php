<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  function index()
	{
		$username = $this->input->post('username', true);
	  $password = $this->input->post('password', true);

    if($username || $password)
    {
      //$password = md5($password);
      if($this->authentication->try_login(array('email' => $username, 'password' => $password))) {
		    redirect('dashboard');
		   }
    }

		$data['title'] = "Sign In | Petroleum Solutions Quote Management";

		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}
}
