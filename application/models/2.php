<?php

class KategoriModel extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_kategori');
    $this->db->order_by('id', 'desc');

    $query = $this->db->get();

    return $query->result_array();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_kategori');
  }
}
