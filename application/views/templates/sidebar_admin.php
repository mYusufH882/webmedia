<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                
                <div class="sb-sidenav-menu-heading">Home</div>

                <a class="nav-link <?php if($this->uri->segment(1) == "admin") { echo "active"; } ?>" href="<?= base_url('admin'); ?>">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    Dashboard
                </a>
                
                <?php if($admin) { ?>
                    <div class="sb-sidenav-menu-heading">Admin</div>
                <?php } else { ?>
                    <div class="sb-sidenav-menu-heading">Member</div>
                <?php } ?>
                
                <a class="nav-link <?php if($this->uri->segment(1) == "artikel" || $this->uri->segment(1) == "tambah_artikel" || $this->uri->segment(1) == "detail_artikel" || $this->uri->segment(1) == "edit_artikel") { echo "active"; } ?>" href="<?= base_url('artikel'); ?>">
                    <div class="sb-nav-link-icon">
                        <i class="fab fa-blogger-b"></i>
                    </div>
                    Blog / Artikel
                </a>

                <?php if($admin) { ?>
                <a class="nav-link <?php if($this->uri->segment(1) == "kategori") { echo "active"; } ?>" href="<?= base_url('kategori'); ?>">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    Kategori
                </a>

                    <a class="nav-link <?php if($this->uri->segment(1) == "anggota" || $this->uri->segment(1) == "tambah_anggota" || $this->uri->segment(1) == "edit_anggota") { echo "active"; } ?>" href="<?= base_url('anggota'); ?>">
                        <div class="sb-nav-link-icon">
                            <i class="fas fa-user"></i>
                        </div>
                        Anggota
                    </a>
                <?php } ?>

                <div class="sb-sidenav-menu-heading">More</div>
                <a class="nav-link <?php if($this->uri->segment(1) == "settings") { echo "active"; } ?>" href="<?= base_url('settings'); ?>">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-cog"></i></div>
                    Settings
                </a>
                <a class="nav-link" href="#" data-toggle="modal" data-target="#ModalLogout">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>

            </div>
        </div>
        <div class="sb-sidenav-footer mt-2">
            <div class="small">Logged in as:</div>
            <?php echo $getAdmin->username; ?>
        </div>
    </nav>
</div>