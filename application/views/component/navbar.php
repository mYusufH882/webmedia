<header class="site-navbar" role="banner">
    <div class="container-fluid">
        <div class="row align-items-center">

            <div class="col-4 site-logo">
                <a href="<?= base_url('blog'); ?>" class="h2 mb-0"><?= $this->appname ?> Platform</a>
            </div>

            <div class="col-8 text-right">
                <nav class="site-navigation" role="navigation">
                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                        
                        <li><a class="" href="<?= base_url('/'); ?>">Beranda</a></li>
                        <li><a class="" href="<?= base_url('tentang'); ?>">Tentang</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Kategori</a>
                            <div class="dropdown-menu">
                                <?php foreach($getKategori->result() as $gk){ ?>
                                    <a class="dropdown-item" href="<?= base_url('kategoriblog/').$gk->kategori_slug ?>"><?= $gk->kategori_nama ?></a>
                                <?php } ?>
                            </div>
                        </li>

                            <!-- <li class="d-none d-lg-inline-block">
                                <a href="#" class="js-search-toggle">
                                    <span class="icon-search"></span>
                                </a>
                            </li> -->
                    </ul>
                </nav>
                <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
            </div>
        </div>

    </div>
</header>
