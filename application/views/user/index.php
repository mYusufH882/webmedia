<?php $this->load->view('component/header'); ?>

  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <?php $this->load->view('component/navbar'); ?>
    <?php $this->load->view('component/banner', $getKategori); ?>
    
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Artikel/Blog Terbaru</h2>
          </div>
        </div>

        <!-- Blog Terbaru -->
        <div class="row">
          <?php if($sumk->num_rows() == 0) { echo '<div class="col-lg col-md col-sm mb-4 p-2 ml-0 text-center"><p>Belum ada postingan.</p></div>'; } else { ?>
						<?php foreach($results->result() as $b){ ?> 
							<div class="col-lg-4 mb-4 p-2 ml-0">
								<div class="entry2 border">
									<a href="<?= base_url('viewblog/').$b->slug_blog ?>">
										<img src="<?= base_url('imblog/').$b->gambar_blog ?>" alt="Image" class="img-fluid mx-auto d-block">
									</a>
									<div class="excerpt">
									<span class="post-category text-white bg-secondary mb-3"><a href="<?= base_url('kategoriblog/').$b->kategori_slug ?>" class="text-light"><?= $b->kategori_nama ?></a></span>

									<h2><a href="<?= base_url('viewblog/').$b->slug_blog; ?>"><?= word_limiter($b->judul_blog, 20) ?></a></h2>
									<div class="post-meta align-items-center text-left clearfix">
										<figure class="author-figure mb-0 mr-3 float-left"><img src="<?= base_url('profil/').$b->img_profil ?>" alt="Image" width="150px" class="img-fluid"></figure>
										<span class="d-inline-block mt-1">By <a><?= $b->username ?></a></span>
										<?php $tgl = explode(" ", $b->dibuat); ?>
										<span>&nbsp;-&nbsp; <?= longdate_indo($tgl[0]) ?></span>
									</div>
									
										<p class="text-justify"><?= character_limiter($b->isi_blog, 125)  ?></p>
										<p><a href="<?= base_url('viewblog/').$b->slug_blog ?>">Read More</a></p>
									</div>
								</div>
							</div>
						<?php } ?>
          <?php } ?>

        </div>

        <!-- Pagination -->
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <?php echo $links ?>
            </div>
          </div>
        </div>

        <div class="row mb-5">
          <div class="col-12">
            <h2>Artikel/Blog Populer</h2>
          </div>
        </div>

        <div class="row">
							<?php $cek = $popularBlog->result();?>
							<?php if($popularBlog->num_rows() == 0) { echo "<div class='col-lg col-md col-sm mb-5 border-bottom p-2 ml-2 text-center'><p>Belum ada postingan yang populer.</p></div>"; } else {?>
								<?php foreach($cek as $pb) { ?>
										<div class="col-lg-4 col-md-4 mb-4 border p-2 ml-3">

												<a href="<?= base_url('viewblog/').$pb->slug_blog ?>" class="hentry mb-30 v-height">
													<img src="<?= base_url('imblog/').$pb->gambar_blog ?>" alt="Image placeholder" class="mx-auto d-block img-fluid">
													<div class="text gradient mt-2">
														<h4><?= $pb->judul_blog ?></h4>
														<div class="post-meta bg-light">
															<?php $tgl = explode(" ", $pb->dibuat); ?>
															<span class="mr-2 text-dark"><?= longdate_indo($tgl[0]); ?> </span>
														</div>
													</div>
												</a>

										</div>
								<?php } ?>
							<?php } ?>
        </div>

      </div>
    </div>

    <?php $this->load->view('component/subindex'); ?>
    <?php $this->load->view('component/navfoot', $tentang); ?>
    
  </div>

<?php $this->load->view('component/footer'); ?>
