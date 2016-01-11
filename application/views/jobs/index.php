
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

<div class="row">
	<div class="small-12 columns">
		<h3>Jobs</h3>
	</div>
</div>

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
