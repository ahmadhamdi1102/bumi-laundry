	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "diubah"){
				echo "<div class='alert alert-success text-center'>Data berhasil di diubah.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "dihapus"){
				echo "<div class='alert alert-danger text-center'>Data berhasil di hapus.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}else if($_GET['pesan'] == "diproses"){
				echo "<div class='alert alert-success text-center'>Data berhasil di proses.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}else if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-warning text-center'>Gagal diproses, Silakan input kembali<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}
			else{
				echo "";
			}
		}
	?>

<div class="panel panel-default">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white"><span class="glyphicon glyphicon-shopping-cart"></span>  Pengelolaan Penerimaan</div>
	</div>
	<div class="panel-body bg-success text-center">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPenerimaan">
		<span class="glyphicon glyphicon-plus-sign"></span> Tambah Pemesanan
		</button>
		<button type="button" class="btn btn-success tampilPesanan">
		<span class="glyphicon glyphicon-eye-open "></span>  Pesananan Diproses
		</button>
		<br>
		<br>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped " id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pemesanan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Tgl Pesan</th>
						<th>Paket</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Cucian</th>
						<th>Jumlah Bayar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($penerimaan as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pemesanan ?></td>
							<td><?php echo $data->nama_pelanggan ?></td>
							<td><?php echo $data->alamat_pelanggan ?></td>
							<td><?php echo date('d/m/Y',strtotime($data->tgl_pesan)) ?></td>
							<td><?php echo $data->paket ?></td>
							<td class="namaCucian"><?php echo $data->nama_cucian ?></td>
							<td ><?php echo $data->jml_cucian." pcs"; ?></td>
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
							

							
												
							<td> 
								 <a href="javascript:;" class="btn btn-sm btn-info" 
								data-id_pemesanan="<?php echo $data->id_pemesanan ?>"
								data-nama_pelanggan="<?php echo $data->nama_pelanggan ?>"
								data-jml_bayar="<?php echo $jml_bayar ?>"
								data-nama_cucian="<?php echo $data->nama_cucian ?>"
								data-jml_cucian="<?php echo $data->jml_cucian ?>"
								
								data-toggle="modal" 
								data-target="#prosesPenerimaan" ><span class="glyphicon glyphicon-retweet"></span>  Proses</a>

								<a href="javascript:;" class="btn btn-sm btn-warning" 
								data-id_pemesanan="<?php echo $data->id_pemesanan ?>"
								data-nama_pelanggan="<?php echo $data->nama_pelanggan ?>"
								data-id_cucian="<?php echo $data->id_cucian ?>"
								data-nama_cucian="<?php echo $data->nama_cucian ?>"
								data-jml_cucian="<?php echo $data->jml_cucian ?>"
								data-paket="<?php echo $data->paket ?>"
								data-toggle="modal" 
								data-target="#ubahPenerimaan" ><span class="glyphicon glyphicon-edit"></span>  Ubah</a>

								
							 	 <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini')" href="<?php echo base_url().'P_Penerimaan/hapus_penerimaan/'.$data->id_pemesanan; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>  

							 	<!--  <form action="<?php echo base_url('P_Penerimaan/cetak_penerimaan')?>" method="post">
										<input type="hidden" name="id_pemesanan" value="<?php echo $data->id_pemesanan ?>">
										
										<button type="submit" name="submit" class="btn btn-secondary">
											<span class="glyphicon glyphicon-print"></span>  Cetak
										</button>

									</form> -->
							   

								
							</td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<div class="panel-body bg-warning table-datatable1">
		<h4 class="text-center sembunyikan bg-success" style=" padding-top: 10px; padding-bottom: 10px; color: black; "> <span class="glyphicon glyphicon-eye-close "></span>  Pesanan Diproses</h4>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped " id="table-datatable1">
				<thead>
					<tr>
						<th>#</th>
						<!-- <th>Id Pemesanan</th> -->
						<th>Tgl Pesan</th>
						<th>Tgl Selesai</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Cucian</th>
						<th>Jumlah Bayar</th>
						<th>Kode Kain</th>
						<th>Status layanan</th>
						<th>Status Bayar</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($pesanan as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<!-- <td><?php echo $data->id_pemesanan ?></td> -->
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
							 <td><?php echo "Rp. ".number_format($data->j_bayar);
								// $paket = $data->paket;
								// $jml_cucian = $data->jml_cucian;
								// $jml_bayar ="";
								// $harga_cucian = $data->harga_cucian;

								// // if($paket == 'reguler'){
								// // 	echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian);
								// // }else if($paket == 'express'){
								// // 	echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian*2);
								// // }else{
								// // 	echo "";
								// // }

								// if($data->jml_kilo != 0){
								// 	echo "Rp. ".number_format($data->jml_kilo) ;
								// }else{
								// 	echo "Rp. ".number_format($data->jml_total) ;
								// }



							 ?></td>
							<td><?php echo $data->warna ?></td>
							<td><?php echo $data->status_layanan ?></td>
							<td><?php echo $data->status_bayar ?></td>


							<td> 


							<?php 
								if($data->status_layanan == "selesai" ){
									echo "-";
								}else if($data->status_layanan == "telah diambil"){
									echo "-";
								}else{	
							?>
									<!-- <a class="btn btn-sm btn-success" href="<?php echo base_url()?>"><span class="glyphicon glyphicon-ok"></span>  Selesai</a> -->

									<form action="<?php echo base_url('P_Penerimaan/pesanan_selesai')?>" method="post">
										<input type="hidden" name="id_pemesanan" value="<?php echo $data->id_pemesanan ?>">
										<input type="hidden" name="warna" value="<?php echo $data->warna ?>">
										<button type="submit" name="submit" class="btn btn-success">
											<span class="glyphicon glyphicon-ok"></span>  Selesai
										</button>

									</form>
							
									
							<?php
								}
							?>			

							<?php 
								if($data->status_layanan != "selesai" ){
									echo "-";
								}else if($data->status_layanan == "telah diambil"){
									echo "-";
								}else{	
							?>
									<!-- <a class="btn btn-sm btn-success" href="<?php echo base_url()?>"><span class="glyphicon glyphicon-ok"></span>  Selesai</a> -->

									<form action="<?php echo base_url('P_Penerimaan/pesanan_diambil')?>" method="post">
										<input type="hidden" name="id_pemesanan" value="<?php echo $data->id_pemesanan ?>">
										<input type="hidden" name="warna" value="<?php echo $data->warna ?>">
										<button type="submit" name="submit" class="btn btn-success">
											<span class="glyphicon glyphicon-ok"></span>  Diambil
										</button>

									</form>

									
							<?php
								}
							?>			


								
							</td>
						</tr>
						

						<?php 
					}
					?>
				</tbody>
			</table>
			
		</div>
	</div>

	

</div>





<!-- Button trigger modal -->


<!-- Modal tambah -->
<div class="modal fade" id="tambahPenerimaan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Tambah Pemesanan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		       <?php echo validation_errors(); ?>
				<form class="form form-horizontal" action="<?php echo base_url('P_Penerimaan/tambah_penerimaan') ?>" method="post"> 
					
					

					<div class="form-group">
						<label>Nama Pelanggan</label>
						<select name="id_pelanggan" class="form-control">
							<option value="">-Pilih Pelanggan-</option>
							<?php foreach($pelanggan as $p){ ?>
							<option value="<?php echo $p->id_pelanggan; ?>"><?php echo $p->nama_pelanggan; ?></option>
							<?php } ?>
						</select>	
						 <?php echo validation_errors('nama_pelanggan'); ?>
			
			        </div>

					<div class="form-group">		
						<label>Pilih Paket :</label>
						<input style="margin-left: 20px; margin-right: 5px"  type="radio" name="paket" <?php if(isset($paket) && $paket=="reguler") echo "checked"; ?> value="reguler" >Reguler
						<input style="margin-left: 20px; margin-right: 5px" type="radio" name="paket" <?php if(isset($paket) && $paket=="express") echo "checked"; ?> value="express" >Express
						<?php echo validation_errors('nama_pelanggan'); ?>
					</div>
					<div class="form-group">
						<label>Pilih Metode : </label>
						<button type="button" class="satuan btn btn-success" style="width: 40%">Satuan</button>
						<button type="button" class="kiloan btn btn-danger" style="width: 40%">Kiloan</button>
					</div>

					<div class=" form-group ">
						<div class="pesanMetode alert-warning text-center"><span class="glyphicon glyphicon-info-sign "></span>  Hanya untuk <strong class="text-danger">PAKAIAN BIASA</strong> saja ! Silahkan klik simpan untuk memesan</div>
					</div>
					
					<div class="paket form-group">
						<div style="font-size: 15px" class="alert-warning text-center"><span class="glyphicon glyphicon-info-sign "></span> <strong>JANGAN DIISI </strong> bila jenis cucian adalah <strong class="text-danger">KILOAN</strong> ! Silahkan klik simpan untuk memesan</div>
						<label>Jenis Cucian : </label>
						<select name="jenis_cucian" class=" form-control">
							<option value="BLC008">-Pilih Jenis Cucian-</option>
							<?php foreach($cucian as $c){
								if($c->nama_cucian != "Kiloan"){
							 ?>
							<option  value="<?php echo $c->id_cucian; ?>">
								<div id="cucian" ><?php echo $c->nama_cucian; ?></div>
								<!--  <span id="harga"><?php echo "_**_ Rp. ".number_format($c->harga_cucian); ?></span> -->
								<!-- <span><?php 
								$harga = $c->harga_cucian;
								echo $harga  ?></span> -->

							</option>
							 
						<?php }} ?>
						</select>						
			
			        </div>	



			        <div class="paket form-group">
			        	<label>Jumlah Cucian : </label>
			        	<input id="jumlah" type="text" name="jml_cucian" class=" form-control">
			        </div>

			      
			       <!--   <div class="paket form-group">
			        	<label>Total Harga : </label>
			        	<input type="text" name="" id="total" class="form-control">
			        </div> -->
			      
					
                </div>
            </div>
            <div class="modal-footer">
                
                <button type="submit" class="btn btn-primary" >Simpan</button>
              	<button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
				</form>
            </div>
        </div>
    </div>
</div>



<!-- Modal Ubah-->
<div class="modal fade" id="ubahPenerimaan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Ubah Penerimaan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		        
				<form action="<?php echo base_url('P_Penerimaan/ubah_penerimaan') ?>" method="post" class="form form-horizontal"> 
					
					<input type="hidden" name="id_pemesanan" class="form-control" id="id_pemesanan">
					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan" readonly>
			        </div>

					<div class="form-group">		
						<label>Paket (sebelumnya) :</label>
						<input class="paket1 text-center" type="text" style="width:30%;border:0; font-size: 16px" disabled>
						<input  style="margin-left: 20px; margin-right: 5px"  type="radio" name="paket" <?php if($paket=="reguler") echo "checked"; ?> value="reguler" >Reguler
						<input  style="margin-left: 20px; margin-right: 5px" type="radio" name="paket" <?php if( $paket=="express") echo "checked"; ?> value="express" >Express
					</div>
					<div class="form-group">
						<label>Pilih Metode : </label>
						<button type="button" class="satuan btn btn-success" style="width: 40%">Satuan</button>
						<button type="button" class="kiloan btn btn-danger" style="width: 40%">Kiloan</button>
					</div>

					<div class=" form-group ">
						<div class="pesanMetode alert-warning text-center"><span class="glyphicon glyphicon-info-sign "></span>  Hanya untuk <strong class="text-danger">PAKAIAN BIASA</strong> saja !</div>
					</div>
					
					<div class="paket form-group">
						<label ">Jenis Cucian (sebelumnya) : </label>
						<input class="text-center" id="nama_cucian"  type="text" style="border: 0;  margin-left: 10px; font-size: 17px" disabled>
						<select  name="jenis_cucian" class=" form-control">
							<option id="id_cucian" placeholder="ubah">~ Ubah ~</option>
							<?php foreach($cucian as $c){ ?>
							<option id="cucian"  value="<?php echo $c->id_cucian; ?>"><?php echo $c->nama_cucian; ?></option>
							<?php } ?>
						</select>	
			
			        </div>	
			        <div class="paket form-group">
			        	<label>Jumlah Cucian : </label>
			        	<input type="number" id="jml_cucian" name="jml_cucian" class=" form-control">
			        </div>									
					

		              
                </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-primary">ubah</button>
                 <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
            	</form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Proses-->
<div class="modal fade" id="prosesPenerimaan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Proses Penerimaan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		        
				<form action="<?php echo base_url('P_Penerimaan/proses_penerimaan') ?>" method="post" class="form form-horizontal"> 
					
					<input type="hidden" name="id_pemesanan" class="form-control" id="id_pemesanan">
					<input id="jml_bayar" class="form-control" type="hidden" name="jml_bayar" >
						
					<div class="form-group">
						<label>Nama Pelanggan :</label>
						<input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan" readonly>
			        </div>

			        <div class="form-group">
						<label>Jenis Cucian :</label>
						<input class="form-control" type="text" id="nama_cucian" readonly>
			        </div>

			        <div class="form-group">
						<label>Jumlah Cucian :</label>
						<input class="form-control" type="text" id="jml_cucian" readonly>
			        </div>

			        <div class="form-group">
						<label ">Kode Kain : </label>
						<select  name="kode" class=" form-control">
							<option value="">~ Pilih Kode Kain~</option>
							<?php foreach($kode_kain as $kk){ ?>
							<option  value="<?php  echo $kk->warna; ?>"><?php  echo $kk->warna; ?></option>
							<?php } ?> 
						</select>	
						 <?php echo validation_errors('kode'); ?>
			
			        </div>	

			        <div class="form-group">
			        	<div style="font-size: 14px" class="alert-warning text-center"><span class="glyphicon glyphicon-info-sign"></span>  Bila jenis cucian = <strong>Kiloan</strong>. Klik tombol kilo!.</div>			        	
			        </div>
			        

			        <div class="form-group">
			        	<button type="button" style="width: 100%" class="button btn btn-success text-center" id="kilo">Kilo</button>
			    	</div>


			         <div class="berat form-group">
						<label>Berat (Kg) :<span style="margin-left: 30px" class="glyphicon glyphicon-info-sign"></span> Gunakan titik( . ) untuk tanda desimal misalkan 9.8</label>
						<input id="berat" class="form-control" type="number" step="0.1" min="0" max="99" name="berat" placeholder="0.0">
			        </div>



					
			      

					
                </div>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-primary">Proses</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                
            	</form>
            </div>
        </div>
    </div>
</div>


   	


<script type="text/javascript">
	$(document).ready(function(){

		$('.alert').fadeOut(8000);
		$('.paket').hide();
		$('.berat').hide();
		$('.pesanMetode').hide();
		$("#table-datatable").dataTable();
		$("#table-datatable1").dataTable();

		$('.satuan').click(function(){
			$('.paket').toggle();
			$('.pesanMetode').hide();
		});

		$('#kilo').click(function(){
			$('.berat').toggle();
		});

		$('.kiloan').click(function(){
			$('.pesanMetode').toggle();
			$('.paket').hide();
		});

		$('#ubahPenerimaan').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id_pemesanan').attr("value",div.data('id_pemesanan'));
			modal.find('#nama_pelanggan').attr("value",div.data('nama_pelanggan'));
			modal.find('#jml_cucian').attr("value",div.data('jml_cucian'));
			modal.find('#id_cucian').attr("value",div.data('id_cucian'));
			modal.find('#nama_cucian').attr("value",div.data('nama_cucian'));
			modal.find('#paket').attr("value",div.data('paket'));
			modal.find('.paket1').attr("value",div.data('paket'));
		});

		$('#prosesPenerimaan').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id_pemesanan').attr("value",div.data('id_pemesanan'));
			modal.find('#nama_pelanggan').attr("value",div.data('nama_pelanggan'));
			modal.find('#jml_bayar').attr("value",div.data('jml_bayar'));
			modal.find('#nama_cucian').attr("value",div.data('nama_cucian'));
			modal.find('#jml_cucian').attr("value",div.data('jml_cucian'));
			
		
							
		});

		$('#jumlah').keyup(function(){
			var jumlah = parseInt($('#jumlah').val());
			var harga = parseInt($('#harga').val());
			var totalBayar = 0;
			parseInt(totalBayar = jumlah * harga);

			$('#total').val(totalBayar);
		});

		$('#berat').keyup(function(){
			if($(this).val() > 100){
				alert('Angka maksimal input 99.9');
				$(this).val('');
			}
		});

		$('.table-datatable1').hide();

		$('.tampilPesanan').click(function(){
			$('.table-datatable1').toggle();
		});

		$('.sembunyikan').click(function(){
			$('.table-datatable1').hide();
		});

		

		
	});
</script>
