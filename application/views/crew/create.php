<div class="row">
	<div class="small-12 columns">
		<h3>Add Crew</h3>
	</div>
</div>

<?php $attributes = array('id' => 'create-crew'); ?>
<?php echo form_open('crew/create', $attributes);?>
  <div class="row">
      <div class="small-5 columns">
        <label for="name">Crew Member Name
          <input class="small-5 columns" name="name" id="name" type="text" placeholder="Crew Member Name">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
