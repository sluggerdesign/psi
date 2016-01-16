<div class="row">
	<div class="small-12 columns">
		<h3>Edit Crew</h3>
	</div>
</div>

<?php if(isset($crew)) : foreach($crew as $c) : ?>

	<?php $attributes = array('id' => 'edit-crew'); ?>
  <?php echo form_open('crew/edit', $attributes);?>
    <div class="row">
        <div class="small-12 medium-5 columns">
          <label for="name">Crew Member Name
            <input name="name" id="name" type="text" placeholder="Crew Member Name" value="<?=$c->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$c->id;?>">
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
