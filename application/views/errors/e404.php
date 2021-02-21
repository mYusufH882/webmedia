<?php $this->load->view('templates/header'); ?>

    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="<?= base_url('assets/'); ?>img/error-404-monochrome.svg" />
                                    <p class="lead">Maaf Halaman Tidak Ditemukan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

<?php $this->load->view('templates/footer'); ?>