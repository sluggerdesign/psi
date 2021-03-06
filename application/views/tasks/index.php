
<?php if ($this->session->flashdata('removed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed the <?=$this->session->flashdata('removed');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('added')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added the <?=$this->session->flashdata('added');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('updated')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully updated the <?=$this->session->flashdata('updated');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
  <div class="small-6 columns">
    <h3>Tasks</h3>
  </div>
  <div class="small-6 columns text-right">
    <a href="/tasks/create" class="button"><i class="fi-plus"></i> Add Task</a>
  </div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="400">Task Name</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($tasks)) : foreach($tasks as $t) : ?>
  			    <tr>
  			      <td><?=$t->name;?></td>
  			      <td><a href="/tasks/edit/<?=$t->id;?>"><i class="fi-pencil"></i> Edit</a></td>
  						<td><a href="/tasks/delete/<?=$t->id;?>/<?=$t->name;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
    <a href="/tasks/create" class="button"><i class="fi-plus"></i> Add New</a>
	</div>
</div>
