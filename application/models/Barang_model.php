<?php

class Barang_model extends CI_Model
{

  public function __construct()
  {
    $this->load->database();
  }

  public function get_all()
  {
    $this->db->select('b.id, b.nama, b.merek, b.rincian, b.jumlah, b.status, b.keterangan, k.nama_kategori');
    $this->db->from('tb_barang as b');
    $this->db->join('tb_kategori as k', 'b.id_kategori = k.id', 'left');
    $this->db->order_by('b.id', 'desc');

    $query = $this->db->get();

    return $query->result();
  }

  public function rows_count()
  {
    return $this->db->count_all('tb_barang');
  }
  
  public function insert_barang()
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'merek' => $this->input->post('merek'),
      'rincian' => $this->input->post('rincian'),
      'jumlah' => $this->input->post('jumlah'),
      'status' => $this->input->post('status'),
      'keterangan' => $this->input->post('keterangan'),
      'id_kategori' => $this->input->post('id_kategori'),
    );
    
    return $this->db->insert('tb_barang', $data);
  }

  public function update_barang($id)
  {
    $data = array(
      'nama' => $this->input->post('nama'),
      'merek' => $this->input->post('merek'),
      'rincian' => $this->input->post('rincian'),
      'jumlah' => $this->input->post('jumlah'),
      'status' => $this->input->post('status'),
      'keterangan' => $this->input->post('keterangan'),
      'id_kategori' => $this->input->post('id_kategori'),
    );
    
    if($id == 0) {
      return $this->db->insert('tb_barang', $data);
    } else {
      $this->db->where('id', $id);
      return $this->db->update('tb_barang', $data);
    }
  }

  public function find_barang($id)
  {
    return $this->db->get_where('tb_barang', array('id' => $id))->row();
  }

  public function delete_barang($id)
  {
    return $this->db->delete('tb_barang', array('id' => $id));
  }
}
