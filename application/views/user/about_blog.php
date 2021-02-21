<?php $this->load->view('component/header'); ?>

<body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <?php $this->load->view('component/navbar', $getKategori); ?>
    
    <?php if($tentang['gambar_simpul'] == '') { ?>
      <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url() ?>assets/img/19385.jpg'); background-position:center; background-size: cover; background-repeat: no-repeat;">
    <?php } else { ?>
      <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url('gmtentang/').$tentang['gambar_simpul'] ?>'); background-position:center; background-size: cover; background-repeat: no-repeat;">
    <?php } ?>
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
              <h1><?= $tentang['judul_tentang'] ?></h1>
              <p class="lead mb-4 text-white"><?= $tentang['deskripsi_tentang'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6 order-md-2">
            <?php if($tentang['gambar_tentang'] == '') { ?>
              <img src="<?= base_url() ?>gmtentang/img.jpg" alt="Image" class="img-fluid">
            <?php } else { ?>
              <img src="<?= base_url('gmtentang/').$tentang['gambar_tentang'] ?>" alt="Image" class="img-fluid">
            <?php } ?>
          </div>
          <div class="col-md-5 mr-auto order-md-1">
            <h2 class="text-center"><?= $tentang['judul_tentang'] ?></h2>
            <p class="text-justify"><?= $tentang['isi_tentang'] ?></p>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-md-5 text-center">
            <h2>Meet The Team</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus commodi blanditiis, soluta magnam atque laborum ex qui recusandae</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 text-center">
            <img src="<?= base_url('assets/frontend/') ?>images/person_1.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
            <h2 class="mb-3 h5">Kate Hampton</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>

            <p class="mt-5">
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
              <a href="#" class="p-3"><span class="icon-instagram"></span></a>
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            </p>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 text-center">
            <img src="<?= base_url('assets/frontend/') ?>images/person_2.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
            <h2 class="mb-3 h5">Richard Cook</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>

            <p class="mt-5">
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
              <a href="#" class="p-3"><span class="icon-instagram"></span></a>
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            </p>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 text-center">
            <img src="<?= base_url('assets/frontend/') ?>images/person_3.jpg" alt="Image" class="img-fluid w-50 rounded-circle mb-4">
            <h2 class="mb-3 h5">Kevin Peters</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum neque nobis eos quam necessitatibus rerum aliquid est tempore, cupiditate iure at voluptatum dolore, voluptates. Debitis accusamus, beatae ipsam excepturi mollitia.</p>

            <p class="mt-5">
              <a href="#" class="p-3"><span class="icon-facebook"></span></a>
              <a href="#" class="p-3"><span class="icon-instagram"></span></a>
              <a href="#" class="p-3"><span class="icon-twitter"></span></a>
            </p>
          </div>
        </div>
      </div>
    </div> -->

    <?php $this->load->view('component/subindex'); ?>
    <?php $this->load->view('component/navfoot', $tentang); ?>
    
  </div>


<?php $this->load->view('component/footer'); ?>