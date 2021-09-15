


<div style="font-size: 18px" class="selamat alert alert-success text-center"><?php echo "Selamat datang, <b>".$this->session->userdata('nama'); ?><span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>

<hr>

<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "selesai"){
				echo "<div class='alert alert-success text-center'>Pesanan selesai, terima kasih<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
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

<?php
	foreach ($pelanggan as $user) {
		# code...

	
?>


<div class="row bg-grey">
	<div class="col-lg-4 col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-shopping-cart"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>ID Pemesanan</div>
						<div class="huge">
							<?php
									if($user->id_pemesanan != ''){
										 echo $user->id_pemesanan ;
									}else{
										echo "Belum memesan";
									}
							?>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-lg-4 col-md-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-info-sign"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div>
							<?php

							if($user->jenis_cucian != 'BLC008'){

								if($user->jml_cucian != 0){
											echo $user->nama_cucian.' -- '.$user->jml_cucian.' pcs';
								}else{
									echo "";
								}
							}else{

								foreach ($penerimaan as $data) {			
									
									 if($data->berat != 0){
											echo $data->nama_cucian.' -- '.$data->berat.' kilo';
									}else{
										echo "";
									}
								}
							}
							?>
						</div>
						<div class="huge">
							<?php
							
								$paket = $user->paket;
								$jml_cucian = $user->jml_cucian;
								$jml_bayar ="";
								$harga_cucian = $user->harga_cucian;

								if($user->jenis_cucian != 'BLC008'){

									if($user->jml_cucian != 0){

										

										if($paket == 'reguler'){
											echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian);
										}else if($paket == 'express'){
											echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian*2);
										}
									}

								}else{

									foreach ($pembayaran as $d) {

										 if($d->jml_kilo != 0){
											$jml_bayar = 0;
											$bayar = 0;
											$satuan = $d->jml_total;
											$kiloan = $d->jml_kilo;
											$status = $d->status_bayar;

											if($satuan == 0){
												$jml_bayar = "Rp. ".number_format($jml_bayar=$kiloan);
												echo $jml_bayar;
											}else{
												$jml_bayar = "Rp. ".number_format($jml_bayar=$satuan);
												echo $jml_bayar;
												// ." -( ".$status." )-"
											}

											

										}else{
											echo "";
										}
									}
								}
							?>
						</div>
						
					</div>
				</div>
			</div>
			
		</div>
	</div>

	<div class="col-lg-4 col-md-4">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3 text-center">
						<i class="glyphicon glyphicon-retweet"></i>
					</div>
					<div class="col-xs-9 text-right">
						
						<div class="huge"> Status Layanan -( 
							<?php
								$status_layanan = $user->status_layanan;
								if($status_layanan == ''){
									echo " - ";
								}else if($status_layanan == 'diproses'){
									echo "sedang diproses";
								}else{
									echo $status_layanan;
								}
							 ?>  )-
						</div>			
					</div>
					<form action="<?php echo base_url('Hal_User/pesanan_selesai')?>" method="post">
					<input type="hidden" name="id_pemesanan" value="<?php echo $user->id_pemesanan ?>">
					<?php 
						if($status_layanan == 'selesai'){
					?>
					<button type="submit" name="submit" class="btn btn-success" style="width: 90%; margin-left: 10%" onclick="return confirm('apakah pesanan anda telah diambil?')">
						<span class="glyphicon glyphicon-ok-circle"></span> Pesanan Selesai
					</button>
					<?php
						}
					?>
					</form>
				</div>

			</div>
			
		</div>
	</div>

	

</div>
<?php } ?>
<hr>


<!-- Modal tambah -->
<div class="modal fade" id="pesan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Pesan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		       
				<form class="form form-horizontal" action="<?php echo base_url('Hal_User/pesan') ?>" method="post"> 
					<?php echo validation_errors(); ?>
					

					<div class="form-group">
						<label>Nama Pelanggan</label>
						<input  type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?php echo $this->session->userdata('id_user'); ?>">
						<input type="text" class="form-control" id="nama_pelanggan" disabled
						value="<?php echo $this->session->userdata('nama'); ?>" >
			
			        </div>

					<div class="form-group">		
						<label>Pilih Paket :</label>
						<input style="margin-left: 20px; margin-right: 5px"  type="radio" name="paket" <?php if(isset($paket) && $paket=="reguler") echo "checked"; ?> value="reguler" >Reguler
						<input style="margin-left: 20px; margin-right: 5px" type="radio" name="paket" <?php if(isset($paket) && $paket=="express") echo "checked"; ?> value="express" >Express
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
							<?php foreach($cucian as $c){ ?>
							<option value="<?php echo $c->id_cucian; ?>"><?php echo $c->nama_cucian; ?></option>
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
            	 <button type="submit" class="btn btn-primary" >Simpan</button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
               
               
				</form>
            </div>
        </div>
    </div>
</div>


<div id="infoCucian" class="text-center">
	
		<h4 class="btn btn-info"><span class="glyphicon glyphicon-info-sign"></span>  Informasi Cucian</h4>
	<hr>

	<div id="riwayat" class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable" >
				<thead>
					<tr>
						<th>#</th>
						<th>Nama Cucian</th>
						<th>Harga Cucian</th>
						
					
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($cucian as $data){ 
						if($data->nama_cucian != 'Kiloan'){
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->nama_cucian ?></td>
							<td><?php echo "Rp. ".number_format($data->harga_cucian) ?></td>


						</tr>
						<?php }
					}
					?>
				</tbody>
			</table>
		</div>

</div>




<script type="text/javascript">
	$('document').ready(function(){
		
		$('').fadeOut(8000);
		$('#riwayat').hide();
		$('.paket').hide();
		$('.berat').hide();
		$('.pesanMetode').hide();
		$("#table-datatable").dataTable();

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
		$('#pesan').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id_pelanggan').attr("value",div.data('id_pelanggan'));
			modal.find('#nama_pelanggan').attr("value",div.data('nama_pelanggan'));
			
			
		});

		$('#jml_cucian').keyup(function(){
			if($(this).val() > 99){
				alert('Angka maksimal input 99');
				$(this).val('');
			}
		});

		$('#infoCucian').click(function(){
			$('#riwayat').toggle();
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('.selamat').fadeOut(8000);
	});
</script>