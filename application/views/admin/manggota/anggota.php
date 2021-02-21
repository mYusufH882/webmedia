<?php $this->load->view('templates/header'); ?>

<body class="sb-nav-fixed">

    <?php $this->load->view('templates/nav_admin'); ?>

    <div id="layoutSidenav">
        <?php $this->load->view('templates/sidebar_admin',$admin); ?>
        <div id="layoutSidenav_content">

            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">Akun Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Anggota</li>
                    </ol>
                    <div class="col-md-4 p-2">
                        <a href="<?= base_url('tambah_anggota'); ?>" class="btn btn-success">
                            Tambah Anggota
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Profil</th>
                                        <th>Tanggal Dibuat</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($getUser as $a): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $a->username ?></td>
                                            <td><?= $a->email ?></td>
                                            <?php if($a->img_profil == '') { ?>
                                                <td><img src="<?= base_url().'profil/'.$a->img_profil ?>" alt="profil" height="150px" width="150px" class="mx-auto d-block img-thumbnail"></td>
                                            <?php } else { ?>
                                                <td><img src="<?= base_url().'profil/default.png' ?>" alt="profil" height="150px" width="150px" class="mx-auto d-block img-thumbnail"></td>
                                            <?php } ?>
                                            <td><?= longdate_indo(date('Y-m-d', $a->created_on)) ?></td>
                                            <td>
                                                <a href="<?= base_url('edit_anggota/').$a->id ?>" class="text-white badge badge-warning">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                |
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#ModalDelete<?= $a->id ?>">
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

    <!-- Modal Hapus Blog -->
    <?php foreach($getUser as $b): ?>
        <div class="modal fade" id="ModalDelete<?= $b->id ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModal">Hapus <span class="text-danger">Anggota</span></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?= form_open('delete_anggota'); ?>
                        <div class="modal-body">
                            <input type="hidden" name="id" value="<?= $b->id ?>">
                            <p class="display-5">Apakah anda yakin ingin menghapus Anggota dengan username <b><?= $b->username ?></b> ?</p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-danger">Hapus</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Akhir Modal Blog --> 

<?php $this->load->view('templates/footer'); ?>