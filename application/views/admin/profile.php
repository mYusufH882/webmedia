<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin', $admin); ?>
            <div id="layoutSidenav_content">

                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Settings Profile</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Settings Profile</li>
                        </ol>
                    </div>
                    <div class="container mt-3 mb-3">
                        <div class="row m-4">
                            <div class="col-md-6">
                                <?= $this->session->flashdata('msg'); ?>
                            </div>
                        </div>
                    <?= form_open_multipart('settings'); ?>
                        <!-- Foto Admin Profil -->
                        <div class="row justify-content-center">
                            <div class="col-md-5 mb-3">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Foto Profil</h3>
                                        <input type="hidden" name="id" value="<?= $getAdmin->id ?>">
                                    </div>
                                    <div class="card-body">
                                        <?php if($getAdmin->img_profil) { ?>
                                            <img src="<?= base_url().'profil/'.$getAdmin->img_profil ?>" alt="yaibaz" height="300px" width="250px" class="rounded-circle img-thumbnail mx-auto d-block">
                                        <?php } else { ?>
                                            <img src="<?= base_url().'profil/default.png' ?>" alt="yaibaz" height="300px" width="250px" class="rounded-circle img-thumbnail mx-auto d-block">
                                        <?php } ?>
                                        <input id="uploadFile" class="form-control mt-2" placeholder="Nama Gambar yang diubah..." disabled="disabled" />    
                                        <div class="fileUpload btn btn-sm btn-primary mx-auto d-block">
                                            <span>Upload</span>
                                            <input id="uploadBtn" name="profil" type="file" class="upload" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h3>Info</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <?php $tgl = explode(" ", date('d-m-Y',$getAdmin->created_on)); ?>
                                            <label for="tgl">Terdaftar Tanggal</label>
                                            <input type="text" name="tgl" id="tgl" class="form-control" value="<?= longdate_indo($tgl[0]) ?>" readonly>
                                        </div>

                                        <div class="form-group">
                                            <?php $tgl = explode(" ", date('d-m-Y',$getAdmin->created_on)); ?>
                                            <label for="tl">Terakhir Login</label>
                                            <input type="text" name="tlogin" id="tl" class="form-control" value="<?= longdate_indo($tgl[0]) ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Admin Profil -->
                        <div class="row justify-content-center">
                            <div class="col-md-10 p-4">
                                <div class="card">
                                    <div class="card-header text-center">
                                        <h4><?php echo $admin == 'admin'  ? 'Admin' : 'Member' ?> Profile</h4>
                                    </div>
                                    <div class="card-body p-4">

                                        <div class="form-row m-2">
                                            <div class="col">
                                                <label for="username">Username</label>
                                                <input type="text" name="username" id="username" class="form-control" value="<?= $getAdmin->username; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" id="email" class="form-control" value="<?= $getAdmin->email; ?>" readonly>
                                            </div>
                                        
                                        </div>

                                        <div class="form-row m-2">
                                            <div class="col">
                                                <label for="first">Nama Awalan</label>
                                                <input type="text" name="first" id="first" class="form-control" value="<?= $getAdmin->first_name; ?>">
                                            </div>
                                            <div class="col">
                                                <label for="last">Nama Akhiran</label>
                                                <input type="text" name="last" id="last" class="form-control" value="<?= $getAdmin->last_name; ?>">
                                            </div>
                                        </div>

                                        <div class="form-row m-2">
                                            <div class="col">
                                                <label for="org">Organisasi</label>
                                                <input type="text" name="org" id="org" class="form-control" value="<?= $getAdmin->company ?>">
                                            </div>
                                            <div class="col">
                                                <label for="phone">No. Telepon</label>
                                                <input type="text" name="phone" id="phone" class="form-control" value="<?= $getAdmin->phone ?>">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Button Edit Profile -->
                        <div class="row justify-content-center">
                            <div class="col-md-10 p-4">
                                <button type="submit" class="btn btn-ms btn-warning text-white">Edit Profil</button>
                            </div>
                        </div>
                    
                    <?= form_close(); ?>
                    </div>
                </main>

                <?php $this->load->view('templates/footer_admin'); ?>
            </div>
        </div>

        <script>
            document.getElementById("uploadBtn").onchange = function () {
                document.getElementById("uploadFile").value = this.value;
            };
        </script>


<?php $this->load->view('templates/footer'); ?>