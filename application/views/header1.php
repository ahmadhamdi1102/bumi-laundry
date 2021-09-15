<!DOCTYPE html>
<html>
<head>
  <title>Aplikasi Layanan Laundry</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/font-awesome.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css' ?>">
  <style type="text/css">
    .navbar-custom{
      text-decoration: none;
      color: white;
    }
    
  </style>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.mask.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/datatable/jquery.dataTables.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
</head>
<body>
  <nav  class="navbar navbar-default navbar-static bg-success sticky-top ">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('Hal_Utama'); ?>">Bumi Laundry </a>

      </div>
      
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
        
        <ul class="nav navbar-nav navbar-right">
          <li><a href="<?php echo base_url('Otentikasi_Pengguna'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>  
          
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  

  <div class="container-fluid">