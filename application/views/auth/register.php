<?php $this->load->view('templates/header'); ?>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                    <div class="card-header">
                                        <h3 class="text-center font-weight-light my-4"> Buat Akun Admin</h3>
                                    </div>
                                    <div class="card-body">
									<!-- <?//php if($message): ?>
										<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
											<strong><?//php echo $message;?></strong>
										</div>
									<?//php endif; ?> -->
										<?= $this->session->flashdata('msg'); ?>
                                        <?= form_open('registadmin'); ?>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Nama Awalan</label>
                                                        <input class="form-control py-4" name="first" id="inputFirstName" type="text" placeholder="Masukkan Nama Awalan" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Nama Akhiran</label>
                                                        <input class="form-control py-4" name="last" id="inputLastName" type="text" placeholder="Masukkan Nama Akhiran" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Username</label>
                                                <input class="form-control py-4" name="user" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Masukkan Username" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Masukkan Alamat Email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Organisasi</label>
                                                <input class="form-control py-4" name="org" id="inputEmailAddress" type="text" aria-describedby="emailHelp" placeholder="Masukkan Nama Organisasi Anda..." />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" name="pwd" id="inputPassword" type="password" placeholder="Masukkan Password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" name="pwd2" id="inputConfirmPassword" type="password" placeholder="Konfirmasi password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block">Buat Akun</button>
                                            </div>
                                        <?= form_close(); ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small">
                                            <a href="<?= base_url('login'); ?>">Sudah memiliki akun? Silahkan Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>

        </div>

<?php $this->load->view('templates/footer'); ?>
