<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

  function index()
  {
    $this->authentication->logout();
    redirect('login');
  }
}
