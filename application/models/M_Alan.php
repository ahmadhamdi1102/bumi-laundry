<?php 

class M_Alan extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
 
	function insert2($table1, $table2,$data,$data2){
     $this->db->insert($table1,$data);
    return $this->db->insert($table2,$data2);
   }

   function insert4($table1, $table2, $table3,$data1, $data2, $data3){
     $this->db->insert($table1,$data1);
     $this->db->insert($table2,$data2);
     $this->db->insert($table3,$data3);
     return $this->db->insert($table4,$data4);
   }

   function multi_pemesanan(){
    $this->db->select('*');
    $this->db->from('pemesanan');
    $this->db->join('pesan', 'pesan.pemesanan=pemesanan.id_pemesanan');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan=pesan.pelanggan');
    $this->db->join('cucian', 'cucian.id_cucian=pemesanan.jenis_cucian');
    // $this->db->where("pembayaran_event.status='Belum Lunas'");
    $query = $this->db->get();  
    return $query->result_array();      
  }

   function kode_cucian($code){
       $this->db->select('RIGHT(cucian.id_cucian,3) as kode', FALSE);
       $this->db->order_by('id_cucian','DESC');
       $this->db->limit(1);

       $query = $this->db->get('cucian');
       if ($query->num_rows() <> 0) {
          $data =$query->row();
           $kode = intval($data->kode)+1;
       }
       else{
          $kode=1;
       }
       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $code = "BLC".$kodemax."";

       return $code;
  }

   function kode_pelanggan($code){
       $this->db->select('RIGHT(pelanggan.id_pelanggan,3) as kode', FALSE);
       $this->db->order_by('id_pelanggan','DESC');
       $this->db->limit(1);

       $query = $this->db->get('pelanggan');
       if ($query->num_rows() <> 0) {
          $data =$query->row();
           $kode = intval($data->kode)+1;
       }
       else{
          $kode=1;
       }
       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $code = "BLP".$kodemax."";

       return $code;
    }

    function kode_pemesanan($code){
       $this->db->select('RIGHT(pesan.pemesanan,3) as kode', FALSE);
       $this->db->order_by('pemesanan','DESC');
       $this->db->limit(1);

       $query = $this->db->get('pesan');
       if ($query->num_rows() <> 0) {
          $data =$query->row();
           $kode = intval($data->kode)+1;
       }
       else{
          $kode=1;
       }
       $tgl = date('Ymd');

       $kodemax = str_pad($kode,3, '0' , STR_PAD_LEFT);
       $code = $tgl.$kodemax."";

       return $code;
    }

    // function jumlah_bayar(){
    //     $this->db->select('SUM(j_bayar) as total');
    //     $this->db->from('pembayaran');
    //     // $this->db->where("pembayaran.status_bayar='lunas'");
    //     return $this->db->get()->row()->total;

    // }

}
?>
