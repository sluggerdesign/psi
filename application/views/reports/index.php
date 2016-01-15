<div class="row reports-module">
	<div class="small-12 columns">
		<h3>Reports</h3>

    <?php if(isset($branches)) : foreach($branches as $b) : ?>
      <?=$b->name;?>
    <?php endforeach; ?>
    <?php endif; ?>
