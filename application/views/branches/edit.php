<div class="row">
	<div class="small-12 columns">
		<h3>Edit Branch</h3>
	</div>
</div>

<?php if(isset($branch)) : foreach($branch as $b) : ?>

	<?php $attributes = array('id' => 'edit-branch'); ?>
  <?php echo form_open('branches/edit', $attributes);?>
    <div class="row">
        <div class="small-5 columns">
          <label for="name">Branch Name
            <input class="small-5 columns" name="name" id="name" type="text" placeholder="Branch Name" value="<?=$b->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$b->id;?>">
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
