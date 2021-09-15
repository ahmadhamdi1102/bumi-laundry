<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Pendaftaran extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
	}

	function daftar(){
		
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$nohp_pelanggan = $this->input->post('nohp_pelanggan');
		$password = $this->input->post('password');
		$email_pelanggan = $this->input->post('email_pelanggan');
		
		$nohp_pelanggan = str_replace("-", "", $nohp_pelanggan);
		$this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required');
		$this->form_validation->set_rules('alamat_pelanggan','Alamat Pelanggan','required');
		$this->form_validation->set_rules('nohp_pelanggan','Nomor HP Pelanggan','required');
		$this->form_validation->set_rules('password','Password Pelanggan','required');
		$this->form_validation->set_rules('email_pelanggan','Email Pelanggan','required');
		
		// $this->form_validation->set_rules('harga_cucian','Harga Tempat','required');
		
		if($this->form_validation->run() != false){
			$a = '';
			$data = array(
			
				'id_pelanggan' => $this->M_Alan->kode_pelanggan($a),
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'nohp_pelanggan' => $nohp_pelanggan,
				'email_pelanggan' => $email_pelanggan
				
			);

			$data2 = array
			(
				'id_user' => $this->M_Alan->kode_pelanggan($a),
				'nama' => $nama_pelanggan,
				'email' => $email_pelanggan,
				'level' => '1',
				'password' => md5($password),
			);

			$this->M_Alan->insert2('pelanggan','user', $data, $data2);
			
			redirect(base_url().'Otentikasi_Pengguna?pesan=berhasil');
	
		}else{
			redirect(base_url().'Otentikasi_Pengguna?pesan=gagal1');
		}


		


	}



}

?>