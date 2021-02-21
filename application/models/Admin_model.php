<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

  // ------------------------------------------------------------------------

  function __construct()
  {
    parent::__construct();
  }
  // ------------------------------------------------------------------------
  function getAvatar()
  {
    $query = $this->db->get('avatar');

    return $query;
  }
  // ------------------------------------------------------------------------
  function update($data, $id)
  {
    $this->db->set($data);
    $this->db->where(['id' => $id]);
    $query = $this->db->update('users');

    return $query;
  }

  // ------------------------------------------------------------------------
  function jumlahBlog($id)
  {
    // $this->db->count_all_results('blog');
    $query = $this->db->get_where('blog', ['id_user' => $id]);

    return $query->num_rows();
  }

  // ------------------------------------------------------------------------
  function jumlahKategori()
  {
    $query = $this->db->count_all_results('kategori');

    return $query;
  }

  // ------------------------------------------------------------------------
  function jumlahMember()
  {
    $query = $this->db->get_where('users_groups', ['group_id' => 2]);

    return $query->num_rows();
  }

  // ------------------------------------------------------------------------
  function getIdAdmin($id)
  {
     $query = $this->db->get_where('users',['id' => $id]);
     
     return $query->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */