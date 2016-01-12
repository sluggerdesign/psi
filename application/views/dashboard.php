<div class="row">
	<div class="small-12 columns">
		<h3>Dashboard</h3>
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
					<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week-1).'&year='.$nav_year; ?>">Previous</a> <!--Previous week-->
					<?php echo date("F",$time) . ' ' .date( "d", mktime( 0, 0, 0, $month, $day_start, $year)). ' - ' .date("F", mktime( 0, 0, 0, $month, $day_start + 6, $year)). ' ' .date("d", mktime( 0, 0, 0, $month, $day_start + 6, $year ));?>
					<a href="<?php echo $_SERVER['PHP_SELF'].'?week='.($nav_week+1).'&year='.$nav_year; ?>">Next</a> <!--Next week-->
				</div>
		  </div>

			<?php if(isset($branches)) : foreach($branches as $b) : ?> <!-- Looping through branches made available from controller -->

				<h4 style="margin: 20px 0 20px 5px; color: #2199e8;"><?=$b->name;?></h4> <!-- Branch Name -->

				<?php if(isset($jobs)) : foreach($jobs as $j) : ?> <!-- Looping through jobs -->
					<?php if ($j->branch == $b->id) : ?> <!-- If branch id matches job id then display table below with job name -->
						<table>
			        <tr>
			          <th width="300" align="left"><?=$j->name;?> - <?=$j->number;?></th> <!-- Job Name and Number -->
			          <?php
			         		for ( $x = 0; $x < 7; $x++ )
			            echo "<th width='120'>".$daysOfWeek[$x]. "</th>";
			          ?>
			        </tr>
							<?php if(isset($work)) : foreach($work as $w) : ?> <!-- Looping through work tasks -->
								<?php if ($j->id == $w->project) : ?> <!-- If task id matches job id then display table riw below with task data -->
									<tr height="100">
						      	<td><?=$w->task;?></td> <!-- Task Name -->
					          <?php
					         		for ( $x = 0; $x < 7; $x++ )
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
