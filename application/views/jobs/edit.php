<?php if ($this->session->flashdata('added')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added the <?=$this->session->flashdata('added');?> job. Now add some tasks below!</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('addedtask')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully added the <?=$this->session->flashdata('addedtask');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('updatedtask')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully updated the <?=$this->session->flashdata('updatedtask');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<?php if ($this->session->flashdata('removedtask')) : ?>
<div class="row">
  <div class="small-12 columns">
    <div class="callout success">
      <p>You have successfully removed the <?=$this->session->flashdata('removedtask');?> task.</p>
    </div>
  </div>
</div>
<?php endif ?>

<div class="row">
	<div class="small-12 columns">
		<h3>Update Job</h3>
	</div>
</div>

<?php if(isset($jobs)) : foreach($jobs as $j) : ?>
  <?php $attributes = array('id' => 'edit-job'); ?>
  <?php echo form_open('jobs/edit', $attributes);?>
    <div class="row">
        <div class="small-5 columns">
          <label for="name">Job Name
            <input class="small-5 columns" name="name" id="name" type="text" placeholder="Job Name" value="<?=$j->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$j->id;?>">
          </label>
        </div>
    </div>

    <div class="row">
        <div class="small-5 columns">
          <label for="number">Job Number
            <input class="small-5 columns" name="number" id="number" type="text" placeholder="Job Number" value="<?=$j->number;?>">
          </label>
        </div>
    </div>

    <div class="row">
      <div class="small-5 columns">
        <label for="branch">Branch</label>
        <select name="branch" id="branch">
          <?php foreach ($branches as $b) {
            if ($b->id == $j->branch) {
              $branch = $b->name;
            }
          } ?>
          <option value="<?=$j->branch;?>"><?=$branch;?></option>
          <?php if(isset($branches)) : foreach($branches as $b) : ?>
            <option value="<?=$b->id;?>"><?=$b->name;?></option>
          <?php endforeach; ?>
          <?php endif; ?>
        </select>
	    </div>
    </div>

    <div class="row">
      <div class="small-5 columns">
        <label>
          <input type="checkbox" name="completed" id="completed" <?php if ($j->completed== '1') { echo "checked='checked'"; }?> value="1"> Completed
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

<hr>

<div class="row">
		<div class="small-12 columns">
			<h4>Tasks</h4>
		</div>
</div>

<div class="row">
    <div class="small-12 columns">
			<table class="hover">
			  <thead>
			    <tr>
			      <th width="300">Task Name</th>
            <th width="500">Crew</th>
            <th width="150">Start Date</th>
						<th width="150">End Date</th>
			      <th width="70"></th>
			      <th width="90"></th>
			    </tr>
			  </thead>
			  <tbody>
          <?php if(isset($work)) : foreach($work as $w) : ?>
  			    <tr>
  			      <td><?=$w->task;?></td>
              <td><?=$w->crew;?></td>
              <td><?=$w->start;?></td>
							<td><?=$w->end;?></td>
  			      <td><a data-open="edittaskModal" data-id="<?=$w->id;?>" data-jid="<?=$j->id;?>" class="edit"><i class="fi-pencil"></i> Edit</a></td>
  						<td><a href="/work/delete/<?=$w->id;?>/<?=$w->task;?>/<?=$j->id;?>"><i class="fi-x"></i> Delete</a></td>
  			    </tr>
          <?php endforeach; ?>
          <?php endif; ?>
			  </tbody>
			</table>
	</div>
</div>

<div class="row">
  <div class="small-12 columns">
		<a data-open="addtaskModal" class="button"><i class="fi-plus"></i> Add Task</a>
  </div>
</div>

<!-- BEGIN ADD TASK MODAL -->

<div class="medium reveal" id="addtaskModal" data-reveal>
  <h3>Add Task</h3>

  <?php $attributes = array('id' => 'create-work'); ?>
	<?php echo form_open('work/create', $attributes);?>
		<div class="row">
			<div class="small-8 columns">
				<label for="task">Task</label>
				<select name="task">
					<option value="">Choose Task</option>
					<?php if(isset($tasks)) : foreach($tasks as $t) : ?>
						<option value="<?=$t->name;?>"><?=$t->name;?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>

		<div class="row" style="margin-bottom:20px">
			<div class="small-10 columns">
				<label for="crew"> Crew</label>
				<select name="crew[]" id="addcrew" multiple="multiple" class="multi-select" data-placeholder="Select Crew" data-allow-clear="true">
					<?php if(isset($crew)) : foreach($crew as $c) : ?>
						<option value="<?=$c->name;?>"><?=$c->name;?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="start">Start Date
	          <input class="small-5" name="start" id="datepicker1" type="text" placeholder="Start Date" readonly="readonly">
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="end">End Date
	          <input class="small-5" name="end" id="datepicker2" type="text" placeholder="End Date" readonly="readonly">
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-10 columns">
	        <label for="notes">Notes</label>
	          <textarea name="notes" rows="4"></textarea>
	      </div>
	  </div>

		<input name="id" id="id" type="hidden" value="<?=$j->id;?>">

	  <div class="row">
	    <div class="small-12 columns">
	      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
	    </div>
	  </div>

	<?php echo form_close(); ?>

  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!-- END ADD TASK MODAL -->

<!-- BEGIN EDIT TASK MODAL -->

<div class="medium reveal" id="edittaskModal" data-reveal>
  <h3>Edit Task</h3>
	<?php $attributes = array('id' => 'edit-work'); ?>
	<?php echo form_open('work/edit', $attributes);?>
		<div class="row">
			<div class="small-8 columns">
				<label for="task">Task</label>
				<select name="task" id="task">
					<option value="">Choose Task</option>
					<?php if(isset($tasks)) : foreach($tasks as $t) : ?>
						<option value="<?=$t->name;?>"><?=$t->name;?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>

    <div class="row assigned-crew">
      <div class="small-10 columns">
        <label for="assigned-crew">Currently Assigned Crew
          <input type="text" id="assigned-crew" name="assigned-crew" readonly="readonly" value="">
        </label>
      </div>
    </div>

		<div class="row" style="margin-bottom:20px">
			<div class="small-10 columns">
				<label for="crew"> Update Crew</label>
				<select name="crew[]" id="crew" multiple="multiple" class="multi-select" data-placeholder="Update Crew" data-allow-clear="true">
					<?php if(isset($crew)) : foreach($crew as $c) : ?>
						<option value="<?=$c->name;?>"><?=$c->name;?></option>
					<?php endforeach; ?>
					<?php endif; ?>
				</select>
			</div>
		</div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="start">Start Date
	          <input class="small-5 datepicker3" name="start" id="start" type="text" placeholder="Start Date" readonly="readonly">
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="end">End Date
	          <input class="small-5 datepicker4" name="end" id="end" type="text" placeholder="End Date" readonly="readonly">
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-10 columns">
	        <label for="notes">Notes</label>
	          <textarea name="notes" id="notes" rows="4"></textarea>
	      </div>
	  </div>

		<input name="id" id="id" type="hidden" value="<?=$j->id;?>">

	  <div class="row">
	    <div class="small-12 columns">
	      <button type="submit" class="button"><i class="fi-pencil"></i> Update</button>
	    </div>
	  </div>

	<?php echo form_close(); ?>

  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!-- END EDIT TASK MODAL -->

<script type="text/javascript">
  // Initialize select2 Multiple Select
  $('#crew').select2();
  $('#addcrew').select2();
</script>

<script type="text/javascript">
	$('.edit').click( function(){
		$("#edit-work").attr("action", "<?=base_url()?>work/edit/" + $(this).data('id'));
		$.getJSON("<?=base_url()?>work/edit/" + $(this).data('id') + "/", function(result) {
			$.each(result, function(i, field) {
        $('#assigned-crew').val(field.crew);
        $("#crew").select2("val", "");
        $('#task').val(field.task);
				$('#start').val(field.start);
				$('#end').val(field.end);
				$('#notes').val(field.notes);
			});
		});
	});
</script>

<script type="text/javascript">
	$(function() {
		$("#datepicker1").datepicker({ dateFormat: 'yy-mm-dd' });
	});

	$(function() {
		$("#datepicker2").datepicker({ dateFormat: 'yy-mm-dd' });
	});

	$(function() {
		$(".datepicker3").datepicker({ dateFormat: 'yy-mm-dd' });
	});

	$(function() {
		$(".datepicker4").datepicker({ dateFormat: 'yy-mm-dd' });
	});
</script>
