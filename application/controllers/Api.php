<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
  public function __construct() {
    parent::__construct();
    $this->load->model('Task_model');
    $this->output->set_content_type('application/json');
  }
    
  public function tasks() {
    $method = $this->input->method(TRUE);
    
    switch ($method) {
      case 'GET':
        $filters = array();
        if ($this->input->get('status')) $filters['status'] = $this->input->get('status');
        if ($this->input->get('priority')) $filters['priority'] = $this->input->get('priority');
        if ($this->input->get('category')) $filters['category'] = $this->input->get('category');
        
        $tasks = $this->Task_model->get_tasks($filters);
        $this->output->set_output(json_encode($tasks));
        break;
            
      case 'POST':
        $data = json_decode($this->input->raw_input_stream, true);
        $task_id = $this->Task_model->create_task($data);
        $this->output->set_output(json_encode(array('id' => $task_id)));
        break;
          
      default:
        $this->output->set_status_header(405);
        break;
    }
  }
  
  public function task($id) {
    $method = $this->input->method(TRUE);
      
    switch ($method) {
      case 'GET':
        $task = $this->Task_model->get_task($id);
        $this->output->set_output(json_encode($task));
        break;
          
      case 'PUT':
        $data = json_decode($this->input->raw_input_stream, true);
        $result = $this->Task_model->update_task($id, $data);
        $this->output->set_output(json_encode(array('success' => $result)));
        break;
          
      case 'DELETE':
        $result = $this->Task_model->delete_task($id);
        $this->output->set_output(json_encode(array('success' => $result)));
        break;
          
      default:
        $this->output->set_status_header(405);
        break;
    }
  }
  
  public function stats() {
    $stats = $this->Task_model->get_stats();
    $this->output->set_output(json_encode($stats));
  }
}