$(document).ready(function() {
  // Handle status change
  $('.status-select').on('change', function() {
    const taskId = $(this).data('task-id');
    const newStatus = $(this).val();
    const $select = $(this);
    
    // Show loading
    $select.prop('disabled', true);
    
    $.ajax({
      url: base_url + 'tasks/update_status/' + taskId,
      method: 'POST',
      data: {
        status: newStatus
      },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          // Update badge class based on status
          let badgeClass = 'bg-warning';
          if (newStatus === 'completed') badgeClass = 'bg-success';
          else if (newStatus === 'in_progress') badgeClass = 'bg-info';
          
          // Show success message
          showNotification('Task status updated successfully!', 'success');
        } else {
          showNotification('Failed to update task status', 'error');
        }
      },
      error: function() {
        showNotification('An error occurred', 'error');
      },
      complete: function() {
        $select.prop('disabled', false);
      }
    });
  });
  
  // Auto-hide alerts
  setTimeout(function() {
    $('.alert').fadeOut('slow');
  }, 5000);
  
  // Confirm delete
  $('a[href*="delete"]').on('click', function(e) {
    if (!confirm('Are you sure you want to delete this task?')) {
      e.preventDefault();
    }
  });
  
  // Form validation
  $('form').on('submit', function(e) {
    let isValid = true;
    
    // Check required fields
    $(this).find('input[required], select[required], textarea[required]').each(function() {
      if ($(this).val() === '') {
        $(this).addClass('is-invalid');
        isValid = false;
      } else {
        $(this).removeClass('is-invalid');
      }
    });
    
    if (!isValid) {
      e.preventDefault();
      showNotification('Please fill in all required fields', 'error');
    }
  });
  
  // Real-time search
  let searchTimeout;
  $('input[name="search"]').on('input', function() {
    clearTimeout(searchTimeout);
    const $form = $(this).closest('form');
    
    searchTimeout = setTimeout(function() {
      $form.submit();
    }, 500);
  });
});

// Base URL for AJAX requests
const base_url = window.location.origin + '/taskflow/';

// Show notification function
function showNotification(message, type) {
  const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
  const alertHtml = `
    <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
      ${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  `;
  
  $('body').prepend(alertHtml);
  
  setTimeout(function() {
    $('.alert').fadeOut('slow');
  }, 3000);
}

// Task management functions
const TaskFlow = {
  // Load tasks via AJAX
  loadTasks: function(filters = {}) {
    $.ajax({
      url: base_url + 'api/tasks',
      method: 'GET',
      data: filters,
      dataType: 'json',
      success: function(tasks) {
        TaskFlow.renderTasks(tasks);
      },
      error: function() {
        showNotification('Failed to load tasks', 'error');
      }
    });
  },
  
  // Render tasks in table
  renderTasks: function(tasks) {
    const $tbody = $('.table tbody');
    $tbody.empty();
    
    if (tasks.length === 0) {
      $tbody.append('<tr><td colspan="6" class="text-center">No tasks found</td></tr>');
      return;
    }
    
    tasks.forEach(function(task) {
      const row = TaskFlow.createTaskRow(task);
      $tbody.append(row);
    });
  },
  
  // Create task row HTML
  createTaskRow: function(task) {
    const priorityClass = task.priority === 'high' ? 'bg-danger' : 
                          task.priority === 'medium' ? 'bg-warning' : 'bg-secondary';
    
    const statusClass = task.status === 'completed' ? 'bg-success' : 
                        task.status === 'in_progress' ? 'bg-info' : 'bg-warning';
      
    return `
      <tr>
        <td>
          <strong>${task.title}</strong><br>
          <small class="text-muted">${task.description.substring(0, 100)}...</small>
        </td>
        <td>
          <span class="badge" style="background-color: ${task.category_color}">
            ${task.category_name}
          </span>
        </td>
        <td>
          <span class="badge ${priorityClass}">
            ${task.priority.charAt(0).toUpperCase() + task.priority.slice(1)}
          </span>
        </td>
        <td>
          <select class="form-select form-select-sm status-select" data-task-id="${task.id}">
            <option value="pending" ${task.status === 'pending' ? 'selected' : ''}>Pending</option>
            <option value="in_progress" ${task.status === 'in_progress' ? 'selected' : ''}>In Progress</option>
            <option value="completed" ${task.status === 'completed' ? 'selected' : ''}>Completed</option>
          </select>
        </td>
        <td>${new Date(task.due_date).toLocaleDateString()}</td>
        <td>
          <div class="btn-group" role="group">
            <a href="${base_url}tasks/edit/${task.id}" class="btn btn-sm btn-outline-primary">
              <i class="fas fa-edit"></i>
            </a>
            <a href="${base_url}tasks/delete/${task.id}" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
              <i class="fas fa-trash"></i>
            </a>
          </div>
        </td>
      </tr>
    `;
  }
};