<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin',$admin); ?>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Detail Blog</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('artikel'); ?>">Blog</a></li>
                            <li class="breadcrumb-item active">Detail Blog</li>
                        </ol>

                        <div class="col-md mb-4">
                            <div class="form-group border p-3">
                                <label for="formGroupExampleInput">Judul Blog</label>
                                <input type="hidden" name="idadmin" value="<?= $getAdmin->id ?>">
                                <input type="hidden" name="idblog" value="<?= $getAdmin->id ?>">
                                <input name="judul" type="text" class="form-control" value="<?= $getBlog->judul_blog ?>" id="formGroupExampleInput" placeholder="Masukkan Judul ..." readonly>
                            </div>
                        </div>

                        <div class="form-row m-2">
                            <div class="col-md-8 col-sm mr-4">
                                <div class="card p-3">
                                    <h1><?= $getBlog->judul_blog ?></h1>
                                    <?php $tgl = explode(" ", $getBlog->dibuat); ?>
                                    <p class="text-bold"><b>Dibuat tanggal :</b> <?= longdate_indo($tgl[0]); ?> <b>Jam :</b> <?= $tgl[1]; ?></p>
                                    <div class="card-title text-center">
                                        <img src="<?= base_url().'imblog/'.$getBlog->gambar_blog ?>" alt="Gambar Blog" height="400px" width="600px">
                                    </div>
                                    <div class="card-body">
                                        <p class="text-justify"><?= $getBlog->isi_blog ?></p>
                                    </div>
                                </div>
                            </div>
    
                            <div class="col-md col-sm">

                                <div class="col-md border p-3 mb-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Author</label>
                                        <input name="author" type="text" class="form-control" value="<?= $getBlog->pengarang ?>" id="formGroupExampleInput2"  readonly>
                                    </div>
                                </div>

                                <div class="col-md border p-3 mb-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Kategori</label>
                                        <select name="kategori" class="form-control" id="exampleFormControlSelect2" readonly>
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
                                <div class="card text-center p-3 mb-3">
                                    <div class="card-title">
                                        <h3>Gambar Blog</h3>
                                    </div>
                                    <div class="card-body">
                                        <img src="<?= base_url().'imblog/'.$getBlog->gambar_blog ?>" alt="Gambar Blog" height="200px" width="250px">
                                    </div>
                                </div>

                                <div class="col-md border p-3 mb-3">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Admin</label>
                                        <input name="admin" type="text" class="form-control" value="<?= $getBlog->first_name ?>" id="formGroupExampleInput2"  readonly>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Terakhir Diupdate</label>
                                        <?php if($getBlog->lupdate == '') : 
                                        $tgl = explode(" ", $getBlog->lupdate); ?>
                                            <input name="admin" type="text" class="form-control" value="<?= longdate_indo($tgl[0]) ?>" id="formGroupExampleInput2"  readonly>
                                        <?php else : ?>
                                            <input type="text" class="form-control" readonly value="Belum pernah di update"> 
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput3">Jam Terakhir Diupdate</label>
                                        <?php if($getBlog->lupdate == ''): ?>
                                            <input name="admin" type="text" class="form-control" value="<?= $tgl[1] ?>" id="formGroupExampleInput3"  readonly>
                                        <?php else : ?>
                                            <input type="text" class="form-control" readonly value="Belum pernah di update">     
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                                                    
                    </div>
                </main>

                <?php $this->load->view('templates/footer_admin'); ?>
            </div>
        </div>


<?php $this->load->view('templates/footer'); ?>