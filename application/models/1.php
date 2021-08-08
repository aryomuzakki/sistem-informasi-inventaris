<?php

class Barangmodel extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->from('tb_barang');
    $this->db->order_by('id', 'desc');

    $query = $this->db->get();

    return $query->result_array();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_barang');
  }
  
  public function insert_mahasiswa()
  {
    $data = array(
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'no_hp' => $this->input->post('no_hp'),
      'jurusan_id' => $this->input->post('jurusan_id'),
      'prodi_id' => $this->input->post('prodi_id'),
      'kelas' => $this->input->post('kelas')
    );
    
    return $this->db->insert('tb_barang', $data);
  }

  public function update_mahasiswa($id)
  {
    $data = array(
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'alamat' => $this->input->post('alamat'),
      'no_hp' => $this->input->post('no_hp'),
      'jurusan_id' => $this->input->post('jurusan_id'),
      'prodi_id' => $this->input->post('prodi_id'),
      'kelas' => $this->input->post('kelas')
    );
    
    if($id == 0) {
      return $this->db->insert('tb_barang', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_barang', $data);
    }
  }

  public function find_mahasiswa($id)
  {
    return $this->db->get_where('tb_barang', array('id' => $id))->row();
  }

  public function delete_mahasiswa($id)
  {
    return $this->db->delete('tb_barang', array('id' => $id));
  }
}
