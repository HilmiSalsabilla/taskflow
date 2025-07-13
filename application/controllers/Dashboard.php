<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
  public function __construct() {
    parent::__construct();
    $this->load->model('Task_model');
    $this->load->library('session');
  }
    
  public function index() {
    $data['stats'] = $this->Task_model->get_stats();
    $data['recent_tasks'] = $this->Task_model->get_tasks(array('limit' => 5));
    $data['categories'] = $this->Task_model->get_categories();
    
    $this->load->view('templates/header', array('title' => 'Dashboard'));
    $this->load->view('dashboard/index', $data);
    $this->load->view('templates/footer');
  }
}