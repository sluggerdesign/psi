<div class="row reports-module">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-12 columns x3-top">
				<h3>PSI - Job and Task Breakdown by Branch</h3>
			</div>
		</div>

    <?php if(isset($branches)) : foreach($branches as $b) : ?>
      <h4 style="margin: 20px 0 20px 5px;"><?=$b->name;?></h4>

      <?php if(isset($jobs)) : foreach($jobs as $j) : ?>
        <?php if ($j->branch == $b->id) : ?>
          <table class="dashboard-table">
            <tr>
              <th width="300" align="left"><?=$j->name;?> - <?=$j->number;?></th>
            </tr>
            <tr>
              <th align="left" width="200">Task</th>
              <th align="left" width="120">Start Date</th>
              <th align="left" width="120">End Date</th>
              <th align="left" width="400">Crew</th>
              <th align="left" width="300">Notes</th>
            </tr>
            <?php if(isset($work)) : foreach($work as $w) : ?>
              <?php if ($j->id == $w->project) : ?>
                <tr>
                  <td align="left"><?=$w->task;?></a></td>
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
    <?php endforeach; ?>
    <?php endif; ?>

<script type="text/javascript">
	window.onload = function() {
		window.print();
	};
</script>
