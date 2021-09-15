	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "selesai"){
				echo "<div class='alert alert-success text-center'>Pesanan telah selesai, terima kasih<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-warning text-center'>Gagal menginput data, silakan periksa kembali.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					}
			else{
				echo "";
			}
		}
	?>

<div class="panel panel-default">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white"><span style="margin-right: 7px" class="glyphicon glyphicon-user"></span> Pengelolaan Pelanggan</div>
	</div>
	<div class="panel-body bg-success">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPelanggan">
		<span class="glyphicon glyphicon-plus-sign"></span> Tambah Pelanggan
		</button>
		<br>
		<br>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Pelanggan</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>No. HP</th>
						<th>Email</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($pelanggan as $data){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $data->id_pelanggan ?></td>
							<td><?php echo $data->nama_pelanggan ?></td>
							<td><?php echo $data->alamat_pelanggan ?></td>
							<td><?php echo $data->nohp_pelanggan ?></td>
							<td><?php echo $data->email_pelanggan ?></td>

							
												
							<td> 
								<a href="javascript:;" class="btn btn-sm btn-warning" 
								data-id_pelanggan="<?php echo $data->id_pelanggan ?>"
								data-nama_pelanggan="<?php echo $data->nama_pelanggan ?>"
								data-alamat_pelanggan="<?php echo $data->alamat_pelanggan ?>"
								data-nohp_pelanggan="<?php echo $data->nohp_pelanggan ?>"
								data-email_pelanggan="<?php echo $data->email_pelanggan ?>"
								data-toggle="modal" 
								data-target="#ubahPelanggan" ><span class="glyphicon glyphicon-edit"></span>  Ubah</a>

								<!-- <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini')" href="<?php echo base_url().'Info_cucian/hapus_info/'.$data->id_cucian; ?>"><span class="glyphicon glyphicon-trash"></span> </a> -->

								
							</td>
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
</div><





<!-- Button trigger modal -->


<!-- Modal tambah -->
<div class="modal fade" id="tambahPelanggan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Tambah Pelanggan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
				<?php echo validation_errors(); ?>
		       
				<form action="<?php echo base_url('P_Pelanggan/tambah_pelanggan') ?>" method="post"> 
					


					<div class="form-group">
						<label>Masukan nama :</label>
						<input type="text" name="nama_pelanggan" class="form-control">		
						 <?php echo validation_errors('nama_pelanggan'); ?>
					</div>

					<div class="form-group">		
						<label>Masukan alamat :</label>
							
						<textarea name="alamat_pelanggan" class="form-control"></textarea>	
						 <?php echo validation_errors('alamat_pelanggan'); ?>		
					</div>

					<div class="form-group">		
						<label>Masukan nomor HP :</label>
						<input id="nohp_pelanggan" type="text" name="nohp_pelanggan" class="form-control nohp"> <?php echo validation_errors('nohp_pelanggan'); ?>
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



<!-- Modal Ubah-->
<div class="modal fade" id="ubahPelanggan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Ubah Pelanggan</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		        
				<form action="<?php echo base_url('P_Pelanggan/ubah_pelanggan') ?>" method="post" class="form form-horizontal"> 
					
					<input type="hidden" name="id_pelanggan" class="form-control" id="id_pelanggan">
					<div class="form-group">
						<label>Masukan nama :</label>
						<input type="text" id="nama_pelanggan" name="nama_pelanggan" class="form-control">		
						 <?php echo validation_errors('nama_pelanggan'); ?>
					</div>

					<div class="form-group">		
						<label>Masukan alamat :</label>						
						<input type="text" name="alamat_pelanggan" class="alamat_pelanggan form-control">

					</div>

					<div class="form-group">		
						<label>Masukan nomor HP :</label>
						<input type="text"  name="nohp_pelanggan" class="nohp_pelanggan form-control nohp">			
					</div>
					<!-- <div class="form-group">		
						<label>Masukan Email :</label>

						<input type="email" id="email_pelanggan" name="email_pelanggan" class="form-control">			
					</div> -->

		              
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


   	


<script type="text/javascript">
	$(document).ready(function(){

		$('.alert').fadeOut(8000);
		$("#table-datatable").dataTable();



		$('#ubahPelanggan').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id_pelanggan').attr("value",div.data('id_pelanggan'));
			modal.find('#nama_pelanggan').attr("value",div.data('nama_pelanggan'));
			modal.find('#alamat_pelanggan').attr("value",div.data('alamat_pelanggan'));
			modal.find('.alamat_pelanggan').attr("value",div.data('alamat_pelanggan'));
			modal.find('.nohp_pelanggan').attr("value",div.data('nohp_pelanggan'));
			modal.find('#email_pelanggan').attr("value",div.data('email_pelanggan'));
		});

		$( '.nohp' ).mask('0000-0000-0000', {reverse: true});
		
		
	});
</script>