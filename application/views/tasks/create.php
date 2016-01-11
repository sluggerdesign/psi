<div class="row">
	<div class="small-12 columns">
		<h3>Add Branch</h3>
	</div>
</div>

<?php echo form_open('tasks/create');?>
  <div class="row">
      <div class="small-5 columns">
        <label for="name">Task Name
          <input class="small-5 columns" name="name" id="name" type="text" placeholder="Task Name">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
