<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
  public $appname = "Yaibaz";
    
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data = [
      "title" => $this->appname.' (Page Not Found)'
    ]; 

    $this->load->view('errors/e404', $data);
  }

}


/* End of file Notfound.php */
/* Location: ./application/controllers/Notfound.php */