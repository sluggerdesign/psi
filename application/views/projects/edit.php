<div class="row">
	<div class="small-12 columns">
		<h3>Edit Project</h3>
	</div>
</div>

<?php if(isset($projects)) : foreach($projects as $p) : ?>

  <?php echo form_open('projects/edit');?>
    <div class="row">
        <div class="small-5 columns">
          <label for="Project Name">Project Name
            <input class="small-5 columns" name="name" id="name" type="text" placeholder="Project Name" value="<?=$p->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$p->id;?>">
          </label>
        </div>
    </div>

    <div class="row">
        <div class="small-5 columns">
          <label for="Project ID">Project ID
            <input class="small-5 columns" name="number" id="number" type="text" placeholder="Project ID" value="<?=$p->number;?>">
          </label>
        </div>
    </div>

    <div class="row">
      <div class="small-5 columns">
        <label for="Branch">Branch</label>
        <select name="branch" id="branch">
          <?php foreach ($branches as $b) {
            if ($b->id == $p->branch) {
              $branch = $b->name;
            }
          } ?>
          <option value="<?=$p->branch;?>"><?=$branch;?></option>
          <?php if(isset($branches)) : foreach($branches as $b) : ?>
            <option value="<?=$b->id;?>"><?=$b->name;?></option>
          <?php endforeach; ?>
          <?php endif; ?>
        </select>
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
