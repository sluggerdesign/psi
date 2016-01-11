<div class="row">
	<div class="small-12 columns">
		<h3>Edit Task</h3>
	</div>
</div>

<?php if(isset($task)) : foreach($task as $t) : ?>

  <?php echo form_open('tasks/edit');?>
    <div class="row">
        <div class="small-5 columns">
          <label for="name">Task Name
            <input class="small-5 columns" name="name" id="name" type="text" placeholder="Task Name" value="<?=$t->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$t->id;?>">
          </label>
        </div>
    </div>

    <div class="row">
      <div class="small-12 columns">
        <button type="submit" class="button"><i class="fi-pencil"></i> Update</button>
      </div>
    </div>

  <?php echo form_close(); ?>

<?php endforeach; ?>
<?php endif; ?>
