<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin',$admin); ?>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Akun Anggota</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('anggota'); ?>">Akun Anggota</a></li>
                            <li class="breadcrumb-item active">Tambah Akun Anggota</li>
                        </ol>

                        <?= form_open('proses_anggota'); ?>

                        <div class="col-md col-sm border p-4">
                            <h3 class="text-center mb-3">Form Tambah Akun Anggota</h3>
                            <?= $this->session->flashdata('msg'); ?>
                            <div class="form-group">
                                <label for="inputAddress">Nama Awalan</label>
                                <input type="text" name="first" class="form-control" id="inputAddress" placeholder="Masukkan Nama Awalan...">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Nama Akhiran</label>
                                <input type="text" name="last" class="form-control" id="inputAddress2" placeholder="Masukkan Nama Akhiran...">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2">Username</label>
                                <input type="text" name="user" class="form-control" id="inputAddress2" placeholder="Masukkan Username...">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Masukkan Email...">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail">Organisasi</label>
                                <input type="text" name="org" class="form-control" id="inputEmail" placeholder="Masukkan Nama Organisasi...">
                            </div>
                            <p class="text-sm text-warning">** Password harus terdiri dari 8 karakter.</p>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword">Password</label>
                                    <input type="password" name="pwd" class="form-control" id="inputPassword" placeholder="Masukkan Password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputCPassword">Confirm Password</label>
                                    <input type="password" name="pwd2" class="form-control" id="inputCPassword" placeholder="Konfirmasi Password">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Tambah Anggota</button>

                        </div> 
                       
                        <?= form_close(); ?>
                    </div>
                </main>

                <?php $this->load->view('templates/footer_admin'); ?>
            </div>
        </div>

        <script>
            document.getElementById("myFile").required = true;
        </script>

<?php $this->load->view('templates/footer'); ?>