<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Hal_Utama extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function index(){
		$data['cucian'] = $this->M_Alan->get_data('cucian')->result();
		$this->load->view('header1');
		$this->load->view('utama', $data);
		$this->load->view('footer');
	}



}



?>