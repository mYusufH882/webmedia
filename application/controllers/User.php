<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public $appname = appname;

  public function __construct()
  {
    parent::__construct();
    $this->load->model(['Kategori_model','Blog_model','User_model']);
    $this->load->library(['pagination','form_validation']);

    
    ini_set('date.timezone', 'Asia/Jakarta');
  }
  
  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  public function index($offset = NULL)
  {
    $data = [
      "title" => $this->appname." Blog",
      "getKategori" => $this->Kategori_model->getKategori(),
      "Blog" => $this->Blog_model->getBlog(),
      "tentang" => $this->User_model->getTentang()->row_array(),
      "popularBlog" => $this->User_model->popularBlog(),
    ];

    $config['base_url'] = base_url('blog/');
    $config['total_rows'] = $this->Blog_model->getBlog()->num_rows();
    $config['per_page'] = 6;

    $config['next_link'] = '>';
    $config['prev_link'] = '<';
    $config['cur_tag_open'] = '<span>';
    $config['cur_tag_close'] = '</span>';

		$data['offset'] = $this->uri->segment(2);
		$data['sumk'] = $this->User_model->Blog();
    $data["results"] = $this->User_model->BlogPagination($config["per_page"], $offset);
		$this->pagination->initialize($config);
		$data["links"] = $this->pagination->create_links();

    $this->load->view('user/index', $data); 
  }

  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  function kategoriSearch()
  {
    $slug = $this->uri->segment(2);

    $data = [
      "title" => $this->appname." Kategori Blog",
      "getKategori" => $this->Kategori_model->getKategori(),
      "byKategori" => $this->User_model->getSlugKategori($slug)->row(),
      "kategoriBlog" => $this->User_model->getSlugJudul($slug),
      "kBlog" => $this->User_model->getSlugJudul($slug)->num_rows(),
      "tentang" => $this->User_model->getTentang()->row_array(),
      "popularBlog" => $this->User_model->popularBlog()
    ];

    $this->load->view('user/kategori_blog', $data);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  function detailBlog()
  {
    $slug = $this->uri->segment(2);
    $data = [
      "title" => $this->appname." Detail Blog",
      "getKategori" => $this->Kategori_model->getKategori(),
      "Blog" => $this->User_model->getSlugBlog($slug)->row(),
      "totalKategori" => $this->User_model->totalKategori(),
      "popularBlog" => $this->User_model->popularBlog(),
      "kBlog" => $this->User_model->getSlugJudul($slug)->num_rows(),
      "tampilkom" => $this->User_model->tampilkanKomentar(),
      "hitungKomen" => $this->User_model->hitKom(),
      "tentang" => $this->User_model->getTentang()->row_array()
    ];

    $this->User_model->hitungBaca($slug);

    $this->load->view('user/detail_blog', $data);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  public function about()
  {
    $data = [
      "title" => $this->appname." About Blog",
      "getKategori" => $this->Kategori_model->getKategori(),
      "tentang" => $this->User_model->getTentang()->row_array()
    ];

    $this->load->view('user/about_blog', $data);
  }

  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  function kirimKomentar()
  {
      $slug = $this->input->post('slug');
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $pesan = $this->input->post('pesan');

      $data = [
        "id_blog" => $this->input->post('id'),
        "komen_nama" => $nama,
        "komen_email" => $email,
        "komen_isi" => $pesan,
        "tgl_komen" => date('Y-m-d H:i:s')
      ];

      $cek = $this->User_model->kirimKomentar($data);

      if($cek) {
        $this->session->set_flashdata('msg','<span class="alert alert-success">Komentar berhasil dibuat.</span>');
        redirect(base_url('viewblog/').$slug);
      } else {
        $this->session->set_flashdata('msg','<span class="alert alert-danger">Komentar gagal dibuat.</span>');
        redirect(base_url('viewblog/').$slug);
      }
  }


  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

  function balasKomentar()
  {
    $slug = $this->input->post('slug');
    $statuskmn = $this->input->post('idbalas');
    $nama = $this->input->post('nama');
    $email = $this->input->post('email');
    $pesan = $this->input->post('pesan');

    $data = [
      "id_blog" => $this->input->post('id'),
      "komen_status" => $statuskmn,
      "komen_nama" => $nama,
      "komen_email" => $email,
      "komen_isi" => $pesan,
      "tgl_komen" => date('Y-m-d H:i:s')
    ];

    $cek = $this->User_model->kirimBalasan($data);

    if($cek) {
      $this->session->set_flashdata('msg','<span class="alert alert-success">Balasan berhasil dibuat.</span>');
      redirect(base_url('viewblog/').$slug);
    } else {
      $this->session->set_flashdata('msg','<span class="alert alert-danger">Balasan gagal dibuat.</span>');
      redirect(base_url('viewblog/').$slug);
    }
  }

  ////////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////////

}


/* End of file User.php */
/* Location: ./application/controllers/User.php */
