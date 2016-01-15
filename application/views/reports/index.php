<div class="row reports-module">
	<div class="small-12 columns">
		<h3>Reports</h3>

    <?php if(isset($branches)) : foreach($branches as $b) : ?>
      <h4 style="margin: 20px 0 20px 5px;"><?=$b->name;?></h4> <!-- Branch Name -->

      <?php if(isset($jobs)) : foreach($jobs as $j) : ?> <!-- Looping through jobs -->
        <?php if ($j->branch == $b->id) : ?> <!-- If branch id matches job id then display table below with job name -->
          <table class="dashboard-table">
            <tr>
              <th width="300" align="left"><?=$j->name;?> - <?=$j->number;?></th> <!-- Job Name and Number -->
            </tr>
            <tr>
              <th align="left" width="200">Task</th>
              <th align="left" width="120">Start Date</th>
              <th align="left" width="120">End Date</th>
              <th align="left" width="400">Crew</th>
              <th align="left" width="300">Notes</th>
            </tr>
            <?php if(isset($work)) : foreach($work as $w) : ?> <!-- Looping through work tasks -->
              <?php if ($j->id == $w->project) : ?> <!-- If task id matches job id then display table riw below with task data -->
                <tr>
                  <td align="left"><?=$w->task;?></a></td> <!-- Task Name -->
                  <td align="left"><?=$w->start;?></a></td>
                  <td align="left"><?=$w->end;?></a></td>
                  <td align="left"><?=$w->crew;?></a></td>
                  <td align="left"><?=$w->notes;?></a></td>
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
