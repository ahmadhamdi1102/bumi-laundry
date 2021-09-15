<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Otentikasi_Pengguna extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_Alan');
	}

	public function index(){
		
		$this->load->view('login');
		
	}

	function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		if($this->form_validation->run() != false){
			$where = array(
				'email' => $email,
				'password' => md5($password)			
			);
			$data = $this->M_Alan->edit_data($where,'user');
			$d = $this->M_Alan->edit_data($where,'user')->row();
			$cek = $data->num_rows();
			if($cek > 0){
				$session = array(
					'level' => $d->level,
					'email'=> $d->email,
					'nama' => $d->nama,
					'id_user' => $d->id_user,
					'status' => 'login'
				);
				$this->session->set_userdata($session);

				if($this->session->userdata('level') == '0'){
					redirect(base_url().'Hal_Admin');
				}else if($this->session->userdata('level') == '1'){
					redirect(base_url().'Hal_User');
				}
				
			}else{
				redirect(base_url().'Otentikasi_Pengguna?pesan=gagal');			
			}
		}else{
			$this->load->view('login');
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url().'Otentikasi_Pengguna?pesan=logout');
	}
	
}
