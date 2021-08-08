<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JSON extends CI_Controller {
    public function grafikBarang($waktu = false){
        if($this->session->has_userdata('login')){
            $this->load->database();

            $kategori   =   $this->input->get('kategori');
            $status   =   $this->input->get('status');
            

            $grafikBarangLabel  =   [];
            $grafikBarangData   =   [];

            $this->db->select('nama, count(id) as jumlahBarang');

            if(!is_null($kategori)){
                $kategori   =   trim($kategori);
                if(!empty($kategori)){
                    $this->db->where('id_kategori', $kategori);
                }
            }
            if(!is_null($status)){
                $status   =   trim($status);
                if(!empty($status)){
                    $this->db->where('status', $status);
                }
            }

            $this->db->group_by('nama');
            $allBarang  =   $this->db->get('tb_barang')->result_array();
            
            if(count($allBarang) >= 1){
                foreach($allBarang as $barang){
                    $namaBarang     =   $barang['nama'];
                    $jumlahBarang   =   $barang['jumlahBarang'];

                    array_push($grafikBarangLabel, $namaBarang);
                    array_push($grafikBarangData, $jumlahBarang);
                }
            }

            $grafikBarang   =   [
                'label' =>  $grafikBarangLabel,
                'data'  =>  $grafikBarangData
            ];

            header('Content-Type:application/json');
            echo json_encode(['grafikBarang' => $grafikBarang]);
        }
    }
}
