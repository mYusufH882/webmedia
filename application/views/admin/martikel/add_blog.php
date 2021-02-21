<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin',$admin); ?>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah Blog</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('artikel'); ?>">Blog</a></li>
                            <li class="breadcrumb-item active">Tambah Blog</li>
                        </ol>

                        <?= form_open_multipart('proses_artikel'); ?>

                        <?= $this->session->flashdata('msg'); ?>
                        <div class="col-md mb-4">
                            <div class="form-group border p-3">
                                <label for="formGroupExampleInput">Judul Blog</label>
                                <input type="hidden" name="id" value="<?= $getAdmin->id ?>">
                                <input name="judul" type="text" class="form-control" id="formGroupExampleInput" placeholder="Masukkan Judul ..." required>
                            </div>
                        </div>

                        <div class="form-row m-2">
                            <div class="col-md-8 col-sm mr-4">
                                <div class="form-group border p-3">
                                    <label for="formGroupExampleInput2">Isi Blog</label>
                                    <textarea name="isi" class="form-control ckeditor" id="ckedtor"></textarea>
                                </div>
                            </div>
    
                            <div class="col-md col-sm">

                                <div class="col-md border p-3 mb-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Author</label>
                                        <input name="author" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Masukkan Nama Author ..." required>
                                    </div>
                                </div>

                                <div class="col-md border p-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Kategori</label>
                                        <select name="kategori" class="form-control" id="exampleFormControlSelect2" required>
                                            <option value="0">~~ Pilih Kategori ~~</option>
                                            <?php foreach($getKategori as $gk): ?>
                                                <option value="<?= $gk->id_kategori ?>"><?= $gk->kategori_nama ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md border p-3 mt-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Gambar Blog</label>
                                        <input name="gambar" id="myFile" type="file" class="form-control-file" id="formGroupExampleInput2" required>
                                        <?= $this->session->flashdata('msg'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-2 border p-3 m-3">
                            <button type="submit" class="btn btn-success">Publish</button>
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