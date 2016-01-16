<div class="row reports-module">
	<div class="small-12 columns">
		<div class="row">
			<div class="small-6 columns">
				<h3>Reports</h3>
			</div>
			<div class="small-6 columns text-right">
				<a href="reports/printme" target="_BLANK" class="button"><i class="fi-print"></i> Print</a>
			</div>
		</div>

    <?php $attributes = array('id' => 'filter-branches'); ?>
		<?php echo form_open('reports', $attributes);?>
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
