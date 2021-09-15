	<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-info text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "diubah"){
				echo "<div class='alert alert-info text-center'>Data berhasil di diubah.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "dihapus"){
				echo "<div class='alert alert-info text-center'>Data berhasil di hapus.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-warning text-center'>Gagal diproses, Silakan input kembali<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}else{
				echo "";
			}
		}
	?>

<div class="panel panel-default">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white"> <span class="glyphicon glyphicon-info-sign"></span> Informasi Cucian</div>
	</div>
	<div class="panel-body bg-success">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahInfo">
		<span class="glyphicon glyphicon-plus-sign"></span> Tambah Informasi
		</button>
		<br>
		<br>
		<div class="table-responsive">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable">
				<thead>
					<tr>
						<th>#</th>
						<th>Id Cucian</th>
						<th>Nama Cucian</th>
						<th>Harga</th>
						<th>Aksi</th>
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
							<td><?php echo $data->id_cucian ?></td>
							<td ><?php echo $data->nama_cucian ?></td>
							<td><?php echo "Rp. ".number_format($data->harga_cucian); ?></td>
												
							<td> 
								<a href="javascript:;" class="btn btn-sm btn-warning" 
								data-id="<?php echo $data->id_cucian ?>"
								data-nama="<?php echo $data->nama_cucian ?>"
								data-harga="<?php echo $data->harga_cucian ?>"
								data-toggle="modal" 
								data-target="#ubahInfo" ><span class="glyphicon glyphicon-edit"></span>  Ubah</a>

								<a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda ingin menghapus data ini')" href="<?php echo base_url().'Info_cucian/hapus_info/'.$data->id_cucian; ?>"><span class="glyphicon glyphicon-trash"></span> Hapus</a>

								
							</td>
						</tr>
						<?php }
					}
					?>
				</tbody>
			</table>
		</div>
	</div>


	<div class="panel-footer bg-info">
		<h4 class="text-center"><span class="glyphicon glyphicon-info-sign"></span> Informasi Kode Kain</h4>
		<br>
		<div class="table-responsive ">	
			<table class="table table-bordered table-hover table-striped" id="table-datatable1">
				<thead>
					<tr>
						<th>#</th>
						<th>Warna</th>
						<th>Status</th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($kode_kain as $kode_kain){ 
						?>
						<tr>
							<td><?php echo $no++; ?></td>
							<td><?php echo $kode_kain->warna ?></td>
							<td><?php
								$status = $kode_kain->status_kain;
								if($status == '1'){
									echo "Tersedia";
								}else{
									echo "Sedang digunakan";
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
</div><





<!-- Button trigger modal -->


<!-- Modal tambah -->
<div class="modal fade" id="tambahInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Tambah Informasi Cucian</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		       
				<form action="<?php echo base_url('Info_cucian/tambah_info') ?>" method="post"> 
					


					<div class="form-group">
						<label>Nama Cucian :</label>
						<input type="text" name="nama_cucian" class="form-control">		
						 <?php echo validation_errors('nama_cucian'); ?>
					</div>

				
					<div class="form-group">		
						<label>Harga Cucian :</label>
					
						<label style="margin-left: 20px; margin-right: 4px;">Rp. </label>
						<input style="width: 71%;border: 2px solid #ddd;border-radius:4px; padding: .3em 1em;" type="text"  name="harga_cucian" class="uang " >
						 <?php echo validation_errors('harga_cucian'); ?>		
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
<div class="modal fade" id="ubahInfo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Ubah Informasi Cucian</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		        
				<form action="<?php echo base_url('Info_cucian/ubah_info') ?>" method="post" class="form form-horizontal"> 
					
					<input type="hidden" name="id_cucian" class="form-control" id="id">
					<div class="form-group">
						<label>Nama Cucian</label>
						<input type="text" id="nama" name="nama_cucian" class="form-control" >		
						
					</div>
					
					<div class="form-group">		
						<label>Harga Cucian : </label>
						<label style="margin-left: 20px; margin-right: 4px;">Rp. </label>
						<input style="width: 72%;border: 2px solid #ddd;border-radius:4px; padding: .3em 1em;" type="text" id="harga" name="harga_cucian" class="uang" >
							
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


   	


<script type="text/javascript">
	$(document).ready(function(){

		$('.alert').fadeOut(8000);
		$("#table-datatable").dataTable();
		$("#table-datatable1").dataTable();
		$( '.uang' ).mask('000.000.000', {reverse: true});

		$('#ubahInfo').on('show.bs.modal', function(event){
			var div = $(event.relatedTarget);
			var modal = $(this);

			modal.find('#id').attr("value",div.data('id'));
			modal.find('#nama').attr("value",div.data('nama'));
			modal.find('#harga').attr("value",div.data('harga'));


		});

	

		

		
	});
</script>