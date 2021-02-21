<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Secret extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->library(['ion_auth','form_validation']);
    $this->load->model('Member_model');
    ini_set('date.timezone', 'Asia/Jakarta');
  }

  public function registrasi()
  {
    $this->form_validation->set_rules('first','First','required');
    $this->form_validation->set_rules('last','Last','required');
    $this->form_validation->set_rules('user','Username','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('org','Organisasi','required');
    $this->form_validation->set_rules('pwd','Password','min_length[8]');
    $this->form_validation->set_rules('pwd2','Confirm Password','matches[pwd]');

    if($this->form_validation->run() === FALSE) {
      
      $data = [
        "title" => 'Register Admin'
      ];

      $this->session->set_flashdata('msg','<span class="text-danger mb-3">'.validation_errors().'</span>');
      $this->load->view('auth/register', $data);
    
    } else {
      $awal = $this->input->post('first');
      $akhir = $this->input->post('last');
      $user = $this->input->post('user');
      $email = $this->input->post('email');
      $org = $this->input->post('org');
      $pwd = $this->input->post('pwd');
  
      $data = [
				'first_name' => $awal,
				'last_name' => $akhir,
        'img_profil' => 'default.png',
        'company' => $org,
        'password' => $pwd,
        'created_on' => date('Y-m-d H:i:s')
      ]; 
      
      $group = array('1');

      $cek = $this->ion_auth->register($user, $pwd, $email, $data, $group);

      if($cek) {
        $this->session->set_flashdata('msg','<span class="badge badge-success">Anda telah terdaftar sebagai <span class="text-white text-center text-bold">Admin</span>.</span>');
        redirect('login');
      } else {
        $this->session->set_flashdata('msg','<span class="badge badge-danger">Gagal registrasi.</span>');
        redirect('registadmin');
      }
    }

  }

}


/* End of file Secret.php */
/* Location: ./application/controllers/Secret.php */
