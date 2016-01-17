
<?php if ($this->session->flashdata('removed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed the <?=$this->session->flashdata('removed');?> job.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('added')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added the <?=$this->session->flashdata('added');?> job.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('updated')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully updated the <?=$this->session->flashdata('updated');?> job.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('completed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>Great Job! You have successfully completed the <?=$this->session->flashdata('completed');?> job.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
  <div class="small-6 columns">
    <h3>Jobs</h3>
  </div>
  <div class="small-6 columns text-right">
    <a href="/jobs/create" class="button"><i class="fi-plus"></i> Add Job</a>
  </div>
</div>

<?php $attributes = array('id' => 'filter-branches'); ?>
<?php echo form_open('jobs', $attributes);?>
<div class="row jobs-search-module">
  <div class="small-12 medium-4 large-4 columns">
    <label for="Branch">Filter by Branch</label>
    <select name="branch" id="branch">
      <?php if ($this->session->flashdata('filter') == 'single') : ?>
        <?php if(isset($branches)) : foreach($branches as $b) : ?>
          <option value="All">Show All</option>
          <option value="All Completed">Show Completed</option>
          <option value="<?=$b->id;?>" selected><?=$b->name;?></option>
        <?php endforeach; ?>
        <?php endif; ?>
      <?php elseif($this->session->flashdata('filter') == 'completed') : ?>
        <option value="All">Show All</option>
        <option value="All Completed" selected>Show Completed</option>
      <?php else : ?>
        <option value="All">Show All</option>
        <option value="All Completed">Show Completed</option>
      <?php endif ?>

      <?php if(isset($branches_menu)) : foreach($branches_menu as $b) : ?>
        <option value="<?=$b->id;?>"><?=$b->name;?></option>
      <?php endforeach; ?>
      <?php endif; ?>
    </select>
  </div>
  <div class="small-12 medium-4 large-4 columns end">
    <button type="submit" class="button"><i class="fi-target-two"></i> Filter</button>
  </div>
</div>
<?php echo form_close(); ?>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="400">Job Name</th>
            <th width="200">Job Number</th>
            <th width="200">Branch</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($jobs)) : foreach($jobs as $j) : ?>
  			    <tr>
  			      <td><?=$j->name;?></td>
              <td><?=$j->number;?></td>
              <?php foreach ($branches as $b) {
                if ($b->id == $j->branch) {
                  $branch = $b->name;
                }
              } ?>
              <td><?=$branch;?></td>
  			      <td><a href="/jobs/edit/<?=$j->id;?>"><i class="fi-pencil"></i> Edit</a></td>
  						<td><a href="/jobs/delete/<?=$j->id;?>/<?=$j->name;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
    <a href="/jobs/create" class="button"><i class="fi-plus"></i> Add New</a>
	</div>
</div>
