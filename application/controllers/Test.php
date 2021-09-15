<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Test extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'login?pesan=belumlogin');
		}
	}

	function index(){
		
		$this->load->view('header');
		$this->load->view('content');
		$this->load->view('footer');


	}
}


  ?>