<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{
  public $appname = appname;
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Blog_model');
    $this->load->model('Kategori_model');
    $this->load->library(['ion_auth','form_validation','image_lib','upload']);

    ini_set('date.timezone', 'Asia/Jakarta');

    if(!$this->ion_auth->logged_in()){
      redirect('auth','refresh');
    }
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    $data = [
      "title" => $this->appname." Artikel",
      "admin" => $this->ion_auth->in_group('admin'),
      "getAdmin" => $this->Admin_model->getIdAdmin($id),
      "getBlog" => $this->Blog_model->getUserBlog($id)->result()
    ];

    $this->load->view('admin/martikel/blog', $data);
  }

  public function detailBlog()
  {
    $idBlog = $this->uri->segment(2);
    
    $data = [
      "title" => "Detail Artikel",
      "admin" => $this->ion_auth->in_group('admin'),
      "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
      "getKategori" => $this->Kategori_model->getKategori()->result(),
      "getBlog" => $this->Blog_model->getIdBlog($idBlog)->row()
    ];

    $this->load->view('admin/martikel/detail_blog', $data);
  }

  public function addBlog()
  {
    $data = [
      "title" => "Buat Artikel",
      "admin" => $this->ion_auth->in_group('admin'),
      "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
      "getKategori" => $this->Kategori_model->getKategori()->result()
    ];

    $this->load->view('admin/martikel/add_blog', $data);
  }

  function insertBlog()
  {
    $this->form_validation->set_rules('judul','Judul Blog','required');
    $this->form_validation->set_rules('isi','Isi Blog','required');
    $this->form_validation->set_rules('author','Author','required');

    if($this->form_validation->run() != FALSE) {

      $id = $this->input->post('id', TRUE);
      $author = $this->input->post('author', TRUE);
      $judul = $this->input->post('judul', TRUE);
      $isi = $this->input->post('isi', TRUE);
      $kategori = $this->input->post('kategori', TRUE);
      $gambar = $_FILES['gambar']['name'];

      if($gambar) {

        $config['upload_path']          = FCPATH.'imblog/';
        $config['allowed_types']        = 'jpeg|jpg|png';
        $config['max_width']            = 3074;

        $this->upload->initialize($config);   

        if($this->upload->do_upload('gambar')) {

          $gbr = $this->upload->data();

          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']= $this->upload->upload_path.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 600;
          $config['height']= 317;
          $config['new_image']= $this->upload->upload_path.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gmb = $gbr['file_name'];

          $data = [
            "judul_blog" => $judul,
            "id_user" => $id,
            "id_kategori" => $kategori,
            "gambar_blog" => $gmb,
            "slug_blog" => slug($judul),
            "pengarang" => $author,
            "isi_blog" => $isi,
            "dibuat" => date('Y-m-d H:i:s') 
          ];

          // die(print_r($data));

          $this->Blog_model->insertBlog($data);
          $this->session->set_flashdata('msg','<span class="alert alert-success">Data berhasil dimasukkan ke dalam database.</span>');
          redirect('artikel');
        } else {
          $this->session->set_flashdata('msg', $this->upload->display_errors());
          redirect('tambah_artikel');
        }       
      }  
    } else {
      $this->session->set_flashdata('msg', '<span class="alert alert-danger text-danger">'.$this->upload->display_errors().'</span>');
    }
  }

  function editBlog()
  {
      $idBlog = $this->uri->segment(2);
  
      $data = [
        "title" => "Edit Artikel",
        "admin" => $this->ion_auth->in_group('admin'),
        "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
        "getKategori" => $this->Kategori_model->getKategori()->result(),
        "getBlog" => $this->Blog_model->getIdBlog($idBlog)->row()
      ];

      $this->load->view('admin/martikel/edit_blog', $data);
  }

  function updateBlog()
  {
    $idad = $this->input->post('idadmin', TRUE);
    $ilog = $this->input->post('idblog', TRUE);
    $author = $this->input->post('author', TRUE);
    $judul = $this->input->post('judul', TRUE);
    $isi = $this->input->post('isi', TRUE);
    $kategori = $this->input->post('kategori', TRUE); 
    $glama = $this->input->post('glama', TRUE); 
    
    $gambar = $_FILES['gambar']['name'];  
    $data['lama'] = $this->Blog_model->getGambarBlog($ilog)->row_array();
      
      if($gambar) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['upload_path'] = FCPATH.'imblog/';
        $config['max_size'] = 3074;

        $this->upload->initialize($config);

        if($this->upload->do_upload('gambar')) {
          $gmblama = $data['lama']['gambar_blog'];
          $gbr = $this->upload->data();

          //Compress Image
          $config['image_library']='gd2';
          $config['source_image']= $this->upload->upload_path.$gbr['file_name'];
          $config['create_thumb']= FALSE;
          $config['maintain_ratio']= FALSE;
          $config['quality']= '50%';
          $config['width']= 600;
          $config['height']= 317;
          $config['new_image']= $this->upload->upload_path.$gbr['file_name'];
          $this->load->library('image_lib', $config);
          $this->image_lib->resize();

          $gmb = $gbr['file_name'];

          if($gmb != $gmblama) {
            unlink(FCPATH.'imblog/'.$gmblama);
            // die("Teu sarua berarti berhasil");
          } 

          $data = ["gambar_blog" => $gmb];
          $cek = $this->Blog_model->editBlog($data, $ilog);

        } else {
          die($this->upload->display_errors());
        }
      }

      $data = [
        "judul_blog" => $judul,
        "id_user" => $idad,
        "id_kategori" => $kategori,
        "slug_blog" => slug($judul),
        "pengarang" => $author,
        "isi_blog" => $isi,
        "lupdate" => date('Y-m-d H:i:s') 
      ];

      $cek = $this->Blog_model->editBlog($data, $ilog);
      
      if($cek) {
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Data berhasil di update dari database.</span>');
        redirect('artikel');
      } else {
        die("Gagal");
      }
  }

  function deleteBlog()
  {
    $idBlog = $this->input->post('id');

    $gmb = $this->Blog_model->getGambarBlog($idBlog)->row();
    unlink(FCPATH.'imblog/'.$gmb->gambar_blog);
  
    $cek = $this->Blog_model->destroyBlog($idBlog);
    
    if($cek) {
      $this->session->set_flashdata('msg','<span class="badge badge-success">Data berhasil di hapus ke dalam database.</span>');
      redirect('artikel');
    } else {
      $this->session->set_flashdata('msg','<span class="badge badge-danger">Data gagal di hapus dari database.</span>');
      redirect('artikel');
    }
  }

}


/* End of file Blog.php */
/* Location: ./application/controllers/Blog.php */