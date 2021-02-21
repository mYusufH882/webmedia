<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public $appname = appname;

  public function __construct()
  {
    parent::__construct();
    $this->load->library(['ion_auth', 'form_validation']);
    ini_set('date.timezone', 'Asia/Jakarta');

    if (!$this->ion_auth->logged_in()) {
      redirect('auth', 'refresh');
    }
  }

  public function index()
  {
    $id = $this->session->userdata('id');
    $data = [
      "title" => $this->appname . " Administrator",
      "admin" => $this->ion_auth->in_group('admin'),
      "getAdmin" => $this->Admin_model->getIdAdmin($id),
      "jmlBlog" => $this->Admin_model->jumlahBlog($id),
      "jmlKategori" => $this->Admin_model->jumlahKategori(),
      "jmlAnggota" => $this->Admin_model->jumlahMember()
    ];

    $this->load->view('admin/dashboard', $data);
  }

  public function profile()
  {
    // $this->form_validation->set_rules('profil','Foto Profil','required');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('first', 'Nama Awalan', 'required');
    $this->form_validation->set_rules('last', 'Nama Akhiran', 'required');
    $this->form_validation->set_rules('org', 'Organisasi', 'required');
    $this->form_validation->set_rules('phone', 'No. Telepon', 'required');

    if ($this->form_validation->run() === FALSE) {
      $data = [
        "title" => $this->appname . " Settings",
        "admin" => $this->ion_auth->in_group('admin'),
        "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id'))
      ];

      $this->load->view('admin/profile', $data);
    } else {

      $id = $this->input->post('id', true);
      $user = $this->input->post('username', true);
      $first = $this->input->post('first', true);
      $last = $this->input->post('last', true);
      $org = $this->input->post('org', true);
      $phone = $this->input->post('phone', true);

      //Upload name image
      $profil = $_FILES['profil']['name'];

      // Default Image
      $da = $this->Admin_model->getAvatar()->row();
      $default = $da->nama_gambar;

      //Image null for unlink image
      $data['user'] = $this->db->get_where('users', ['id' => $id])->row_array();


      if ($profil) {
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = FCPATH . 'profil/';

        $this->load->library('upload', $config);


        if ($this->upload->do_upload('profil')) {
          $glama = $data['user']['img_profil'];

          //Tidak dipake dulu karena banyak user nantinya
          // if($glama != $default) {
          //   unlink(FCPATH.'profil/'.$glama);
          // }

          $profilbaru = $this->upload->data('file_name');

          $data = [
            "username" => $user,
            "img_profil" => $profilbaru,
            "first_name" => $first,
            "last_name" => $last,
            "company" => $org,
            "phone" => $phone,
            "di_update" => date("Y-m-d H:i:s")
          ];

          $this->Admin_model->update($data, $id);
        } else {
          $this->session->set_flashdata('msg', '<span class="alert alert-danger">' . $this->upload->display_errors() . '</span>');
          redirect('settings');
        }
      }

      $data = [
        "username" => $user,
        "first_name" => $first,
        "last_name" => $last,
        "company" => $org,
        "phone" => $phone,
        "di_update" => date("Y-m-d H:i:s")
      ];

      $cek = $this->Admin_model->update($data, $id);

      if ($cek) {
        $this->session->set_flashdata('msg', '<span class="alert alert-success">Data berhasil di update dari database.</span>');
        redirect('settings');
      } else {
        die("Gagal");
        $this->session->set_flashdata('msg', '<span class="alert alert-danger">Data gagal di update dari database.</span>');
        redirect('settings');
      }

      // die(var_dump($cek));
    }
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
