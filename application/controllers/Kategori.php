<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{
  public $appname = appname;
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Kategori_model');
    $this->load->library('ion_auth');

    ini_set('date.timezone', 'Asia/Jakarta');

    if(!$this->ion_auth->logged_in()){
      redirect('auth','refresh');
    }
  }

  public function index()
  {
    $data = [
      "title" => "Kategori",
      "admin" => $this->ion_auth->in_group('admin'),
      "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
      "getKategori" => $this->Kategori_model->getKategori()->result(),
    ];

    $this->load->view('admin/kategori', $data);
  }

  public function add_kategori()
  {
    $id = $this->input->post('id', TRUE);
    $kategori = $this->input->post('kategori', TRUE);
    $deskripsi = $this->input->post('deskripsi', TRUE);

    $data = [
      "id_user" => $id,
      "kategori_nama" => $kategori,
      "deskripsi_singkat" => $deskripsi,
      "kategori_slug" => slug($kategori),
      "dibuat_tgl" => date('Y-m-d H:i:s')
    ];
    
    if($data) {
      $this->Kategori_model->insertKategori($data);
      $this->session->set_flashdata('msg','<span class="badge badge-success">Data telah dimasukkan ke database</span>');
      redirect('kategori');
    } else {
      return $this->session->set_flashdata('msg','<span class="badge badge-danger">Data gagal dimasukkan ke database</span>');
      redirect('kategori');
    }
  }

  function updateKategori()
  {
    $id = $this->input->post('id', TRUE);
    $idk = $this->input->post('idkategori', TRUE);
    $kategori = $this->input->post('kategori', TRUE);
    $deskripsi = $this->input->post('deskripsi', TRUE);

    $data = [
      "id_user" => $id,
      "kategori_nama" => $kategori,
      "deskripsi_singkat" => $deskripsi,
      "kategori_slug" => slug($kategori),
      "last_update" => date('Y-m-d H:i:s')
    ];

    if($data) {
      $this->Kategori_model->upgradeKategori($idk, $data);
      $this->session->set_flashdata('msg','<span class="badge badge-warning">Data telah di update ke database</span>');
      redirect('kategori');
    } else {
      return $this->session->set_flashdata('msg','<span class="badge badge-danger">Data gagal di update ke database</span>');
      redirect('kategori');
    }
  }

  function deleteKategori()
  {
    $idk = $this->input->post('idk');

    $cek = $this->Kategori_model->destroyKategori($idk);
    if($cek) {
      $this->session->set_flashdata('msg','<span class="badge badge-success">Data telah berhasil dihapus dari database.</span>');
      redirect('kategori');
    } else {
      $this->session->set_flashdata('msg','<span class="badge badge-danger">Data tidak bisa dihapus karena masih digunakan.</span>');
      redirect('kategori');
    }
  }

}


/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */