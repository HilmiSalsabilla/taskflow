<div class="row">
  <div class="col-md-12">
    <h1 class="mb-4">Dashboard</h1>
  </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
  <div class="col-md-3">
    <div class="card bg-primary text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5 class="card-title">Total Tasks</h5>
            <h2><?php echo $stats['total_tasks']; ?></h2>
          </div>
          <div class="align-self-center">
            <i class="fas fa-tasks fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card bg-warning text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5 class="card-title">Pending</h5>
            <h2><?php echo isset($stats['by_status']['pending']) ? $stats['by_status']['pending'] : 0; ?></h2>
          </div>
          <div class="align-self-center">
            <i class="fas fa-clock fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card bg-info text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5 class="card-title">In Progress</h5>
            <h2><?php echo isset($stats['by_status']['in_progress']) ? $stats['by_status']['in_progress'] : 0; ?></h2>
          </div>
          <div class="align-self-center">
            <i class="fas fa-spinner fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="col-md-3">
    <div class="card bg-success text-white">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          <div>
            <h5 class="card-title">Completed</h5>
            <h2><?php echo isset($stats['by_status']['completed']) ? $stats['by_status']['completed'] : 0; ?></h2>
          </div>
          <div class="align-self-center">
            <i class="fas fa-check fa-2x"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Recent Tasks -->
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Recent Tasks</h5>
      </div>
      <div class="card-body">
        <?php if (!empty($recent_tasks)): ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Priority</th>
                  <th>Status</th>
                  <th>Due Date</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($recent_tasks as $task): ?>
                  <tr>
                    <td><?php echo $task['title']; ?></td>
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
                      <span class="badge <?php echo $task['status'] == 'completed' ? 'bg-success' : ($task['status'] == 'in_progress' ? 'bg-info' : 'bg-warning'); ?>">
                        <?php echo ucfirst(str_replace('_', ' ', $task['status'])); ?>
                      </span>
                    </td>
                    <td><?php echo date('M j, Y', strtotime($task['due_date'])); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php else: ?>
          <p class="text-muted">No tasks found.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
    
  <div class="col-md-4">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Quick Actions</h5>
      </div>
      <div class="card-body">
        <div class="d-grid gap-2">
          <a href="<?php echo base_url('tasks/create'); ?>" class="btn btn-primary">
            <i class="fas fa-plus"></i> New Task
          </a>
          <a href="<?php echo base_url('tasks'); ?>" class="btn btn-outline-primary">
            <i class="fas fa-list"></i> View All Tasks
          </a>
          <a href="<?php echo base_url('tasks?status=pending'); ?>" class="btn btn-outline-warning">
            <i class="fas fa-clock"></i> Pending Tasks
          </a>
          <a href="<?php echo base_url('tasks?status=in_progress'); ?>" class="btn btn-outline-info">
            <i class="fas fa-spinner"></i> In Progress
          </a>
        </div>
      </div>
    </div>
      
    <?php if ($stats['overdue'] > 0): ?>
      <div class="card mt-3">
        <div class="card-header bg-danger text-white">
            <h5 class="card-title">Overdue Tasks</h5>
        </div>
        <div class="card-body">
          <p class="text-danger">
            <i class="fas fa-exclamation-triangle"></i>
            You have <strong><?php echo $stats['overdue']; ?></strong> overdue task(s).
          </p>
          <a href="<?php echo base_url('tasks'); ?>" class="btn btn-danger btn-sm">
            View Overdue Tasks
          </a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>