<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
  
  public $barang;
  public $kategori;

  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');
    
    $this->load->model('Barang_model');
    $this->load->model('Kategori_model');
    // $this->load->model('BarangModel', 'barang');
    // $this->load->model('KategoriModel', 'kategori');

    $this->barang = new Barang_model;
    $this->kategori = new Kategori_model;

    if ($this->session->has_userdata('login') == FALSE) {
      redirect(base_url('login'));
    }
  }
  
	public function index()
	{
    $data = array(
      'barang_rows'      =>  $this->barang->rows_count(),
      'kategori_rows'        =>  $this->kategori->rows_count(),
      'kategori_all'        =>  $this->kategori->get_all()
    );

		$this->load->view('theme/header');
		$this->load->view('welcome_message', $data);
		$this->load->view('theme/footer');
	}
}
