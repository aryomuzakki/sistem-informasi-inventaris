<?php

class Admin_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_admin');
    $this->db->order_by('id', 'desc');
    
    $query = $this->db->get(); 
    
    return $query->result();
  }
  
  public function get_by($email)
  {
    // $this->db->from('tb_admin');
    
    // $query = $this->db->get_where(); 
    $query = $this->db->get_where('tb_admin',['email' => $email]);
    
    // return $query->result();
    return $query->row();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_admin');
  }
  
  public function insert_admin()
  {
    $data = array(
      'kode_admin' => $this->input->post('kode_admin'),
      'nama_admin' => $this->input->post('nama_admin')
    );
    
    return $this->db->insert('tb_admin', $data);
  }

  public function update_admin($id)
  {
    $data = array(
      'kode_admin' => $this->input->post('kode_admin'),
      'nama_admin' => $this->input->post('nama_admin')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_admin', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_admin', $data);
    }
  }

  public function find_admin($id)
  {
    return $this->db->get_where('tb_admin', array('id' => $id))->row();
  }

  public function delete_admin($id)
  {
    return $this->db->delete('tb_admin', array('id' => $id));
  }
}
