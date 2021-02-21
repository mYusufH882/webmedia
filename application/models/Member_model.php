<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Member_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Member_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public function getIdUser($id)
  {
    $query = $this->db->get_where('users', ['id' => $id]);

    return $query->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Member_model.php */
/* Location: ./application/models/Member_model.php */