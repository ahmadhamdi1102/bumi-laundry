<!DOCTYPE html>
<html>
<head>
	<title>Login Bumi Laundry</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
	<style type="text/css">
		body{
			background-image: url("<?php echo base_url('assets/img/1.png')?>");
			background-size: 25%;
		

		}
	</style>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.mask.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.mask.min.js'; ?>"></script>
</head>
<body>	
	<div class="col-md-4 col-md-offset-4" style="margin-top: 20px">		
		<!-- <center>
			<h3>APLIKASI LAYANAN LAUNDRY BUMI LAUNDRY</h3>
			<h4>LOGIN</h4>
		</center> -->
		<br>
		<br>
		<br/>
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div class='alert alert-warning'>Login gagal! Email dan Password salah.</div>";
			}else if($_GET['pesan'] == "logout"){
				echo "<div class='alert alert-danger'>Anda telah logout.</div>";
			}else if($_GET['pesan'] == "belumlogin"){
				echo "<div class='alert alert-success'>Silahkan login dulu.</div>";
			}else if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success'>Data berhasil disimpan</div>";
			}if($_GET['pesan'] == "gagal1"){
				echo "<div class='alert alert-warning'>Gagal diproses, Silahkan input kembali</div>";
			}
		}
		?>
		<br/>
		<div class="panel panel-default">
			<!-- <div class="panel panel-heading">
				<a href="<?php echo base_url('Hal_Utama')?>" class="btn btn-success" style="width:100%">
					<span class="glyphicon glyphicon-home"> Kembali Ke Menu Utama</span>
				</a>
			</div>	 -->
			<div class="panel-body">
				
			
	
				<form method="post" action="<?php echo base_url().'Otentikasi_Pengguna/login' ?>">

					<div class="form-group">
						<label>Masukan Email : </label>
						<input type="text" name="email" placeholder="email" class="form-control">
						<?php echo form_error('email'); ?>
					</div>
					<div class="form-group">
						<label>Masukan Password : </label>
						<input type="password" name="password" placeholder="password" class="form-control">
						<?php echo form_error('password'); ?>
					</div>
					<div class="form-group">						
						<input style="width: 100%" type="submit" value="Login" class="btn btn-primary">
					</div>


				</form>

				
				
			</div>			

			<div class="panel panel-footer">
				<button style="width: 100%" type="button" class="btn btn-warning" data-toggle="modal" 	data-target="#daftar">
					Daftar
				</button>
				
				<div class="alert alert-warning text-center"><span style="margin-right: 10px" class="glyphicon glyphicon-info-sign"></span>Belum jadi Member, Yuk daftar Sekarang!!!</div>
			</div>
		</div>
	</div>	



<!-- Modal tambah -->
<div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                <h4 class="modal-title" id="modelTitleId">Form Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

		       
				<form action="<?php echo base_url('Pendaftaran/daftar') ?>" method="post"> 
					


					<div class="form-group">
						<label>Masukan nama :</label>
						<input type="text" name="nama_pelanggan" class="form-control">		
						 <?php echo validation_errors('nama_pelanggan'); ?>
					</div>

					<div class="form-group">		
						<label>Masukan alamat :</label>
						<textarea name="alamat_pelanggan" class="form-control"></textarea>			
					</div>

					<div class="form-group">		
						<label>Masukan nomor HP :</label>
						<input type="text" name="nohp_pelanggan" class="form-control nohp">			
					</div>
					
					<div class="form-group">		
						<label>Masukan alamat email :</label>
						<input type="email" name="email_pelanggan" class="form-control" min="13">			
					</div>

					<div class="form-group">		
						<label>Masukan password :</label>
						<input type="password" name="password" class="form-control">			
					</div>

					<!-- <div class="form-group">		
						<label>Masukan ulang password :</label>
						<input type="password" name="" class="form-control">			
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








<script type="text/javascript">
	$(document).ready(function(){

		$( '.nohp' ).mask('0000-0000-0000', {reverse: true});

		

		
	});
</script>

</script>
</body>

</html>