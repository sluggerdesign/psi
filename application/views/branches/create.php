<div class="row">
	<div class="small-12 columns">
		<h3>Add Branch</h3>
	</div>
</div>

<?php $attributes = array('id' => 'create-branch'); ?>
<?php echo form_open('branches/create', $attributes);?>
  <div class="row">
      <div class="small-12 medium-5 columns">
        <label for="name">Branch Name
          <input name="name" id="name" type="text" placeholder="Branch Name">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
