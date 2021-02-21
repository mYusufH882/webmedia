<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

        <?php $this->load->view('templates/nav_admin'); ?>
    
        <div id="layoutSidenav">
            <?php $this->load->view('templates/sidebar_admin',$admin); ?>
            <div id="layoutSidenav_content">
                
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Blog/Artikel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Blog</li>
                        </ol>
                        <div class="col-md-4 p-2">
                            <a href="<?= base_url('tambah_artikel'); ?>" class="btn btn-success">
                                Tambah Blog/Artikel
                            </a>
                        </div>
                        <div class="card mb-4">
                            <?= $this->session->flashdata('msg'); ?>
                            <?= validation_errors(); ?>
                            <div class="card-body">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Gambar</th>
                                            <th>Author</th>
                                            <th>Ditulis Oleh</th>
                                            <th>Tanggal</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; foreach($getBlog as $blog): ?>
                                            <tr>
                                                <th><?= $no++ ?></th>
                                                <th><?= $blog->judul_blog ?></th>
                                                <th><img src="<?= base_url().'imblog/'.$blog->gambar_blog ?>" alt="gambar" class="img-responsive mx-auto d-block" style="width:100px;"></th>
                                                <th><?= $blog->pengarang ?></th>
                                                <th><?= $blog->first_name ?></th>
                                                <?php $tgl = explode(" ", $blog->dibuat); ?>
                                                <th><?= longdate_indo($tgl[0]); ?></th>
                                                <th>
                                                    <a href="<?= base_url('detail_artikel/').$blog->id_blog ?>" class="badge badge-info">
                                                        <i class="fas fa-info-circle"></i>
                                                    </a>
                                                    |
                                                    <a href="<?= base_url('edit_artikel/').$blog->id_blog ?>" class="text-white badge badge-warning">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    |
                                                    <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#ModalDelete<?= $blog->id_blog ?>">
                                                        <i class="fas fa-trash"></i>  
                                                    </a>
                                                </th>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <!-- Modal Hapus Blog -->
                <?php foreach($getBlog as $b): ?>
                    <div class="modal fade" id="ModalDelete<?= $b->id_blog ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="largeModal">Hapus Blog</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?= form_open('delete_artikel'); ?>
                                    <div class="modal-body">
                                        <input type="hidden" name="id" value="<?= $b->id_blog ?>">
                                        <p class="display-5">Apakah anda yakin ingin menghapus Blog dengan judul <b><?= $b->judul_blog ?></b> ?</p>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Tutup</button>
                                        <button class="btn btn-danger">Hapus</button>
                                    </div>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Akhir Modal Blog --> 

                <?php $this->load->view('templates/footer_admin'); ?>
            </div>
        </div>

    <script>
        $(document).ready(function(){
            $('#tabel').DataTable();
        });
    </script>

<?php $this->load->view('templates/footer'); ?>
