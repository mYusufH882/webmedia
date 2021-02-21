<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="index.html"><?= $this->appname ?> Admin</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if($getAdmin->img_profil) { ?>
                    <span><?= $getAdmin->email ?></span>
                    <img src="<?= base_url().'profil/'.$getAdmin->img_profil ?>" alt="yaibaz" height="35px" width="35px" class="rounded-circle">
                <?php } else { ?>
                    <span><?= $getAdmin->email ?></span>
                    <img src="<?= base_url().'profil/default.png'?>" alt="yaibaz" height="35px" width="35px" class="rounded-circle">
                <?php } ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?= base_url('settings'); ?>">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalLogout">Logout</a>
            </div>
        </li>
    </ul>
</nav>