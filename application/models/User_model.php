<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public function getTentang()
  {
    $query = $this->db->get('tentang');

    return $query;
  }

  // ------------------------------------------------------------------------
  function dukunganEmail($email)
  {
    $query = $this->db->insert('dukungan_email', ["email" => $email]);

    return $query;
  }

  // ------------------------------------------------------------------------
  function BlogPagination($limit, $offset)
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('users','users.id = blog.id_user');
    $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
    $this->db->limit($limit, $offset);
    $this->db->order_by('judul_blog','ASC');
		$data = $this->db->get();
		return $data;

  }

  // ------------------------------------------------------------------------
  public function getSlugKategori($slug)
  {
    $query = $this->db->get_where('kategori', ['kategori_slug' => $slug]);

    return $query;
  }

  // ------------------------------------------------------------------------
  public function getSlugBlog($slug)
  {
    $this->db->select('*');
    $this->db->from('blog');
    $this->db->join('users','users.id = blog.id_user');
    $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
    $this->db->where('blog.slug_blog', $slug);
    $query = $this->db->get();

    return $query;
  }

  // ------------------------------------------------------------------------
    public function getSlugJudul($slug)
    {
      $this->db->select('*');
      $this->db->from('blog');
      $this->db->join('users','users.id = blog.id_user');
      $this->db->join('kategori','kategori.id_kategori = blog.id_kategori');
      $this->db->where('kategori.kategori_slug', $slug);
      $query = $this->db->get();
  
      return $query;
    }

  // ------------------------------------------------------------------------
  function totalKategori()
  {
    $this->db->select('kategori.*,kategori.kategori_nama, kategori.kategori_slug, COUNT(blog.id_kategori) AS total');
    $this->db->from('blog');
    $this->db->join('kategori', 'kategori.id_kategori = blog.id_kategori');
    $this->db->group_by('blog.id_kategori');
    $query = $this->db->get();

    if($query->num_rows() > 0) {
      return $query->result();
    }
  }

  // ------------------------------------------------------------------------
  function hitungBaca($slug)
  {
    $this->db->set('yang_baca','yang_baca + 1', FALSE);
    $this->db->where('slug_blog', $slug);
    $this->db->update('blog');
  }

  // ------------------------------------------------------------------------
  function popularBlog()
  {
    $this->db->select('judul_blog, gambar_blog, slug_blog, dibuat, yang_baca');
    $this->db->limit(6);
    $query = $this->db->get_where('blog', ['yang_baca >=' => 3 ]);

    return $query;
  }

  // ------------------------------------------------------------------------
  function kirimKomentar($data)
  {
    $query = $this->db->insert('komentar', $data);

    return $query;
  }

  // ------------------------------------------------------------------------
  function tampilkanKomentar()
  {
    $query = $this->db->get_where('komentar',['komen_status' => 0]);

    return $query;
  }


  // ------------------------------------------------------------------------
  function kirimBalasan($data)
  {
    $query = $this->db->insert('komentar', $data);

    return $query;
  }

  // ------------------------------------------------------------------------
  function hitKom()
  {
    $query = $this->db->count_all('komentar');

    return $query;
	}
	
	// ------------------------------------------------------------------------
	function Blog()
	{
		$query = $this->db->get('blog');

		return $query;
	}

  // ------------------------------------------------------------------------
  function latestBaru()
  {
    
  }

  // ------------------------------------------------------------------------
  function lastBlog()
  {

  }
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
