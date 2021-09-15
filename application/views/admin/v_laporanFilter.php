<div class="panel panel-primary">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white">Laporan</div>
	</div>
	<div class="panel-body bg-success">

<section class="container">
	<div class="row ">
		<div class="col-md-8 col-md-offset-2 bg-warning">
			<form  method="post" action="<?php echo base_url().'Laporan/filter' ;?>">
 
				<div class="form-group col-md-4 col-sm-4" style="margin-top: 10px">
					<label style="margin-left: 50px">Dari Tanggal</label>	
					<input type="date" name="dari" class="form-control" value="<?php echo set_value('dari'); ?>">

				</div>
				<div class="form-group col-md-4 col-sm-4" style="margin-top: 10px">
					<label style="margin-left: 50px">Sampai Tanggal</label>	
					<input type="date" name="sampai" class="form-control" value="<?php echo set_value('sampai'); ?>">
					
				</div>	
				<div class="form-group col-md-4 col-sm-4" style="margin-top: 10px">
					<label>.</label>
					<input   type="submit" value="Filter " name="filter" class="btn btn-primary form-control ">
				</div>

			</form>
		</div>
	</div>
	
</section>
<br>
<div style="margin-left: 30%" class="btn-group btn-center">
	<a class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-info-sign"></span> Isi tanggal filter sebelum mencetak  </a>	
	<a class="btn btn-default btn-sm" href="<?php echo base_url().'Laporan/laporan_cetak/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Cetak Laporan</a>	
</div>
<br>

		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pembayaran</th>
						<th>Tanggal Pemesanan</th>
						<th>Tanggal Selesai</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Cucian</th>
						<th>Jumlah Bayar</th>
						<th>Kode Kain</th>
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
							<td><?php echo "Rp. ".number_format($data->j_bayar)  ?></td>
							<td><?php echo $data->warna ?></td>
							<td><?php echo $data->status_layanan ?></td>


						
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<div class="panel-footer bg-success">
		<p class="text-center">&copy; ahmad hamdi</p>
	</div>

</div>