<div class="row">
	<div class="small-12 columns">
		<h3>Add Crew</h3>
	</div>
</div>

<?php echo form_open('crew/create');?>
  <div class="row">
      <div class="small-5 columns">
        <label for="Crew Name">Crew Name
          <input class="small-5 columns" name="name" id="name" type="text" placeholder="Crew Name">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
