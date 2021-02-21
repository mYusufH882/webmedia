<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin', $admin); ?>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Edit Blog</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('artikel'); ?>">Blog</a></li>
                            <li class="breadcrumb-item active">Edit Blog</li>
                        </ol>

                        <?= form_open_multipart('update_artikel'); ?>

                        <div class="col-md mb-4">
                            <div class="form-group border p-3">
                                <label for="formGroupExampleInput"><b>Judul Blog</b></label>
                                <input type="hidden" name="idadmin" value="<?= $getAdmin->id ?>">
                                <input type="hidden" name="idblog" value="<?= $getBlog->id_blog ?>">
                                <input name="judul" type="text" class="form-control" value="<?= $getBlog->judul_blog ?>" id="formGroupExampleInput" placeholder="Masukkan Judul ..." >
                            </div>
                        </div>

                        <div class="form-row m-2">
                            <div class="col-md-8 col-sm mr-4">
                                <div class="form-group border p-3">
                                    <label for="formGroupExampleInput2"><b>Tulis Blog/Artikel</b></label>
                                    <textarea name="isi" class="form-control ckeditor" id="ckedtor"><?= $getBlog->isi_blog ?></textarea>
                                </div>
                            </div>
    
                            <div class="col-md col-sm">

                                <div class="col-md border p-3 mb-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2"><b>Author</b></label>
                                        <input name="author" type="text" class="form-control" value="<?= $getBlog->pengarang ?>" id="formGroupExampleInput2" placeholder="Masukkan Nama Author ...">
                                    </div>
                                </div>

                                <div class="col-md border p-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2"><b>Kategori</b></label>
                                        <select name="kategori" class="form-control" id="exampleFormControlSelect2" required>
                                            <option value="0">~~ Pilih Kategori ~~</option>
                                            <?php foreach($getKategori as $gk): ?>
                                                <?php if($gk->id_kategori == $getBlog->id_kategori): ?>
                                                    <option value="<?= $gk->id_kategori ?>" selected><?= $gk->kategori_nama ?></option>
                                                <?php else : ?>
                                                    <option value="<?= $gk->id_kategori ?>"><?= $gk->kategori_nama ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <?= $this->session->flashdata('msg'); ?>
                                <div class="col-md border p-3 mt-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2"><b>Ganti Gambar Blog Baru</b></label>
                                        
                                        <input name="gambar" type="file" class="form-control-file" id="formGroupExampleInput2" >
                                        
                                        <div class="card m-2 p-2">
                                            <p>Gambar Sebelumnya</p>
                                            <img src="<?= base_url().'imblog/'.$getBlog->gambar_blog ?>" alt="Gambar Blog" class="mx-auto d-block" height="150px" width="150px">
                                            <input name="glama" type="text" class="form-control mt-2 text-center text-danger" value="<?= $getBlog->gambar_blog ?>" readonly>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-2 border p-3 m-3">
                            <button type="submit" class="btn btn-warning text-white">Edit</button>
                        </div>
                                                    
                        <?= form_close(); ?>
                    </div>
                </main>

                <?php $this->load->view('templates/footer_admin'); ?>
            </div>
        </div>


<?php $this->load->view('templates/footer'); ?>