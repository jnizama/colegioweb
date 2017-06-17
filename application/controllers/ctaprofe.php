<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctaprofe extends CI_Controller {
  function __construct()
  {
    // Construct the parent class
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->database();

  }
  public function index()
	{
    $data['content'] = 'pages/ctaprofe/index'; //
		$this->load->helper('url');
    $this->load->view('layout/master', $data);
  }
  public function detailCTA()
	{
    $data['content'] = 'pages/ctaprofe/detailcta'; //
		$this->load->helper('url');
    $this->load->view('layout/master', $data);
  }
}
