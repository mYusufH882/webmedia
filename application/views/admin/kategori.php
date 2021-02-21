<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

    <?php $this->load->view('templates/nav_admin'); ?>

    <div id="layoutSidenav">
        <?php $this->load->view('templates/sidebar_admin', $admin); ?>
        <div id="layoutSidenav_content">
            
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Kategori</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                    <div class="col-md-4 p-2">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalAdd">
                            Tambah Kategori
                        </button>
                    </div>
                    <div class="card mb-4">
                        <?php echo $this->session->flashdata('msg'); ?>
                        <div class="card-body">
                            <table class="table table-bordered" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi Singkat Kategori</th>
                                        <th>Dibuat Tanggal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1 ; 
                                        foreach($getKategori as $k): 
									?>
									<?php $tgl = explode(" ",$k->dibuat_tgl); ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $k->kategori_nama ?></td>
                                            <td><?= $k->deskripsi_singkat ?></td>
                                            <td><?= longdate_indo($tgl[0]) ?></td>
                                            <td>
                                                <a href="#" class="badge badge-warning text-light" data-toggle="modal" data-target="#ModalEdit<?= $k->id_kategori ?>">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                |
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#ModalDelete<?= $k->id_kategori ?>">
                                                    <i class="fas fa-trash"></i>  
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>



            <?php $this->load->view('templates/footer_admin'); ?>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModal">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('tambah_kategori'); ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Kategori</label>
                            <div class="col-xs-8">
                                <input type="hidden" name="id" value="<?= $getAdmin->id ?>">
                                <input name="kategori" class="form-control" type="text" placeholder="Masukkan Nama Kategori..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Deskripsi Singkat Kategori</label>
                            <div class="col-xs-8">
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi Singkat..."></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Tambah Kategori -->

    <!-- Modal Edit Kategori -->
    <?php foreach($getKategori as $gk): ?>
    <div class="modal fade" id="ModalEdit<?= $gk->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModal">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('update_kategori'); ?>">
                    <div class="modal-body">

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Nama Kategori</label>
                            <div class="col-xs-8">
                                <input type="hidden" name="id" value="<?= $getAdmin->id ?>">
                                <input type="hidden" name="idkategori" value="<?= $gk->id_kategori ?>">
                                <input name="kategori" class="form-control" type="text" value="<?= $gk->kategori_nama ?>" placeholder="Masukkan Nama Kategori..." required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Deskripsi Singkat Kategori</label>
                            <div class="col-xs-8">
                                <textarea name="deskripsi" cols="30" rows="10" class="form-control" placeholder="Masukkan Deskripsi Singkat..."><?= $gk->deskripsi_singkat ?></textarea>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-warning text-white">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- Akhir Modal Kategori -->

    <!-- Modal Hapus Kategori -->
    <?php foreach($getKategori as $gk): ?>
    <div class="modal fade" id="ModalDelete<?= $gk->id_kategori ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModal">Hapus Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" action="<?php echo base_url('delete_kategori'); ?>">
                    <div class="modal-body">
                        <input type="hidden" name="idk" value="<?= $gk->id_kategori ?>">
                        <p>Apakah anda yakin ingin menghapus kategori <b><?= $gk->kategori_nama ?></b> ?</p>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                        <button class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <!-- Akhir Modal Kategori --> 



<?php $this->load->view('templates/footer'); ?>
