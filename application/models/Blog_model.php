<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  function getIdBlog($id)
  {
    $this->db->select('');
    $this->db->from('blog');
    $this->db->join('users','users.id = blog.id_user');
    $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
    $this->db->where('blog.id_blog', $id);
    $query = $this->db->get();

    return $query;
  }

  // ------------------------------------------------------------------------
  function getUserBlog($id)
  {
    $this->db->select('');
    $this->db->from('blog');
    $this->db->join('users','users.id = blog.id_user');
    $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
    $this->db->where('blog.id_user', $id);
    $query = $this->db->get();

    return $query;
  }

  // ------------------------------------------------------------------------
  function getGambarBlog($id)
  {
    $query = $this->db->get_where('blog', ['id_blog' => $id]);

    return $query;
  }

  // ------------------------------------------------------------------------
  function getBlog()
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('users','users.id = blog.id_user');
    $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
    $query = $this->db->get();

    return $query;
  }

  // ------------------------------------------------------------------------
  function insertBlog($data)
  {
    $query = $this->db->insert('blog', $data);

    return $query;
  }
  // ------------------------------------------------------------------------
  function editBlog($data, $id)
  {
    $this->db->set($data);
    $this->db->where(['id_blog' => $id]);
    $query = $this->db->update('blog');

    return $query;
  }

  // ------------------------------------------------------------------------
  function destroyBlog($id)
  {
    $query = $this->db->delete('blog', ['id_blog' => $id]);

    return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Blog_model.php */
/* Location: ./application/models/Blog_model.php */