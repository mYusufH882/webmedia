  <div class="site-section bg-secondary" style="background-image: url('<?= base_url() ?>assets/img/19385.jpg'); background-position:center; background-size: cover; background-repeat: no-repeat;">
    <div class="container">
      <div class="col-md-3 bg-light">
        <h2 class="mb-4 text-center text-sm">Kategori Blog</h2>
      </div>
      <div class="row align-items-stretch retro-layout-2">
        <?php $bg = ['bg-warning','bg-success','bg-primary','bg-secondary','bg-dark','bg-danger']; $no = 0; ?>
        <?php if($getKategori->num_rows() == 0) { echo '<div class="col-md col-lg col-sm mb-4"><p class="text-white">Belum ada kategori yang dibuat.</p></div>'; } else { ?>
          <?php $no = 1; foreach($getKategori->result() as $gk){ ?>
            <div class="col-md-6 mb-4">
              <a href="<?= base_url('kategoriblog/').$gk->kategori_slug ?>" class="h-entry mb-30 v-height <?= $bg[$no++]; ?>">
                
                <div class="text">
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
