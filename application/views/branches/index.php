
<?php if ($this->session->flashdata('removed')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed the <?=$this->session->flashdata('removed');?> branch.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
	<div class="small-12 columns">
		<h3>Branches</h3>
	</div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="400">Branch Name</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($branches)) : foreach($branches as $b) : ?>
  			    <tr>
  			      <td><?=$b->name;?></td>
  			      <td><a href="/branches/edit/<?=$b->id;?>"><i class="fi-wrench"></i> Edit</a></td>
  						<td><a href="/branches/delete/<?=$b->name;?>/<?=$b->id;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
    <a href="/branches/create" class="button"><i class="fi-plus"></i> Add New</a>
	</div>
</div>
