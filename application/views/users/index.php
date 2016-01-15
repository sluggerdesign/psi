
<?php if ($this->session->flashdata('removed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed the user <?=$this->session->flashdata('removed');?>.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('added')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added the user <?=$this->session->flashdata('added');?>.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('updated')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully updated the user <?=$this->session->flashdata('updated');?>.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
  <div class="small-6 columns">
    <h3>Users</h3>
  </div>
  <div class="small-6 columns text-right">
    <a href="/users/create" class="button"><i class="fi-plus"></i> Add User</a>
  </div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="300">User Name</th>
            <th width="450">Email Address</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($users)) : foreach($users as $u) : ?>
  			    <tr>
  			      <td><?=$u->name;?></td>
              <td><?=$u->email;?></td>
  			      <td><a href="/users/edit/<?=$u->id;?>"><i class="fi-pencil"></i> Edit</a></td>
  						<td><a href="/users/delete/<?=$u->id;?>/<?=$u->name;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
    <a href="/users/create" class="button"><i class="fi-plus"></i> Add New</a>
	</div>
</div>
