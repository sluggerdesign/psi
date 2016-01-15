<div class="row dashboard-module">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-6 columns">
				<h3>Dashboard</h3>
			</div>
			<div class="small-6 columns text-right">
				<a href="/jobs/create" class="button"><i class="fi-plus"></i> Add Job</a>
			</div>
		</div>

		<?php $attributes = array('id' => 'filter-branches'); ?>
		<?php echo form_open('dashboard', $attributes);?>
		<div class="row jobs-search-module">
		  <div class="small-12 medium-4 large-4 columns">
		    <label for="Branch">Filter by Branch</label>
		    <select name="branch" id="branch">
		      <?php if ($this->session->flashdata('filter')) : ?>
		        <?php if(isset($branches)) : foreach($branches as $b) : ?>
		          <option value="All">Show All</option>
		          <option value="<?=$b->id;?>" selected><?=$b->name;?></option>
		        <?php endforeach; ?>
		        <?php endif; ?>
		      <?php else : ?>
		        <option value="All">Show All</option>
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

			<?php
        $dt = new DateTime;
        if (isset($_GET['year']) && isset($_GET['week'])) {
          $dt->setISODate($_GET['year'], $_GET['week']);
        } else {
          $dt->setISODate($dt->format('o'), $dt->format('W'));
        }

        // Week navigation
        $nav_year = $dt->format('o');
        $nav_week = $dt->format('W');

        //Resetting start week to start with Sunday
        $dt->modify('-1 day');

        $year = $dt->format('o');
        $month = $dt->format('m');
        $time=strtotime($dt->format('Y-m-d H:i:s'));

        $day_start = date("d", $time);
        $daysOfWeek = array('SU','MO','TU','WE','TH','FR','SA');
     ?>

		  <div class="row">
				<div class="small-12 columns text-center">
					<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week-1).'&year='.$nav_year; ?>"><i class="fi-arrow-left"></i>&nbsp;</a> <!--Previous week-->
					<?php echo date("F",$time) . ' ' .date( "d", mktime( 0, 0, 0, $month, $day_start, $year)). ' - ' .date("F", mktime( 0, 0, 0, $month, $day_start + 6, $year)). ' ' .date("d", mktime( 0, 0, 0, $month, $day_start + 6, $year ));?>
					<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week+1).'&year='.$nav_year; ?>">&nbsp;<i class="fi-arrow-right"></i></a> <!--Next week-->
				</div>
		  </div>

			<?php if(isset($branches)) : foreach($branches as $b) : ?> <!-- Looping through branches made available from controller -->

				<h4 style="margin: 20px 0 20px 5px;"><?=$b->name;?></h4> <!-- Branch Name -->

				<?php if(isset($jobs)) : foreach($jobs as $j) : ?> <!-- Looping through jobs -->
					<?php if ($j->branch == $b->id) : ?> <!-- If branch id matches job id then display table below with job name -->
						<table class="dashboard-table">
			        <tr>
			          <th width="300" align="left"><?=$j->name;?> - <?=$j->number;?></th> <!-- Job Name and Number -->

								<?php
			         		for ( $x = 0; $x < 7; $x++ )
			            echo "<th width='120'>".$daysOfWeek[$x]. "</th>";
			          ?>

			        </tr>

							<?php if(isset($work)) : foreach($work as $w) : ?> <!-- Looping through work tasks -->
								<?php if ($j->id == $w->project) : ?> <!-- If task id matches job id then display table riw below with task data -->
									<tr>
										<?php $crewCollection = explode(',', $w->crew); ?>
						      	<td><a data-open="edittaskModal" data-id="<?=$w->id;?>" data-jid="<?=$j->id;?>" class="edit"><?=$w->task;?> (<?php echo count($crewCollection); ?>)</a></td> <!-- Task Name -->

										<?php
	                    $WorkDateRange = createDateRangeArray($w->start, $w->end);
	                    $crewCollection = explode(',', $w->crew);

											for ( $x = 0; $x < 7; $x++ )
                      if (in_array(date( "Y-m-d", mktime( 0, 0, 0, $month, $day_start + $x, $year)), $WorkDateRange))
                      	echo "<td align='center' class='selected-date'><a data-open='edittaskModal' data-id=".$w->id." data-jid=".$j->id." class='edit'><span>".date( "d", mktime( 0, 0, 0, $month, $day_start + $x, $year)). "</span><span class='crew-count'>".count($crewCollection)."</span></a></td>";
                      else
                      	echo "<td align='center'>".date( "d", mktime( 0, 0, 0, $month, $day_start + $x, $year)). "</td>";
					          ?>

						      </tr>
								<?php endif; ?>
							<?php endforeach; ?>
							<?php endif; ?>
				    </table>
					<?php endif; ?>
				<?php endforeach; ?>
				<?php endif; ?>
			<?php endforeach; ?> <!-- Branches -->
			<?php endif; ?> <!-- Branches -->
	</div>
</div>

<!-- BEGIN VIEW TASK MODAL -->

<div class="medium reveal" id="edittaskModal" data-reveal>
  <h4 id="task-title"></h4>
		<div class="row">
			<div class="small-8 columns">
				<label for="task">Task</label>
				<input type="text" id="task" name="task" disabled>
			</div>
		</div>

		<div class="row assigned-crew">
      <div class="small-10 columns">
        <label for="crew">Currently Assigned Crew
          <input type="text" id="crew" name="crew" readonly="readonly" value="">
        </label>
      </div>
    </div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="start">Start Date
	          <input class="small-5 datepicker3" name="start" id="start" type="text" placeholder="Start Date" disabled>
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-5 columns">
	        <label for="end">End Date
	          <input class="small-5 datepicker4" name="end" id="end" type="text" placeholder="End Date" disabled>
	        </label>
	      </div>
	  </div>

		<div class="row">
	      <div class="small-10 columns">
	        <label for="notes">Notes</label>
	          <textarea name="notes" id="notes" rows="4"></textarea>
	      </div>
	  </div>

	  <div class="row">
	    <div class="small-12 columns">
				<a href="jobs/edit/" id="editLink" class="button"><i class="fi-pencil"></i> Update</a>
	    </div>
	  </div>

  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<!-- END VIEW TASK MODAL -->

<!-- BEGIN CREATE DATE RANGE ARRAY -->

<?php
	function createDateRangeArray($strDateFrom,$strDateTo) {
    // takes two dates formatted as YYYY-MM-DD and creates an
    // inclusive array of the dates between the from and to dates.

    // could test validity of dates here but I'm already doing
    // that in the main script

    $aryRange=array();

    $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2), substr($strDateFrom,8,2),substr($strDateFrom,0,4));
    $iDateTo=mktime(1,0,0,substr($strDateTo,5,2), substr($strDateTo,8,2),substr($strDateTo,0,4));

    if ($iDateTo>=$iDateFrom)
    {
	    array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
	    while ($iDateFrom<$iDateTo)
	    {
	      $iDateFrom+=86400; // add 24 hours
	      array_push($aryRange,date('Y-m-d',$iDateFrom));
	    }
    }
    return $aryRange;
	}
?>

<!-- END CREATE DATE RANGE ARRAY -->

<!-- Retrieve Task Data -->

<script type="text/javascript">
	$('.edit').click( function(){
		$("#edit").attr("action", "<?=base_url()?>work/edit/" + $(this).data('id'));
		$.getJSON("<?=base_url()?>work/edit/" + $(this).data('id') + "/", function(result) {
			$.each(result, function(i, field) {
				$('#task').val(field.task);
				$('#crew').val(field.crew);
				$('#start').val(field.start);
				$('#end').val(field.end);
				$('#notes').val(field.notes);
				$("#editLink").attr("href", "<?=base_url()?>jobs/edit/" + field.project);
			});
		});
		$.getJSON("<?=base_url()?>jobs/fetch/" + $(this).data('jid') + "/", function(result) {
      $.each(result, function(i, field) {
				$('#task-title').html(field.name + " - " + field.number);
			});
		});
	});
</script>
