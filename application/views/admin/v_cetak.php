<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Layanan Laundry</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.css' ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css' ?>">
	<style type="text/css">
		
		
	</style>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.mask.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>

</head>
<body>
<div class="panel-body table-datatable1">
		<h3 class="text-center sembunyikan " style=" color: black; ">Nota Pemesanan Layanan Laundry</h3>
		<h5 class="text-center">BUMI LAUNDRY, Jl. Sukanagalih - Kota Bunga. Hp. 08121298992</h5>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped " id="table-datatable1">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pemesanan</th>
						<th>Tgl Pesan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Cucian</th>
						<th>Jumlah Bayar</th>
											
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($cetak as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pemesanan ?></td>
							<td><?php echo date('d/m/Y',strtotime($data->tgl_pesan)) ?></td>
											<td><?php echo $data->nama_pelanggan ?></td>
							<td><?php echo $data->alamat_pelanggan ?></td>
							<td><?php echo $data->nama_cucian ?></td>
							<td><?php
								$satuan = $data->jml_cucian;
								

								if($satuan == '0'){
									echo "   kg";
								}else{
									echo $satuan." pcs";
								}

							   ?></td>
							 <td><?php
								$paket = $data->paket;
								$jml_cucian = $data->jml_cucian;
								$jml_bayar ="";
								$harga_cucian = $data->harga_cucian;

								if($paket == 'reguler'){
									echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian);
								}else if($paket == 'express'){
									echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian*2);
								}



							 ?></td>
							
						</tr>
						

						<?php 
					}
					?>
				</tbody>
			</table>
			
		</div>
	</div>
</body>

<script type="text/javascript">
	window.print();
</script>