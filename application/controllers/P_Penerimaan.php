<?php
defined('BASEPATH') OR exit ("No direct script access allowed");
/**
* 
*/
class P_Penerimaan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function lihat_penerimaan(){
		$data['penerimaan'] = 
		$this->db->query("SELECT * FROM pelanggan,pesan, pemesanan, cucian WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and pemesanan.status_layanan = 'belum diproses' ORDER BY id_pemesanan ASC")->result();
		$data['pelanggan'] = $this->M_Alan->get_data('pelanggan')->result();
		$data['cucian'] = $this->M_Alan->get_data('cucian')->result();
		// $data['kode_kain'] = $this->M_Alan->get_data('kode_kain')->result();
		$data['kode_kain'] = $this->db->query("SELECT * FROM kode_kain WHERE kode_kain.status_kain='1'")->result();
		$data['pesanan'] = $this->db->query("
			SELECT * FROM pelanggan, pesan, pemesanan, cucian, pembayaran, kode_kain,penerimaan WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and id_pemesanan=id_pembayaran and id_pemesanan=id_penerimaan   and kode_kain.warna=penerimaan.kode and pemesanan.status_layanan!='telah diambil' and pembayaran.status_bayar='lunas'  ORDER BY tgl_pesan ASC

			")->result();

		

		$this->load->view('header');
		$this->load->view('admin/v_penerimaan', $data);
		$this->load->view('footer');
	}

	function tambah_penerimaan(){
		$a = '';
		$tgl_pesan = date('Ymd');
		$paket = $this->input->post('paket');
		$jenis_cucian = $this->input->post('jenis_cucian');
		$jml_cucian = $this->input->post('jml_cucian');
		// $jml_bayar = $this->input->post('jml_bayar');
		// $berat = $this->input->post('berat');
		$id_pelanggan = $this->input->post('id_pelanggan');

		$this->form_validation->set_rules('paket','Paket ','required');
		$this->form_validation->set_rules('jenis_cucian','Jenis Cucian ','required');
		$this->form_validation->set_rules('jml_cucian','Jumlah cucian ','required');
		$this->form_validation->set_rules('id_pelanggan','Nama ','required');
		
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
				
			redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=berhasil');
		}else{
			redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=gagal');
		}

	}

	function ubah_penerimaan(){		
		
		$id_pemesanan = $this->input->post('id_pemesanan');
		$paket = $this->input->post('paket');
		$jenis_cucian = $this->input->post('jenis_cucian');
		$jml_cucian = $this->input->post('jml_cucian');
			
	
			$data = array(
			'id_pemesanan' => $id_pemesanan,
			'paket' => $paket,
			'jenis_cucian' => $jenis_cucian,
			'jml_cucian' => $jml_cucian
			
			);

			$where = array(
			'id_pemesanan' => $id_pemesanan		
			);

			$this->M_Alan->update_data($where,$data,'pemesanan');
			redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=diubah');
		
	}

	function proses_penerimaan(){
			$jml_kilo = 0;


			$id_pemesanan = $this->input->post('id_pemesanan');
			$jml_bayar = $this->input->post('jml_bayar');
			$berat = $this->input->post('berat');
			$kode = $this->input->post('kode');

			// $jml_kilo = $berat * 10000;
			$this->form_validation->set_rules('kode','Kode ','required');

	if($this->form_validation->run() != false){

		$data = array(
			'id_penerimaan' => $id_pemesanan,
			'kode' => $kode,
			'berat' => $berat

		);

		$data1 = array(

			'id_pembayaran' => $id_pemesanan,
			'jml_total' => $jml_bayar,
			'jml_kilo' => $jml_kilo,
			'status_bayar' => 'belum bayar'
		);

		$data2 = array(
			'status_kain' => '0'
		);

		$data3 = array(
			'status_layanan' => 'diproses'
		);

		$where = array(
			'id_pemesanan' => $id_pemesanan		
		);

		$where1 = array(
			'warna' => $kode
		);
		$this->M_Alan->update_data($where1,$data2,'kode_kain');
		$this->M_Alan->update_data($where,$data3,'pemesanan');
		$this->M_Alan->insert2('penerimaan','pembayaran', $data, $data1);

		$id_penerimaan = $id_pemesanan;

		$dataC['cetak'] = $this->db->query("
			SELECT * FROM pelanggan, pesan, pemesanan, cucian WHERE id_pemesanan='$id_penerimaan' and id_pelanggan=pelanggan and pemesanan='$id_penerimaan' and id_cucian=jenis_cucian   

			")->result();
				
		$this->load->view('admin/v_cetak',$dataC);
	}else{
		redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=gagal');
	}

	}


	function hapus_penerimaan($id){				
		$where = array(
			'id_pemesanan' => $id		
		);

		$where1 = array(
			'pemesanan' => $id
		);

		$this->M_Alan->delete_data($where,'pemesanan');
		$this->M_Alan->delete_data($where1,'pesan');				
		redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=dihapus');
	}


	function pesanan_selesai(){
		$tgl_selesai = date('Ymd');
		$id_pemesanan = $this->input->post('id_pemesanan');
		$warna = $this->input->post('warna');

		$data = array(
			'status_layanan' => 'selesai',
			'tgl_selesai' => $tgl_selesai,
		);

		$data1 = array(
			'status_kain' => '1'
		);

		$where = array(
			'id_pemesanan' => $id_pemesanan
		);

		$where1 = array(
			'warna' => $warna
		);

		$this->M_Alan->update_data($where1,$data1,'kode_kain');
		$this->M_Alan->update_data($where,$data,'pemesanan');
		redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=diubah');
	}

	function pesanan_diambil(){
		
		$id_pemesanan = $this->input->post('id_pemesanan');
		$warna = $this->input->post('warna');

		$data = array(
			'status_layanan' => 'telah diambil'
			
		);

		$where = array(
			'id_pemesanan' => $id_pemesanan
		);

		
		$this->M_Alan->update_data($where,$data,'pemesanan');
		redirect(base_url().'P_Penerimaan/lihat_penerimaan?pesan=diubah');
	}

	function cetak_penerimaan(){				
		$id_penerimaan = $this->input->post('id_pemesanan');

		$data['cetak'] = $this->db->query("
			SELECT * FROM pelanggan, pesan, pemesanan, cucian WHERE id_pemesanan='$id_penerimaan' and id_pelanggan=pelanggan and pemesanan='$id_penerimaan' and id_cucian=jenis_cucian   

			")->result();
				
		$this->load->view('admin/v_cetak',$data);	
	}

}


?>