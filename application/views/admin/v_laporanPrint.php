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
	<style type="text/css">
		.table-data{
			width: 100%;			
			border-collapse: collapse;			
		}
/*
		.table-data tr th,
		.table-data tr td{
			border:1px solid black;
			font-size: 10pt;
		}		*/
	</style>
</head>
<body>	
<a class="navbar-brand" href="<?php echo base_url('Hal_Admin'); ?>"><span class="glyphicon glyphicon-home"></span>   Bumi Laundry </a>	
<br>
<br>
	
	<h1 class="text-center">Laporan Layanan Laundry </h1>	
	<h2 class="text-center">Bumi Laundry</h2>
	

	<table>
		<tr>
			<td>Dari Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['dari'])); ?></td>
		</tr>
		<tr>
			<td>Sampai Tgl</td>
			<td>:</td>
			<td><?php echo date('d/m/Y',strtotime($_GET['sampai'])); ?></td>			
		</tr>
	</table>
	
	<br/>

			<table  class="table table-bordered table-striped" id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id</th>
						<th>Tgl Pesan</th>
						<th>Tgl Selesai</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Jenis Cucian</th>
						<th>Jumlah</th>
						<th>Status</th>
					
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($filter as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pembayaran ?></td>
							<td><?php echo date('d/m/Y',strtotime($data->tgl_pesan)) ?></td>
							<td><?php 
								$tgl_selesai = $data->tgl_selesai;
								if($tgl_selesai == NULL){
									echo " - - - ";
								}else{
								echo date('d/m/Y',strtotime($tgl_selesai)) ;
								}
								?></td>
								

							<td><?php echo $data->nama_pelanggan ?></td>
							<td><?php echo $data->alamat_pelanggan ?></td>
							<td><?php echo $data->nama_cucian ?></td>
							<td><?php
								$satuan = $data->jml_cucian;
								$berat = $data->berat;

								if($satuan == '0'){
									echo $berat." kg";
								}else{
									echo $satuan." pcs";
								}

							   ?></td>
							
							<td><?php echo $data->status_layanan ?></td>


						
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
	

<script type="text/javascript">
	window.print();
</script>

</body>
</html>
