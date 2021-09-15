<?php
defined('BASEPATH') OR exit ("No direct script access allowed");

/**
* 
*/
class Info_cucian extends CI_Controller
{
	
	function __construct()
	{
		# code...
		
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function index(){
		$data['cucian'] = $this->M_Alan->get_data('cucian')->result();
		$data['kode_kain'] = $this->M_Alan->get_data('kode_kain')->result();
		$this->load->view('header');
		$this->load->view('Cucian/lihat_info', $data);
		$this->load->view('footer');
	}

	function tambah_info(){

		
		$nama_cucian = $this->input->post('nama_cucian');
		$harga_cucian = $this->input->post('harga_cucian');
		$Kapasitas_Tempat = $this->input->post('Kapasitas_Tempat');
		$harga_cucian = str_replace(".", "", $harga_cucian);
		
		$this->form_validation->set_rules('nama_cucian','Nama cucian','required');
		
		$this->form_validation->set_rules('harga_cucian','Harga cucian','required');
		
		if($this->form_validation->run() != false){
			$a = '';
			$data = array(
			
				'id_cucian' => $this->M_Alan->kode_cucian($a),
				'nama_cucian' => $nama_cucian,
				'harga_cucian' => $harga_cucian
				
			);
			$this->M_Alan->insert_data($data,'cucian');
			// $this->session->set_flashdata('pesan','Data berhasil di simpan');
			redirect(base_url().'Info_cucian?pesan=berhasil');

			


		}else{
			redirect(base_url().'Info_cucian?pesan=gagal');
		}


		


	}

	
	function ubah_info(){		
		
		$id_cucian = $this->input->post('id_cucian');
		$nama_cucian = $this->input->post('nama_cucian');
		$harga_cucian = $this->input->post('harga_cucian');
		$harga_cucian = str_replace(".", "", $harga_cucian);	
	
			$data = array(
				'id_cucian' => $id_cucian,
				'nama_cucian' => $nama_cucian,			
				'harga_cucian' => $harga_cucian
			);

			$where = array(
			'id_cucian' => $id_cucian		
			);

			$this->M_Alan->update_data($where,$data,'cucian');
			redirect(base_url().'Info_cucian?pesan=diubah');
		
	}

	

	function hapus_info($id){				
		$where = array(
			'id_cucian' => $id		
		);
		$this->M_Alan->delete_data($where,'cucian');		
		redirect(base_url().'Info_cucian?pesan=dihapus');
	}
}


  ?>