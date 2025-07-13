<div class="row">
  <div class="col-md-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1>Tasks</h1>
      <a href="<?php echo base_url('tasks/create'); ?>" class="btn btn-primary">
        <i class="fas fa-plus"></i> New Task
      </a>
    </div>
  </div>
</div>

<!-- Filters -->
<div class="row mb-4">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <form method="GET" action="<?php echo base_url('tasks'); ?>">
          <div class="row">
            <div class="col-md-3">
              <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="pending" <?php echo (isset($filters['status']) && $filters['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                <option value="in_progress" <?php echo (isset($filters['status']) && $filters['status'] == 'in_progress') ? 'selected' : ''; ?>>In Progress</option>
                <option value="completed" <?php echo (isset($filters['status']) && $filters['status'] == 'completed') ? 'selected' : ''; ?>>Completed</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="priority" class="form-select">
                <option value="">All Priorities</option>
                <option value="high" <?php echo (isset($filters['priority']) && $filters['priority'] == 'high') ? 'selected' : ''; ?>>High</option>
                <option value="medium" <?php echo (isset($filters['priority']) && $filters['priority'] == 'medium') ? 'selected' : ''; ?>>Medium</option>
                <option value="low" <?php echo (isset($filters['priority']) && $filters['priority'] == 'low') ? 'selected' : ''; ?>>Low</option>
              </select>
            </div>
            <div class="col-md-3">
              <select name="category" class="form-select">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category): ?>
                  <option value="<?php echo $category['name']; ?>" <?php echo (isset($filters['category']) && $filters['category'] == $category['name']) ? 'selected' : ''; ?>>
                    <?php echo $category['name']; ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-3">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search tasks..." value="<?php echo isset($filters['search']) ? $filters['search'] : ''; ?>">
                <button class="btn btn-outline-secondary" type="submit">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tasks Table -->
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <?php if (!empty($tasks)): ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Due Date</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($tasks as $task): ?>
                  <tr>
                    <td>
                      <strong><?php echo $task['title']; ?></strong>
                      <br>
                      <small class="text-muted"><?php echo substr($task['description'], 0, 100); ?>...</small>
                    </td>
                    <td>
                      <span class="badge" style="background-color: <?php echo $task['category_color']; ?>">
                        <?php echo $task['category_name']; ?>
                      </span>
                    </td>
                    <td>
                      <span class="badge <?php echo $task['priority'] == 'high' ? 'bg-danger' : ($task['priority'] == 'medium' ? 'bg-warning' : 'bg-secondary'); ?>">
                        <?php echo ucfirst($task['priority']); ?>
                      </span>
                    </td>
                    <td>
                      <select class="form-select form-select-sm status-select" data-task-id="<?php echo $task['id']; ?>">
                        <option value="pending" <?php echo $task['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                        <option value="in_progress" <?php echo $task['status'] == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
                        <option value="completed" <?php echo $task['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                      </select>
                    </td>
                    <td>
                      <?php
                      $due_date = strtotime($task['due_date']);
                      $today = strtotime(date('Y-m-d'));
                      $is_overdue = $due_date < $today && $task['status'] != 'completed';
                      ?>
                      <span class="<?php echo $is_overdue ? 'text-danger' : ''; ?>">
                        <?php echo date('M j, Y', $due_date); ?>
                        <?php if ($is_overdue): ?>
                          <i class="fas fa-exclamation-triangle"></i>
                        <?php endif; ?>
                      </span>
                    </td>
                    <td>
                      <div class="btn-group" role="group">
                        <a href="<?php echo base_url('tasks/edit/' . $task['id']); ?>" class="btn btn-sm btn-outline-primary">
                          <i class="fas fa-edit"></i>
                        </a>
                        <a href="<?php echo base_url('tasks/delete/' . $task['id']); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this task?')">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <div class="text-center py-5">
            <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
            <h4>No tasks found</h4>
            <p class="text-muted">Start by creating your first task!</p>
            <a href="<?php echo base_url('tasks/create'); ?>" class="btn btn-primary">
              <i class="fas fa-plus"></i> Create Task
            </a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>