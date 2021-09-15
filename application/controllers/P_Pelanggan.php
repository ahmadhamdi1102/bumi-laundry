<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class P_Pelanggan extends CI_Controller
{
	
	function __construct()
	{
		# code...
		
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function lihat_pelanggan(){

		$data['pelanggan'] = $this->M_Alan->get_data('pelanggan')->result();
		$this->load->view('header');
		$this->load->view('admin/v_pelanggan', $data);
		$this->load->view('footer');
	}

	function tambah_pelanggan(){
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$nohp_pelanggan = $this->input->post('nohp_pelanggan');
		$nohp_pelanggan = str_replace("-", "", $nohp_pelanggan);
	
		
		$this->form_validation->set_rules('nama_pelanggan','Nama ','required');
		$this->form_validation->set_rules('alamat_pelanggan','Alamat ','required');
		$this->form_validation->set_rules('nohp_pelanggan','Nomor HP','required');
		
		// $this->form_validation->set_rules('harga_cucian','Harga Tempat','required');
		
		if($this->form_validation->run() != false){
			$a = '';
			$data = array(
			
				'id_pelanggan' => $this->M_Alan->kode_pelanggan($a),
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'nohp_pelanggan' => $nohp_pelanggan,
				
				
			);

			$this->M_Alan->insert_data($data, 'pelanggan');
			
			redirect(base_url().'P_Pelanggan/lihat_pelanggan?pesan=berhasil');
	
		}else{
			redirect(base_url().'P_Pelanggan/lihat_pelanggan?pesan=gagal');
		}
	}

	function ubah_pelanggan(){
		$id_pelanggan = $this->input->post('id_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');
		$alamat_pelanggan = $this->input->post('alamat_pelanggan');
		$nohp_pelanggan = $this->input->post('nohp_pelanggan');
		$nohp_pelanggan = str_replace("-", "", $nohp_pelanggan);
	
		
		$this->form_validation->set_rules('nama_pelanggan','Nama Pelanggan','required');
		
		if($this->form_validation->run() != false){
			$data = array(
				'id_pelanggan' => $id_pelanggan,
				'nama_pelanggan' => $nama_pelanggan,
				'alamat_pelanggan' => $alamat_pelanggan,
				'nohp_pelanggan' => $nohp_pelanggan,
							
			);
			$where = array(
			'id_pelanggan' => $id_pelanggan		
			);

			$this->M_Alan->update_data($where,$data,'pelanggan');
			redirect(base_url().'P_Pelanggan/lihat_pelanggan?pesan=diubah');
	
		}else{
			$this->load->view('header');
			$this->load->view('admin/v_pelanggan');
			$this->load->view('footer');
		}
	}


}

?>