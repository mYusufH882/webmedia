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

        <div class="py-5" style="background-image: url('<?= base_url() ?>assets/img/19385.jpg'); background-position:center; background-size: cover; background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 bg-light">
                        <h3>Kategori <?= ucfirst($byKategori->kategori_slug); ?></h3>
                        <p><?= $byKategori->deskripsi_singkat ?></p>
                        <p><b>Jumlah Blog : <?= $kBlog ?></b></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section bg-white">
            <div class="container">
                <div class="row">

                    <?php if($kategoriBlog->num_rows() == 0) { echo "<div class='col-lg col-md col-sm mb-5 border-bottom p-2 ml-2 text-center'><p>Belum ada postingan.</p></div>"; } else { ?>
                    <?php foreach($kategoriBlog->result() as $kb) { ?>
                        <div class="col-lg-4 mb-4 border p-2 ml-2">
                            <div class="entry2">
                            <a href="<?= base_url('viewblog/').$kb->slug_blog ?>">
                               <img src="<?= base_url('imblog/').$kb->gambar_blog; ?>" alt="<?= $kb->slug_blog; ?>" class="img-fluid rounded">
                            </a>
                            <div class="excerpt">
                            <span class="post-category text-white bg-secondary mb-3"><?= $kb->kategori_nama ?></span>

                            <h2>
                                <a href="<?= base_url('viewblog/').$kb->slug_blog; ?>"><?= $kb->judul_blog ?></a>
                            </h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left">
                                    <img src="<?= base_url('profil/').$kb->img_profil; ?>" alt="Image" class="img-fluid">
                                </figure>
                                <span class="d-inline-block mt-1">By <a><?= $kb->username ?></a></span>
                                <?php $tgl = explode(" ", $kb->dibuat); ?>
                                <span>&nbsp;-&nbsp; <?= longdate_indo($tgl[0]) ?></span>
                            </div>

                                <p><?= character_limiter($kb->isi_blog, 200); ?></p>
                                <p><a href="<?= base_url('viewblog/').$kb->slug_blog; ?>">Read More</a></p>
                            </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <!-- <div class="row text-center pt-5 border-top">
                    <div class="col-md-12">
                        <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                        </div>
                    </div>
                </div> -->

                <div class="row mt-5">
                    <div class="col-12">
                        <h2>Artikel/Blog Populer</h2>
                    </div>
                </div>

                <div class="row">
                    <?php $cek = $popularBlog->result(); if($cek <= 3) { echo '<div class="col-md col-lg col-sm text-center mb-4"><p>Belum ada blog terpopuler hari ini.</p></div>'; } else { ?>
                        <?php foreach($cek as $pb) { ?>
                            <div class="col-lg-4 col-md-4 mb-4 border p-2 ml-3">

                                <a href="<?= base_url('viewblog/').$pb->slug_blog ?>" class="hentry mb-30 v-height">
                                <img src="<?= base_url('imblog/').$pb->gambar_blog ?>" alt="<?= $pb->slug_blog ?>" class="img-fluid">
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


    <?php $this->load->view('component/navfoot', [$getKategori, $tentang]); ?>

</div>

<?php $this->load->view('component/footer'); ?>
