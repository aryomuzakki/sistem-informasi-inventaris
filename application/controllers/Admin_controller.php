<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {
  
  public $admin;

  public function __construct()
  {
    parent::__construct();

    $this->load->library(['form_validation', 'session']);
    
    $this->load->helper(array('form', 'url'));
    
    $this->load->model('Admin_model');

    $this->admin = new Admin_model;

  }
  
	public function index()
  {
    if ($this->session->has_userdata('login')) {
      redirect(base_url());
    } else {
      $this->load->view('admin/login');
      $this->session->set_flashdata('errorMessage', '');
    }
  }
	
  public function login()
	{
    $this->form_validation->set_rules('email', 'Email', 'required', array('required' => '%s tidak boleh kosong'));
    $this->form_validation->set_rules('password', 'Password', 'required', array('required' => '%s tidak boleh kosong'));

    if ($this->form_validation->run() == FALSE) {
      $this->session->set_flashdata('errorMessage', validation_errors(), 300);
      redirect(base_url('login'));
    } else {
    
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $admin = $this->admin->get_by($email);
      
      if ($admin == NULL) {
        $this->session->set_flashdata('errorMessage', 'Mohon periksa kembali email atau password Anda.', 300);
        redirect(base_url('login'));
      }
      
      
      if(strcmp($password,$admin->password)) {
        $this->session->set_flashdata('errorMessage', 'Mohon periksa kembali email atau password Anda.', 300);
        redirect(base_url('login'));
      }
      
      $data = array(
        'login' => TRUE,
        'id' => $admin->id,
        'name' => $admin->name,
        'email' => $admin->email,
      );
      
      
      $this->session->set_userdata($data);
      
      redirect(base_url());
    }
	}
  
  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }
}
