    <!-- Modal Logout -->
    <div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModal">Opsi Lanjutan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin <b class="text-danger">Logout/Keluar</b> ?</p>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <a href="<?= base_url('logout') ?>" class="btn btn-secondary">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal Logout --> 
      
        <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
        <script src="<?= base_url('assets/'); ?>js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/'); ?>js/scripts.js"></script>
        <script src="<?= base_url('assets/'); ?>plugins/ckeditor/ckeditor.js"></script>
        <script src="<?= base_url('assets/'); ?>demo/datatables-demo.js"></script>
    </body>
</html>