<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "berhasil"){
				echo "<div class='alert alert-success text-center'>Data berhasil di simpan.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "diubah"){
				echo "<div class='alert alert-success text-center'>Data berhasil di diubah.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
			}else if($_GET['pesan'] == "dihapus"){
				echo "<div class='alert alert-success text-center'>Data berhasil di hapus.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}else if($_GET['pesan'] == "diproses"){
				echo "<div class='alert alert-success text-center'>Data berhasil di proses.<span class='close' data-dismiss='alert' aria-label='close'>&times;</span></div>";
					
			}
			else{
				echo "";
			}
		}
	?>

<div class="panel panel-default">
	<div class="panel-heading" >
		<div class="panel-title text-center text-white"><span style="margin-right: 7px" class="glyphicon glyphicon-list-alt"></span> Laporan</div>
	</div>
	<div class="panel-body bg-success">

<section class="container">
	<div class="row ">
		<div class="col-md-8 col-md-offset-2 bg-warning">
			<form  method="post" action="<?php echo base_url().'Laporan/filter' ;?>">
 
				<div class="form-group col-md-4 col-sm-4" style="margin-top: 10px">
					<label style="margin-left: 50px">Dari Tanggal</label>	
					<input type="date" name="dari" class="form-control">

				</div>
				<div class="form-group col-md-4 col-sm-4" style="margin-top: 10px">
					<label style="margin-left: 50px">Sampai Tanggal</label>	
					<input type="date" name="sampai" class="form-control">
					
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
<div style="margin-left: 40%" class="btn-group btn-center">
	<a class="btn btn-warning btn-sm" href="#"><span class="glyphicon glyphicon-info-sign"></span>  Filter data sebelum mencetak  </a>	
	<a class="btn btn-default btn-sm" href="<?php echo base_url().'Laporan/laporan_cetak/?dari='.set_value('dari').'&sampai='.set_value('sampai') ?>"><span class="glyphicon glyphicon-print"></span> Cetak Laporan</a>	
</div>
<br>
	</div>


	<div class="panel-footer bg-success">
		<p class="text-center">&copy; ahmad hamdi</p>
	</div>

</div>