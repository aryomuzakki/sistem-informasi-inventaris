<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_controller extends CI_Controller
{

  public $kategori;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    $this->load->model('Kategori_model');

    $this->kategori = new Kategori_model;

    if ($this->session->has_userdata('login') == FALSE ) {
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $data['data'] = $this->kategori->get_all();

    $this->load->view('theme/header');
    $this->load->view('kategori/list', $data);
    $this->load->view('theme/footer');
  }

  public function show($id)
  {
    $data['kategori'] = $this->kategori->find_kategori($id);

    $this->load->view('theme/header');
    $this->load->view('kategori/show', $data);
    $this->load->view('theme/footer');
  }

  public function create()
  {
    $this->load->view('theme/header');
    $this->load->view('kategori/create');
    $this->load->view('theme/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->create();
    } else {
      $this->kategori->insert_kategori();
      $this->session->set_flashdata('message', 'Data Kategori Berhasil Ditambah');
      redirect(base_url('kategori'));
    }
  }

  public function edit($id)
  {
    $data['kategori'] = $this->kategori->find_kategori($id);

    $this->load->view('theme/header');
    $this->load->view('kategori/edit', $data);
    $this->load->view('theme/footer');
  }

  public function update($id)
  {
    $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('message', validation_errors());
      redirect(base_url('kategori/edit/' . $id));
    } else {
      $this->session->set_flashdata('message', 'Data Kategori Berhasil Diubah');
      $this->kategori->update_kategori($id);
      redirect(base_url('kategori'));
    }
  }

  public function delete($id)
  {
    $this->kategori->delete_kategori($id);
    $this->session->set_flashdata('message', 'Data Kategori Berhasil Dihapus');
  }
}
