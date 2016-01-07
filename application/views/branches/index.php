<div class="row">
	<div class="small-12 columns">
		<h3 class="x1-top">Branches</h3>
	</div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="400">Branch Name</th>
			      <th width="50"></th>
			      <th width="50"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($branches)) : foreach($branches as $b) : ?>
  			    <tr>
  			      <td><?=$b->name;?></td>
  			      <td>Edit</td>
  						<td>Delete</td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
	<div class="small-12 columns">
		<button class="button">Add New</button>
	</div>
</div>
