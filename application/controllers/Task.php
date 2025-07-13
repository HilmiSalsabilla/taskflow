<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tasks extends CI_Controller {
    
  public function __construct() {
    parent::__construct();
    $this->load->model('Task_model');
    $this->load->library('form_validation');
    $this->load->library('session');
  }
    
  public function index() {
    $filters = array();
    
    // Get filter parameters
    if ($this->input->get('status')) {
      $filters['status'] = $this->input->get('status');
    }
    if ($this->input->get('priority')) {
      $filters['priority'] = $this->input->get('priority');
    }
    if ($this->input->get('category')) {
      $filters['category'] = $this->input->get('category');
    }
    if ($this->input->get('search')) {
      $filters['search'] = $this->input->get('search');
    }
    
    $data['tasks'] = $this->Task_model->get_tasks($filters);
    $data['categories'] = $this->Task_model->get_categories();
    $data['filters'] = $filters;
    
    $this->load->view('templates/header', array('title' => 'Tasks'));
    $this->load->view('tasks/index', $data);
    $this->load->view('templates/footer');
  }
    
  public function create() {
    if ($this->input->post()) {
      $this->form_validation->set_rules('title', 'Title', 'required|max_length[255]');
      $this->form_validation->set_rules('description', 'Description', 'required');
      $this->form_validation->set_rules('priority', 'Priority', 'required|in_list[low,medium,high]');
      $this->form_validation->set_rules('category', 'Category', 'required');
      $this->form_validation->set_rules('due_date', 'Due Date', 'required');
        
      if ($this->form_validation->run() == TRUE) {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'priority' => $this->input->post('priority'),
            'category' => $this->input->post('category'),
            'due_date' => $this->input->post('due_date')
        );
          
        $task_id = $this->Task_model->create_task($data);
          
        if ($task_id) {
          $this->session->set_flashdata('success', 'Task created successfully!');
          redirect('tasks');
        } else {
          $this->session->set_flashdata('error', 'Failed to create task.');
        }
      }
    }
      
      $data['categories'] = $this->Task_model->get_categories();
      
      $this->load->view('templates/header', array('title' => 'Create Task'));
      $this->load->view('tasks/create', $data);
      $this->load->view('templates/footer');
  }
    
  public function edit($id) {
    $task = $this->Task_model->get_task($id);
    
    if (!$task) {
        show_404();
    }
      
    if ($this->input->post()) {
      $this->form_validation->set_rules('title', 'Title', 'required|max_length[255]');
      $this->form_validation->set_rules('description', 'Description', 'required');
      $this->form_validation->set_rules('priority', 'Priority', 'required|in_list[low,medium,high]');
      $this->form_validation->set_rules('category', 'Category', 'required');
      $this->form_validation->set_rules('status', 'Status', 'required|in_list[pending,in_progress,completed]');
      $this->form_validation->set_rules('due_date', 'Due Date', 'required');
        
      if ($this->form_validation->run() == TRUE) {
        $data = array(
            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'priority' => $this->input->post('priority'),
            'category' => $this->input->post('category'),
            'status' => $this->input->post('status'),
            'due_date' => $this->input->post('due_date')
        );
          
        if ($this->Task_model->update_task($id, $data)) {
          $this->session->set_flashdata('success', 'Task updated successfully!');
          redirect('tasks');
        } else {
          $this->session->set_flashdata('error', 'Failed to update task.');
        }
      }
    }
      
      $data['task'] = $task;
      $data['categories'] = $this->Task_model->get_categories();
      
      $this->load->view('templates/header', array('title' => 'Edit Task'));
      $this->load->view('tasks/edit', $data);
      $this->load->view('templates/footer');
  }
    
  public function delete($id) {
    $task = $this->Task_model->get_task($id);
    
    if (!$task) {
      show_404();
    }
    
    if ($this->Task_model->delete_task($id)) {
      $this->session->set_flashdata('success', 'Task deleted successfully!');
    } else {
      $this->session->set_flashdata('error', 'Failed to delete task.');
    }
    
    redirect('tasks');
  }
  
  public function update_status($id) {
    $status = $this->input->post('status');
    
    if ($this->Task_model->update_task($id, array('status' => $status))) {
      echo json_encode(array('success' => true));
    } else {
      echo json_encode(array('success' => false));
    }
  }
}