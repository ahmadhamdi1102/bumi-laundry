<div style="font-size: 18px" class="alert alert-success text-center"><?php echo "Selamat datang, <b>".$this->session->userdata('nama'); ?><span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>

<hr>

<?php
	foreach ($tes as $user) {
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
								if($user->jml_cucian != 0){
										echo $user->nama_cucian.' -- '.$user->jml_cucian.' pcs';
									}else{
										echo $user->nama_cucian.' -- '.$user->jml_cucian.' kiloan';
									}
							?>
						</div>
						<div class="huge">
							<?php
							
								$paket = $user->paket;
								$jml_cucian = $user->jml_cucian;
								$jml_bayar ="";
								$harga_cucian = $user->harga_cucian;

								if($user->jml_cucian != 0){

									if($paket == 'reguler'){
										echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian);
									}else if($paket == 'express'){
										echo "Rp. ".number_format($jml_bayar = $jml_cucian * $harga_cucian*2);
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
						
						<div class="huge"> Status Layanan (-_
							<?php
								$status_layanan = $user->status_layanan;
								if($status_layanan == ''){
									echo " - ";
								}else if($status_layanan == 'diproses'){
									echo "sedang diproses";
								}else{
									echo $status_layanan;
								}
							 ?> _-)
						</div>			
					</div>
					<form action="<?php echo base_url('Hal_User/pesanan_selesai')?>" method="post">
					<input type="hidden" name="id_pemesanan" value="<?php echo $user->id_pemesanan ?>">
					
					<button type="submit" name="submit" class="btn btn-success" style="width: 90%; margin-left: 10%" onclick="return confirm('apakah pesanan anda telah diambil?')">
						<span class="glyphicon glyphicon-ok-circle"></span> Pesanan Selesai
					</button>
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
						<div class="pesanMetode alert-warning text-center"><span class="glyphicon glyphicon-info-sign "></span>  Hanya untuk <strong class="text-danger">PAKAIAN BIASA</strong> saja !</div>
					</div>
					
					<div class="paket form-group">
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
                <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" >Simpan</button>
               
				</form>
            </div>
        </div>
    </div>
</div>


<div id="tRiwayat" class="text-center">
	
		<h4 class="btn btn-info">Riwayat Pesanan</h4>
	<hr>

	<div id="riwayat" class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable" >
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pemesanan</th>
						<th>Tanggal Pemesanan</th>
						<th>Tanggal Selesai</th>
						<th>Jenis Cucian</th>
						<th>Jumlah Cucian</th>
						<th>Jumlah Bayar</th>
						<th>Status Pembayaran</th>
						<th>Status Layanan</th>
					
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($status as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pemesanan ?></td>
							<td><?php echo date('d/m/Y',strtotime($data->tgl_pesan)) ?></td>
							<td><?php 
								$tgl_selesai = $data->tgl_selesai;
								if($tgl_selesai == NULL){
									echo " - - - ";
								}else{
								echo date('d/m/Y',strtotime($tgl_selesai)) ;
								}
								?></td>
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
							<td><?php 
								$jml_bayar = 0;
								$bayar = 0;
								$satuan = $data->jml_total;
								$kiloan = $data->jml_kilo;

								if($satuan == 0){
									$jml_bayar = "Rp. ".number_format($jml_bayar=$kiloan);
									echo $jml_bayar;
								}else{
									$jml_bayar = "Rp. ".number_format($jml_bayar=$satuan);
									echo $jml_bayar;
								}

								if($satuan == 0){
									$bayar = $kiloan;
								}else{
									$bayar= $satuan;
								}

								


							 ?></td>
							<td><?php echo $data->status_bayar ?></td>
							<td><?php echo $data->status_layanan ?></td>


						</tr>
						<?php 
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

		$('#tRiwayat').click(function(){
			$('#riwayat').toggle();
		});
	});
</script>