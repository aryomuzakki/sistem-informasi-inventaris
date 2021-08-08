<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_controller extends CI_Controller
{

  public $barang;
  public $kategori;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    $this->load->model('Barang_model');
    $this->load->model('Kategori_model');

    $this->barang = new Barang_model;
    $this->kategori = new Kategori_model;

  }

  public function index()
  { 
    $data['data'] = $this->barang->get_all();

    $this->load->view('theme/header');
    $this->load->view('barang/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['barang'] = $this->barang->find_barang($id);

    $this->load->view('theme/header');
    $this->load->view('barang/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $data['kategori'] = $this->kategori->get_all();
    
    $this->load->view('theme/header');
    $this->load->view('barang/create', $data);
    $this->load->view('theme/footer', $data);
  }

  public function store()
  {
    $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('merek', 'Merek', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('rincian', 'Rincian', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->barang->insert_barang();
      $this->session->set_flashdata('message', 'Data Barang Berhasil Ditambah');
      redirect(base_url('barang'));
    }
  }

  public function edit($id)
  {
    $data = array(
      'kategori' => $this->kategori->get_all(),
      'barang' => $this->barang->find_barang($id)
    );

    $this->load->view('theme/header');
    $this->load->view('barang/edit', $data);
    $this->load->view('theme/footer', $data);
  }

  public function update($id)
  {
    $this->form_validation->set_rules('id_kategori', 'Nama Kategori', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('nama', 'Nama', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('merek', 'Merek', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('rincian', 'Rincian', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('jumlah', 'Jumlah', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('status', 'Status', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('barang/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Barang Berhasil Diubah');
      $this->barang->update_barang($id);
      redirect(base_url('barang'));
    }
  }

  public function delete($id)
  {
    $this->barang->delete_barang($id);
    $this->session->set_flashdata('message', 'Data Barang Berhasil Dihapus');
  }
}
