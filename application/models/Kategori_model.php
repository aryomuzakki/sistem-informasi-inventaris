<?php

class Kategori_model extends CI_Model
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
    
    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_kategori');
  }
  
  public function insert_kategori()
  {
    $data = array(
      'nama_kategori' => $this->input->post('nama_kategori')
    );
    
    return $this->db->insert('tb_kategori', $data);
  }

  public function update_kategori($id)
  {
    $data = array(
      'nama_kategori' => $this->input->post('nama_kategori')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_kategori', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_kategori', $data);
    }
  }

  public function find_kategori($id)
  {
    return $this->db->get_where('tb_kategori', array('id' => $id))->row();
  }

  public function delete_kategori($id)
  {
    return $this->db->delete('tb_kategori', array('id' => $id));
  }
}
