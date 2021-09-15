<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* 
*/
class Laporan extends CI_Controller
{
	
	function __construct()
	{
		# code...
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect(base_url().'Otentikasi_Pengguna?pesan=belumlogin');
		}
	}

	function lihat_laporan(){
		$data['laporan'] = $this->db->query("
			SELECT * FROM pelanggan, pesan, pemesanan, cucian, pembayaran, kode_kain,penerimaan WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and id_pemesanan=id_pembayaran and id_pemesanan=id_penerimaan  and pembayaran.status_bayar='lunas' and kode_kain.warna=penerimaan.kode  ORDER BY id_pembayaran ASC

			")->result();
		$this->load->view('header');
		$this->load->view('admin/v_laporan', $data);
		$this->load->view('footer');
	}

	// function laporan_selesai(){
	// 	$tgl_selesai = date('Ymd');
	// 	$id_pemesanan = $this->input->post('id_pemesanan');
	// 	$warna = $this->input->post('warna');

	// 	$data = array(
	// 		'status_layanan' => 'selesai',
	// 		'tgl_selesai' => $tgl_selesai,
	// 	);

	// 	$data1 = array(
	// 		'status_kain' => '1'
	// 	);

	// 	$where = array(
	// 		'id_pemesanan' => $id_pemesanan
	// 	);

	// 	$where1 = array(
	// 		'warna' => $warna
	// 	);

	// 	$this->M_Alan->update_data($where1,$data1,'kode_kain');
	// 	$this->M_Alan->update_data($where,$data,'pemesanan');
	// 	redirect(base_url().'Laporan/lihat_laporan?pesan=diubah');
	// }

	function filter(){					
		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');		
							
		$data['filter'] = $this->db->query("SELECT * FROM pelanggan, pesan, pemesanan, cucian, pembayaran, kode_kain,penerimaan WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and id_pemesanan=id_pembayaran and id_pemesanan=id_penerimaan  and pembayaran.status_bayar='lunas' and kode_kain.warna=penerimaan.kode   and date(tgl_pesan) >= '$dari' and date(tgl_pesan) <= '$sampai' ORDER BY id_pembayaran ASC")->result();	

		$this->load->view('header');
		$this->load->view('admin/v_laporanFilter', $data);
		$this->load->view('footer');
		
	}

	function laporan_cetak(){
		$dari = $this->input->get('dari');
		$sampai = $this->input->get('sampai');	
		if($dari != "" && $sampai != ""){					
			$data['filter'] = $this->db->query("SELECT * FROM pelanggan, pesan, pemesanan, cucian, pembayaran, kode_kain,penerimaan WHERE id_pelanggan=pelanggan and pemesanan=id_pemesanan and id_cucian=jenis_cucian and id_pemesanan=id_pembayaran and id_pemesanan=id_penerimaan  and pembayaran.status_bayar='lunas' and kode_kain.warna=penerimaan.kode   and date(tgl_pesan) >= '$dari' and date(tgl_pesan) <= '$sampai' ORDER BY id_pembayaran ASC")->result();
													
			$this->load->view('admin/v_laporanPrint',$data);			
		}else{
			redirect(base_url("Laporan/lihat_laporan"));	
		}		
	}


}

?>