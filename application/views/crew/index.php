
<?php if ($this->session->flashdata('removed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed <?=$this->session->flashdata('removed');?> from the crew.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('added')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added <?=$this->session->flashdata('added');?> to the crew.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('updated')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully updated <?=$this->session->flashdata('updated');?> crew member.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
	<div class="small-12 columns">
		<h3>Crew</h3>
	</div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="400">Crew Member</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($crew)) : foreach($crew as $c) : ?>
  			    <tr>
  			      <td><?=$c->name;?></td>
  			      <td><a href="/crew/edit/<?=$c->id;?>"><i class="fi-pencil"></i> Edit</a></td>
  						<td><a href="/crew/delete/<?=$c->id;?>/<?=$c->name;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
    <a href="/crew/create" class="button"><i class="fi-plus"></i> Add New</a>
	</div>
</div>
