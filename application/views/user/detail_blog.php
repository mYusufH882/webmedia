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
    <?php $this->load->view('component/banner_detail', $Blog); ?>
    
    
    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-8 main-content">
            
            <div class="post-content-body border rounded p-2">
            <h1><?= $Blog->judul_blog ?></h1>
            <?php $tgl = explode(" ", $Blog->dibuat); ?>
            <p><b>Dibuat tanggal :</b> <?= longdate_indo($tgl[0]); ?> <b>Jam :</b> <?= $tgl[1]; ?></p>

            <img src="<?= base_url('imblog/').$Blog->gambar_blog; ?>" class="img-fluid mx-auto d-block rounded" alt="<?= $Blog->judul_blog ?>">
                <p class="text-justify"><?= word_wrap($Blog->isi_blog) ?></p>
            </div>

            <!-- Tag Kategori -->
            <div class="col-md-3 border rounded pt-2 mt-3">
              <p>Categories: <a href="<?= base_url('kategoriblog/').$Blog->kategori_slug ?>" class="badge badge-success text-light">#<?= $Blog->kategori_nama ?></a></p>
            </div>

            <!-- Tombol Komentar -->
            <div class="col-md-3 pt-2 mt-3">
              <a href="#" data-toggle="modal" data-target="#komentar" class="btn btn-sm btn-success btn-block rounded text-light">Buat Komentar</a>
            </div>
            
            <!-- Alert -->
            <div class="col-md-8 pt-2">
              <?= $this->session->flashdata('msg'); ?>
            </div>

            <!-- Modal Buat Komentar -->
            <div class="modal fade" id="komentar" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="largeModal">Buat Komentar Anda</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="form-horizontal" method="post" action="<?php echo base_url('kirim_komen'); ?>">
                          <div class="modal-body">
                              <input type="hidden" class="form-control" name="slug" value="<?= $this->uri->segment(2) ?>">

                              <div class="form-group">
                                <input type="hidden" class="form-control" name="id" value="<?= $Blog->id_blog ?>">
                                <label for="name">Nama *</label>
                                <input type="text" class="form-control" name="nama" id="name" required>
                              </div>
                              <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                              </div>

                              <div class="form-group">
                                <label for="message">Pesan</label>
                                <textarea name="pesan" id="message" cols="30" rows="10" class="form-control" required></textarea>
                              </div>
                              <div class="form-group">
                                <input type="submit" value="Buat Komentar" class="btn btn-primary">
                                <button class="btn btn-secondary" data-dismiss="modal" data-hidden="true">Batalkan</button>
                              </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Block Comment -->
            <div class="pt-5">
              <h3 class="mb-5 border-top"><?= $hitungKomen ?> Comments</h3>
              <ul class="comment-list">

                <?php foreach($tampilkom->result() as $kom) { ?>
                <li class="comment border p-2 rounded">
                  <div class="vcard">
                    <img src="<?= base_url('profil/') ?>default.png" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?= $kom->komen_nama ?></h3>
                    <?php $waktu = explode(" ", $kom->tgl_komen); ?>
                    <div class="meta"><?= longdate_indo($waktu[0]) ?> pada jam <?= $waktu[1] ?></div>
                    <p><?= $kom->komen_isi ?></p>
                    <p><a href="#" data-toggle="modal" data-target="#balas<?= $kom->id_komen ?>" class="reply rounded">Balas</a></p>
                  </div>

                  <ul class="children border rounded p-2">
                    <?php foreach($this->db->get_where('komentar', ['komen_status' => $kom->id_komen])->result() as $tb) { ?>
                    <li class="comment">
                      <div class="vcard">
                        <img src="<?= base_url('profil/') ?>default.png" alt="Image placeholder">
                      </div>
                      <div class="comment-body">
                        <h3><?= $tb->komen_nama ?></h3>
                        <?php $time = explode(" ", $tb->tgl_komen); ?>
                        <div class="meta"><?= longdate_indo($time[0]) ?> Pada <?= $time[1] ?></div>
                        <p><?= $tb->komen_isi ?></p>
                      </div>
                    </li>
                    <?php } ?>
                  </ul>

                  <!-- Modal Balas Komentar -->
                  <?php foreach($tampilkom->result() as $km){ ?>
                  <div class="modal fade" id="balas<?= $km->id_komen ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="largeModal">Buat Balasan Komentar Anda</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <form class="form-horizontal" method="post" action="<?php echo base_url('balas_komen'); ?>">
                                <div class="modal-body">
                                    <input type="hidden" class="form-control" name="slug" value="<?= $this->uri->segment(2) ?>">

                                    <div class="form-group">
                                      <input type="hidden" class="form-control" name="idbalas" value="<?= $km->id_komen ?>">
                                      <input type="hidden" class="form-control" name="id" value="<?= $Blog->id_blog ?>">
                                      <label for="name">Nama *</label>
                                      <input type="text" class="form-control" name="nama" id="name" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="email">Email *</label>
                                      <input type="email" class="form-control" name="email" id="email" required>
                                    </div>

                                    <div class="form-group">
                                      <label for="message">Pesan</label>
                                      <textarea name="pesan" id="message" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                      <input type="submit" value="Buat Balasan" class="btn btn-success text-light">
                                      <button class="btn btn-secondary" data-dismiss="modal" data-hidden="true">Batalkan</button>
                                    </div>

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
                  <?php } ?>
                  
                </li>
                <?php } ?>

              </ul>
              <!-- END comment-list -->

            </div>

          </div>

          <!-- END main-content -->

          <div class="col-md-4 sidebar">
            <div class="sidebar-box search-form-wrap">
              <form action="#" class="search-form">
                <div class="form-group">
                  <span class="icon fa fa-search"></span>
                  <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter">
                </div>
              </form>
            </div>
            <!-- END sidebar-box -->
            <div class="sidebar-box border rounded p-2 mt-2">
              <div class="bio text-center">
                <img src="<?= base_url('profil/').$Blog->img_profil ?>" alt="Image Placeholder" class="img-fluid mb-5">
                <div class="bio-body">
                  <p><strong><?= $Blog->first_name ." ". $Blog->last_name ?></strong></p>
                  <p class="mb-4">Penulis Blog / Artikel ini. <br> <span class="small"><?php $tgl = explode(" ", $Blog->dibuat); echo longdate_indo($tgl[0]); ?></span> </p>
                  <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                  </p>
                </div>
              </div>
            </div>
            <!-- END sidebar-box -->  
            <div class="sidebar-box border rounded p-2">
              <h3 class="heading">Popular Posts</h3>
              <div class="post-entry-sidebar">
                <ul>
                  <?php foreach($popularBlog->result() as $pb) {  ?>
                    <li>
                      <a href="<?= base_url('viewblog/').$pb->slug_blog ?>">
                        <img src="<?= base_url('imblog/').$pb->gambar_blog ?>" alt="Image placeholder" class="mr-4">
                        <div class="text">
                          <h4><?= $pb->judul_blog ?></h4>
                          <div class="post-meta">
                            <?php $tgl = explode(" ", $pb->dibuat); ?>
                            <span class="mr-2"><?= longdate_indo($tgl[0]); ?> </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
            <!-- END sidebar-box -->

            <div class="sidebar-box border rounded p-2">
              <h3 class="heading">Categories</h3>
              <ul class="categories">
                  <?php foreach($totalKategori as $tk) { ?>
                    <li><a href="<?= base_url('kategoriblog/').$tk->kategori_slug ?>"><?= $tk->kategori_nama ?> <span>(<?= $tk->total ?>)</span></a></li>
                  <?php } ?>
              </ul>
            </div>
            <!-- END sidebar-box -->

            <!-- <div class="sidebar-box">
              <h3 class="heading">Tags</h3>
              <ul class="tags">
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
                <li><a href="#">Travel</a></li>
                <li><a href="#">Adventure</a></li>
                <li><a href="#">Food</a></li>
                <li><a href="#">Lifestyle</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Freelancing</a></li>
              </ul>
            </div>
          </div> -->
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5">
          <div class="col-12">
            <h2>Kategori Post</h2>
          </div>
        </div>

        <div class="row align-items-stretch retro-layout">
          
        <?php $bg = ['bg-warning','bg-success','bg-primary','bg-info','bg-dark','bg-danger']; $no = 0; ?>
        <?php if($getKategori->num_rows() < 0) { echo '<div class="col-md col-lg col-sm mb-4"><p>Belum adakategori yang dibuat.</p></div>'; } else { ?>
          <?php $no = 1; foreach($getKategori->result() as $gk){ ?>
            <div class="col-md-6 mb-4">

              <a href="<?= base_url('kategoriblog/').$gk->kategori_slug ?>" class="hentry mb-30 v-height gradient <?= $bg[$no++]; ?>">
                
                <div class="text text-sm">
                  <h2><?= $gk->kategori_nama ?></h2>
                  <p class="text-light"><?= word_limiter($gk->deskripsi_singkat, 5) ?></p>
                  <?php $waktu = explode(" ", $gk->dibuat_tgl) ?>
                  <span class="date"><?= longdate_indo($waktu[0]) ?></span>
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