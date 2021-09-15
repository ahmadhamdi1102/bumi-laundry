<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Hal_User extends CI_Controller
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

		$id_user = $this->session->userdata('id_user');
		$data['cucian'] = $this->M_Alan->get_data('cucian')->result();
		
		$data['status'] = $this->db->query(
						"SELECT * FROM pemesanan, pesan, pelanggan, user, pembayaran, penerimaan, cucian WHERE id_user='$id_user' and id_pemesanan=pemesanan and id_pelanggan=pelanggan and id_user=id_pelanggan and id_pembayaran=id_pemesanan and id_penerimaan=id_pemesanan and id_cucian=jenis_cucian"
		)->result();

		$data['pelanggan'] = $this->db->query("
			SELECT * FROM pemesanan, pesan, pelanggan, cucian WHERE id_pemesanan=pemesanan and id_pelanggan=pelanggan and jenis_cucian=id_cucian and id_pelanggan='$id_user' and pemesanan.status_layanan!='telah diambil'

			")->result();
		$data['penerimaan'] = $this->db->query("
			SELECT * FROM penerimaan, pemesanan, cucian WHERE id_penerimaan=id_pemesanan and jenis_cucian=id_cucian and pemesanan.status_layanan!='telah diambil'

			")->result();
		$data['pembayaran'] = $this->db->query("
			SELECT * FROM pemesanan, pembayaran, penerimaan WHERE id_pemesanan=id_pembayaran and id_pemesanan=id_penerimaan and pemesanan.status_layanan!='telah diambil'

			")->result();

		$this->load->view('header2');
		$this->load->view('user/v_user', $data);
		$this->load->view('footer');
	}

	function pesan(){
		$a= '';
		$tgl_pesan = date('Ymd');
		$paket = $this->input->post('paket');
		$jenis_cucian = $this->input->post('jenis_cucian');
		$jml_cucian = $this->input->post('jml_cucian');
		$id_pelanggan = $this->input->post('id_pelanggan');

		$this->form_validation->set_rules('id_pelanggan','Id Pelanggan','trim|required');
		$this->form_validation->set_rules('paket','Paket','trim|required');
		
		if($this->form_validation->run() != false){
			$data = array(
				'id_pemesanan' => $this->M_Alan->kode_pemesanan($a),
				'tgl_pesan' => $tgl_pesan,
				'status_layanan' => 'belum diproses',
				'paket' => $paket,
				'jenis_cucian' => $jenis_cucian,
				'jml_cucian' => $jml_cucian

			);

			$data2 = array(

				'pemesanan' => $this->M_Alan->kode_pemesanan($a),
				'pelanggan' => $id_pelanggan
			);

			$this->M_Alan->insert2('pemesanan','pesan', $data, $data2);
				
			redirect(base_url().'Hal_User');
		}else{
				redirect(base_url().'Hal_User?pesan=gagal');			
		}


	}


	function pesanan_selesai(){
		$id_pemesanan = $this->input->post('id_pemesanan');
		$data = array(
				'status_layanan' => 'telah diambil'
				);

		$where = array(
				'id_pemesanan' => $id_pemesanan		
				);
		$this->M_Alan->update_data($where,$data,'pemesanan');
		redirect(base_url('Hal_User?pesan=selesai'));
	}
}

?>