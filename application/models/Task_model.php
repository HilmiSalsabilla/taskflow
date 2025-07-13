<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {
    
  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
    
  /**
   * Get all tasks with optional filtering
   */
  public function get_tasks($filters = array()) {
    $this->db->select('t.*, c.name as category_name, c.color as category_color');
    $this->db->from('tasks t');
    $this->db->join('categories c', 't.category = c.name', 'left');
    
    // Apply filters
    if (!empty($filters['status'])) {
      $this->db->where('t.status', $filters['status']);
    }
    if (!empty($filters['priority'])) {
      $this->db->where('t.priority', $filters['priority']);
    }
    if (!empty($filters['category'])) {
      $this->db->where('t.category', $filters['category']);
    }
    if (!empty($filters['search'])) {
      $this->db->group_start();
      $this->db->like('t.title', $filters['search']);
      $this->db->or_like('t.description', $filters['search']);
      $this->db->group_end();
    }
    
    $this->db->order_by('t.created_at', 'DESC');
    return $this->db->get()->result_array();
  }
    
  /**
   * Get single task by ID
   */
  public function get_task($id) {
    $this->db->select('t.*, c.name as category_name, c.color as category_color');
    $this->db->from('tasks t');
    $this->db->join('categories c', 't.category = c.name', 'left');
    $this->db->where('t.id', $id);
    return $this->db->get()->row_array();
  }
    
  /**
   * Create new task
   */
  public function create_task($data) {
    $task_data = array(
      'title' => $data['title'],
      'description' => $data['description'],
      'priority' => $data['priority'],
      'category' => $data['category'],
      'status' => isset($data['status']) ? $data['status'] : 'pending',
      'due_date' => $data['due_date']
    );
    
    $this->db->insert('tasks', $task_data);
    return $this->db->insert_id();
  }
  
  /**
   * Update task
   */
  public function update_task($id, $data) {
    $task_data = array();
    
    if (isset($data['title'])) $task_data['title'] = $data['title'];
    if (isset($data['description'])) $task_data['description'] = $data['description'];
    if (isset($data['priority'])) $task_data['priority'] = $data['priority'];
    if (isset($data['category'])) $task_data['category'] = $data['category'];
    if (isset($data['status'])) $task_data['status'] = $data['status'];
    if (isset($data['due_date'])) $task_data['due_date'] = $data['due_date'];
    
    $this->db->where('id', $id);
    return $this->db->update('tasks', $task_data);
  }
    
  /**
   * Delete task
   */
  public function delete_task($id) {
    $this->db->where('id', $id);
    return $this->db->delete('tasks');
  }
    
  /**
   * Get dashboard statistics
   */
  public function get_stats() {
    $stats = array();
    
    // Total tasks
    $stats['total_tasks'] = $this->db->count_all('tasks');
    
    // Tasks by status
    $this->db->select('status, COUNT(*) as count');
    $this->db->from('tasks');
    $this->db->group_by('status');
    $status_counts = $this->db->get()->result_array();
    
    $stats['by_status'] = array();
    foreach ($status_counts as $status) {
      $stats['by_status'][$status['status']] = $status['count'];
    }
      
    // Tasks by priority
    $this->db->select('priority, COUNT(*) as count');
    $this->db->from('tasks');
    $this->db->group_by('priority');
    $priority_counts = $this->db->get()->result_array();
    
    $stats['by_priority'] = array();
    foreach ($priority_counts as $priority) {
      $stats['by_priority'][$priority['priority']] = $priority['count'];
    }
    
    // Overdue tasks
    $this->db->where('due_date <', date('Y-m-d'));
    $this->db->where('status !=', 'completed');
    $stats['overdue'] = $this->db->count_all_results('tasks');
    
    return $stats;
  }
    
  /**
   * Get all categories
   */
  public function get_categories() {
    return $this->db->get('categories')->result_array();
  }
}