
  <div id="slideS" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#slideS" data-slide-to="0" class="active"></li>
      <li data-target="#slideS" data-slide-to="1"></li>
      <li data-target="#slideS" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img style="width: 70%; height: auto; margin-left: 15%" src="<?php echo base_url('assets/img/1.png');?>" alt="gambar1" >
      </div>

      <div class="item">
        <img style="width: 70%; height: auto; margin-left: 15%" src="<?php echo base_url('assets/img/2.png');?>" alt="gambar2" >
      </div>
    
      <div class="item">
        <img style="width: 70%; height: auto; margin-left: 15%" src="<?php echo base_url('assets/img/4.png');?>" alt="gambar3" >
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#slideS" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#slideS" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
</div>

 <!-- PRODUCT -->
    <section >
        <div class="container">
          <div class="row">
            <div class="col text-center" >
             <hr class="w-25">
              <h1>Mengapa harus di Bumi Laundry?</h1>
              <hr class="w-25">
             
            </div>
          </div>

          <div class="row text-center justify-content-between mt-3">

              <div class="col-sm-6 col-md-4 p-3">
                <img style="width: 50%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/12.jpg');?>">
                <h4 class="mt-3"><strong>Mesin Front Loading</strong></h4>
                <p>Menggunakan mesin front loading dengan sistem prosedur yang tepat sehingga kualitas terjamin</p>
              </div>

              <div class="col-sm-6 col-md-4 p-3">
                <img style="width: 70%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/5.png');?>">
                <h4 class="mt-3"><strong>Deterjen dan Pewangi</strong></h4>
                <p class="">Menggunakan Deterjen dan Pewangi yang berkualitas, pakaian menjadi tahan lama</p>
              </div>

            

               <div class="col-sm-6 col-md-4 p-3">
                 <img style="width: 50%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/6.png');?>">
                <h4 class="mt-3"><strong>Bersifat Personal</strong></h4>
                <p class="">Jaminan perorangan dengan tidak mencampur pakaian pelanggan pada proses pencucain</p>
              </div>

               <div class="col-sm-6 col-md-4 p-3">
                 <img style="width: 50%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/7.png');?>">
                <h4 class="mt-3"><strong>Sistem Kiloan</strong></h4>
                <p class="">Harga cuci dihitung berdasarkan berat pakaian sehingga harga jauh lebih hemat</p>
              </div>

               <div class="col-sm-6 col-md-4 p-3">
                 <img style="width: 70%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/8.png');?>">
                <h4 class="mt-3"><strong>Layanan Antar Jemput</strong></h4>
                <p class="">Memiliki fasilitas layanan antar jemput gratis</p>
              </div>

                <div class="col-sm-6 col-md-4 p-3">
                 <img style="width: 45%; height: auto" class="img img-cicle"  src="<?php echo base_url('assets/img/10.png');?>">
                <h4 class="mt-3"><strong>Water Filter</strong></h4>
                <p class="">Menggunakan air pencuci melalui proses penyaringan, mempertahankan warna pakaian</p>
              </div>

             

            </div>
      </div>
    </section>

    <!-- PRODUCT -->
    <section >
        <div class="container">
          <div class="row ">
            <div class="col text-center" >
             <hr class="w-25">
              <div class="btn btn-primary">Informasi Harga Cucian</div>
              <hr class="w-25">
             
            </div>
          </div>

          <div class="row text-center justify-content-between tampil">
             <div class="col text-center" >
              <div class="panel-body bg-success">
  
              <div class="table-responsive">  
                <table class="table table-bordered table-hover table-striped" id="table-datatable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nama Cucian</th>
                      <th>Harga</th>
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
                        <td ><?php echo $data->nama_cucian ?></td>
                        <td><?php echo "Rp. ".number_format($data->harga_cucian); ?></td>
                                  
                       
                      </tr>
                      <?php }
                    }
                    ?>
                  </tbody>
                </table>
              </div>

             </div>
            </div>
      </div>
    </section>

<div style="padding-top: 2px; padding-bottom: 2px" class="footer bg-success p-2 text-center">
	<h4>Jl. Raya Sukanagalih - Kota Bunga , Hp. 089663929440 </h4>
</div>

<script type="text/javascript">
  $(document).ready(function(){

    $('.tampil').hide();

    $('.btn-primary').click(function(){
        $('.tampil').toggle();
    });


  });
</script>