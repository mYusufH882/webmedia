<?php if($Blog->gambar_blog != '') { ?>
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url('imblog/').$Blog->gambar_blog; ?>'); background-position:center; background-size: cover; background-repeat: no-repeat;">
<?php } else { ?>
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('<?= base_url('assets/frontend/')?>images/img_1.jpg'); background-position:center; background-size: cover; background-repeat: no-repeat;">
<?php } ?>
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <span class="post-category text-white bg-success mb-3"><?= $Blog->kategori_nama ?></span>
                    <h1 class="mb-4"><?= $Blog->judul_blog ?></h1>
                    <div class="post-meta align-items-center text-center">
                        <figure class="author-figure mb-0 mr-3 d-inline-block"><img src="<?= base_url('profil/').$Blog->img_profil; ?>" alt="Image" class="img-fluid"></figure>
                        <span class="d-inline-block mt-1">By <?= $Blog->first_name ." ". $Blog->last_name ?></span>
                        <?php $tgl = explode(" ", $Blog->dibuat); ?>
                        <span>&nbsp;-&nbsp; <?= longdate_indo($tgl[0]) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
