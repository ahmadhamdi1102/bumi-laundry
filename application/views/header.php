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

</head>
<body style="background-color: #f0f0f5">
	<nav  class="navbar navbar-default navbar-static ">
		<div style="font-size: 16px" class="container-fluid bg-dark">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url('Hal_Admin'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-home"></span>Bumi Laundry </a>
			</div>
			
			<div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					
					<li><a href="<?php echo base_url('P_Pelanggan/lihat_pelanggan'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-user"></span>Pengelolaan Pelanggan</a></li>
					<li><a href="<?php echo base_url('P_Penerimaan/lihat_penerimaan'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-shopping-cart"></span>Pengelolaan Penerimaan</a></li>
					
					<li><a href="<?php echo base_url('P_Pembayaran/lihat_pembayaran'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-usd"></span>Pengelolaan Pembayaran</a></li>
					<li><a href="<?php echo base_url('Info_cucian'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-info-sign"></span>Informasi Cucian</a></li>
					<li><a href="<?php echo base_url('Laporan/lihat_laporan'); ?>"><span style="margin-right: 7px" class="glyphicon glyphicon-list-alt"></span>Laporan</a></li>							
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url().'Otentikasi_Pengguna/logout'; ?>"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>	
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo "Halo, <b>".$this->session->userdata('email'); ?></b> <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>
								<a href="<?php echo base_url().'' ?>"><i class="glyphicon glyphicon-lock"></i> Ganti Password</a>
							</li>							
						</ul>
					</li>		 -->			
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	

	<div class="container-fluid">

