<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Hal_Admin extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		if($this->session->userdata('status') != "login" ){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function index(){
		$this->load->view('header');
		$this->load->view('admin/v_admin');
		$this->load->view('footer');
	}
}
?>