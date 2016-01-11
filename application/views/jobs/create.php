<div class="row">
	<div class="small-12 columns">
		<h3>Add Job</h3>
	</div>
</div>

<?php echo form_open('jobs/create');?>
  <div class="row">
      <div class="small-5 columns">
        <label for="name">Job Name
          <input class="small-5 columns" name="name" id="name" type="text" placeholder="Job Name">
        </label>
      </div>
  </div>

  <div class="row">
      <div class="small-5 columns">
        <label for="number">Job Number
          <input class="small-5 columns" name="number" id="number" type="text" placeholder="Job Number">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-5 columns">
      <label for="Branch">Branch</label>
      <select name="branch" id="branch">
        <option value="">Choose Branch</option>
        <?php if(isset($branches)) : foreach($branches as $b) : ?>
          <option value="<?=$b->id;?>"><?=$b->name;?></option>
        <?php endforeach; ?>
        <?php endif; ?>
      </select>
    </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
