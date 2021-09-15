<div style="font-size: 18px" class="selamat alert alert-success text-center"><?php echo "Selamat datang, <b>".$this->session->userdata('nama'); ?></div>

<hr>

<div class="row">
	<div class="col-lg-2 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-user"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->get_data('pelanggan')->num_rows(); ?>
						</div>
						<div>Jumlah Pelanggan</div>
					</div>
				</div>
			</div>
			<!-- <a href="<?php echo base_url().'P_Pelanggan/lihat_pelanggan' ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> -->
		</div>
	</div>

		
	<div class="col-lg-2 col-md-6">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-shopping-cart"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->edit_data(array('status_layanan'=>'belum diproses'),'pemesanan')->num_rows(); ?>
						</div>
						<div>Jumlah Pemesanan</div>
					</div>
				</div>
			</div>
			<!-- <a href="<?php echo base_url().'P_Penerimaan/lihat_penerimaan' ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> -->
		</div>
	</div>

	<div class="col-lg-2 col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-retweet"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->edit_data(array('status_layanan'=>'diproses'),'pemesanan')->num_rows(); ?>
						</div>
						<div>Jumlah Pesanan Diproses</div>
					</div>
				</div>
			</div>
			<!-- <a href="#">
				<div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> -->
		</div>
	</div>


	<div class="col-lg-2 col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-ok"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->edit_data(array('status_layanan'=>'selesai'),'pemesanan')->num_rows(); ?>
						</div>
						<div>Jumlah Pesanan Selesai</div>
					</div>
				</div>
			</div>
			<!-- <a href="#">
				<div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> -->
		</div>
	</div>

	<div class="col-lg-2 col-md-6">
		<div class="panel panel-danger">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-usd"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->edit_data(array('status_bayar'=>'belum bayar'),'pembayaran')->num_rows(); ?>
						</div>
						<div>Jumlah Belum Bayar</div>
					</div>
				</div>
			</div>
			<!-- <a href="<?php echo base_url().'P_Pembayaran/lihat_pembayaran' ?>">
				<div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div>
			</a> -->
		</div>
	</div>

	<div class="col-lg-2 col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-3">
						<i class="glyphicon glyphicon-info-sign"></i>
					</div>
					<div class="col-xs-9 text-right">
						<div class="huge">
							<?php echo $this->M_Alan->get_data('cucian')->num_rows(); ?>
						</div>
						<div>Jumlah Info Cucian</div>
					</div>
				</div>
			</div>
			<a href="<?php echo base_url().'Info_cucian' ?>">
				<!-- <div class="panel-footer">
					<span class="pull-left">Lihat Rincian</span>
					<span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
					<div class="clearfix"></div>
				</div> -->
			</a>
		</div>
	</div>



	

	
</div>
<hr>

<script type="text/javascript">
	$(document).ready(function(){
		$('.selamat').fadeOut(8000);
	});
</script>