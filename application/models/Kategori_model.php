<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  function getIdAdmin($id)
  {
     $query = $this->db->get_where('users',['id' => $id]);
     return $query->row();
  }
  // ------------------------------------------------------------------------
  function getIdKategori($id)
  {
    $query = $this->db->get_where('kategori', ['id_kategori' => $id]);

    return $query;
  }

  // ------------------------------------------------------------------------
  function getKategori()
  {
    $this->db->order_by('kategori_nama', 'ASC');
    $query = $this->db->get('kategori');

    return $query;
  }

  // ------------------------------------------------------------------------
  function insertKategori($data)
  {
    $query = $this->db->insert('kategori', $data);

    return $query;
  }

  // ------------------------------------------------------------------------
  function upgradeKategori($idk, $data)
  {
    $query = $this->db->set($data);
    $query->where(['id_kategori' => $idk]);

    return $query->update('kategori');
  }

  // ------------------------------------------------------------------------
  function destroyKategori($idk)
  {
    $query = $this->db->delete('kategori', ['id_kategori' => $idk]);

    return $query;
  }

  // ------------------------------------------------------------------------
}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */