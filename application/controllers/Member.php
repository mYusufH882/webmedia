<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
  public $appname = appname;    
  public function __construct()
  {
    parent::__construct();
    $this->load->library(['ion_auth','form_validation']);
    $this->load->model('Member_model');
    ini_set('date.timezone', 'Asia/Jakarta');

    if(!$this->ion_auth->logged_in()){
      redirect('auth','refresh');
    }
  }

  public function index()
  {
    $data = [
      "title" => $this->appname." Administrator",
      "getUser" =>  $this->ion_auth->users('members')->result(),
      "admin" =>  $this->ion_auth->users('admin')->result(),
      "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
    ];

    $this->load->view('admin/manggota/anggota', $data); 
  }

  public function addMember()
  {
    $data = [
      "title" => $this->appname." Administrator",
      "admin" =>  $this->ion_auth->users('admin')->result(),
      "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
    ];

    $this->load->view('admin/manggota/add_anggota', $data); 
  }

  function insertMember()
  {
    $this->form_validation->set_rules('first','First','required');
    $this->form_validation->set_rules('last','Last','required');
    $this->form_validation->set_rules('user','Username','required');
    $this->form_validation->set_rules('email','Email','required');
    $this->form_validation->set_rules('org','Organisasi','required');
    $this->form_validation->set_rules('pwd','Password','required|min_length[8]');
    $this->form_validation->set_rules('pwd2','Confirm Password','required|matches[pwd]');

    if($this->form_validation->run() === FALSE) {
      $this->session->set_flashdata('msg','<span class="text-danger mb-3">'.validation_errors().'</span>');
      redirect('tambah_anggota');
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
      
      $group = array('2');

      $cek = $this->ion_auth->register($user, $pwd, $email, $data, $group);

      if($cek) {
        $this->session->set_flashdata('msg','<span class="badge badge-success">Anggota telah ditambahkan.</span>');
        redirect('anggota');
      } else {
        $this->session->set_flashdata('msg','<span class="badge badge-danger">Anggota gagal ditambahkan.</span>');
        redirect('anggota');
      }
    }

  }

  public function editMember()
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
        "title" => $this->appname." Administrator",
        "admin" =>  $this->ion_auth->users('admin')->result(),
        "userGet" => $this->Member_model->getIdUser($this->uri->segment(2)),
        "getAdmin" => $this->Admin_model->getIdAdmin($this->session->userdata('id')),
      ];
      
      $this->session->set_flashdata('message','<span class="text-danger mb-3">'.validation_errors().'</span>');
      $this->load->view('admin/manggota/edit_anggota', $data); 
    
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
        'username' => $user,
        'email' => $email, 
        'company' => $org,
        'password' => $pwd,
        'di_update' => date('Y-m-d H:i:s')
      ];

      $cek = $this->ion_auth->update($this->uri->segment(2), $data);

      if($cek) {
        $this->session->set_flashdata('msg','<span class="badge badge-success">Anggota telah berhasil di update di database.</span>');
        redirect('anggota');
      } else {
        $this->session->set_flashdata('msg','<span class="badge badge-danger">Gagal saat update anggota.</span>');
        redirect('anggota');
      }
    }

  }

  function deleteMember()
  {
    $id = $this->input->post('id');

    $ceku = $this->ion_auth->delete_user($id);
    $cekg = $this->ion_auth->remove_from_group(1, $id);

    if($ceku && $cekg) {
      $this->session->set_flashdata('msg','<span class="badge badge-success">Anggota telah berhasil dihapus dari database.</span>');
      redirect('anggota');
    } else {
      $this->session->set_flashdata('msg','<span class="badge badge-danger">Anggota gagal dihapus dari database karena sudah memiliki postingan blog.</span>');
      redirect('anggota');
    }
  }

}


/* End of file Member.php */
/* Location: ./application/controllers/Member.php */