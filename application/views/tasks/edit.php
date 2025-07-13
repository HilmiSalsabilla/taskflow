<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="card">
      <div class="card-header">
        <h4>Edit Task</h4>
      </div>
      <div class="card-body">
        <?php echo form_open('tasks/edit/' . $task['id']); ?>
          <div class="mb-3">
            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
            <input type="text" class="form-control <?php echo form_error('title') ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?php echo set_value('title', $task['title']); ?>">
            <?php echo form_error('title', '<div class="invalid-feedback">', '</div>'); ?>
          </div>
          
          <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control <?php echo form_error('description') ? 'is-invalid' : ''; ?>" id="description" name="description" rows="4"><?php echo set_value('description', $task['description']); ?></textarea>
            <?php echo form_error('description', '<div class="invalid-feedback">', '</div>'); ?>
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label for="priority" class="form-label">Priority <span class="text-danger">*</span></label>
                <select class="form-select <?php echo form_error('priority') ? 'is-invalid' : ''; ?>" id="priority" name="priority">
                  <option value="">Select Priority</option>
                  <option value="low" <?php echo set_select('priority', 'low', $task['priority'] == 'low'); ?>>Low</option>
                  <option value="medium" <?php echo set_select('priority', 'medium', $task['priority'] == 'medium'); ?>>Medium</option>
                  <option value="high" <?php echo set_select('priority', 'high', $task['priority'] == 'high'); ?>>High</option>
                </select>
                <?php echo form_error('priority', '<div class="invalid-feedback">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                <select class="form-select <?php echo form_error('category') ? 'is-invalid' : ''; ?>" id="category" name="category">
                  <option value="">Select Category</option>
                  <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category['name']; ?>" <?php echo set_select('category', $category['name'], $task['category'] == $category['name']); ?>>
                      <?php echo $category['name']; ?>
                    </option>
                  <?php endforeach; ?>
                </select>
                <?php echo form_error('category', '<div class="invalid-feedback">', '</div>'); ?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label for="status" class="form-label">Status <span class="text-danger">*</span></label>
                <select class="form-select <?php echo form_error('status') ? 'is-invalid' : ''; ?>" id="status" name="status">
                  <option value="">Select Status</option>
                  <option value="pending" <?php echo set_select('status', 'pending', $task['status'] == 'pending'); ?>>Pending</option>
                  <option value="in_progress" <?php echo set_select('status', 'in_progress', $task['status'] == 'in_progress'); ?>>In Progress</option>
                  <option value="completed" <?php echo set_select('status', 'completed', $task['status'] == 'completed'); ?>>Completed</option>
                </select>
                <?php echo form_error('status', '<div class="invalid-feedback">', '</div>'); ?>
              </div>
            </div>
          </div>
          
          <div class="mb-3">
            <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control <?php echo form_error('due_date') ? 'is-invalid' : ''; ?>" id="due_date" name="due_date" value="<?php echo set_value('due_date', $task['due_date']); ?>">
            <?php echo form_error('due_date', '<div class="invalid-feedback">', '</div>'); ?>
          </div>
          
          <div class="d-flex justify-content-between">
            <a href="<?php echo base_url('tasks'); ?>" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Task</button>
          </div>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>