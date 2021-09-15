<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class P_Pembayaran extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function lihat_pembayaran(){
		$data['pembayaran'] = $this->db->query("
			SELECT * FROM pelanggan,pesan, pemesanan, cucian, pembayaran WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and id_pemesanan=id_pembayaran  and pembayaran.status_bayar='belum bayar'   ORDER BY id_pembayaran ASC

			")->result();
		$this->load->view('header');
		$this->load->view('admin/v_pembayaran', $data);
		$this->load->view('footer');
	}

	function bayar(){		
		
		$id_pembayaran = $this->input->post('id_pembayaran');
		$jml_bayar = $this->input->post('jml_bayar');
		
			
	
			$data = array(
			'id_pembayaran' => $id_pembayaran,
			'j_bayar' => $jml_bayar,
			'status_bayar' => 'lunas'
			);

			$where = array(
			'id_pembayaran' => $id_pembayaran		
			);

			$this->M_Alan->update_data($where,$data,'pembayaran');
			redirect(base_url().'P_Pembayaran/lihat_pembayaran?pesan=diubah');
		
	}

}

?>