<?php if($_POST) : ?>

	<div class="row">
		<div class="small-12 columns">
			<h5 class="x1-top">Oops! Your username or password were incorrect. Try again.</h5>
		</div>
	</div>

<?php else : ?>

	<div class="row">
		<div class="small-12">

		</div>
	</div>
	<div class="row">
    <div class="small-12 columns">
      <h5 class="x1-top">Welcome! Please enter your username and password below.</h5>
    </div>
  </div>

<?php endif; ?>

	<div class="row">
		<div class="small-12 columns">
			<h3>Sign In</h3>
		</div>
	</div>

	<?php echo form_open('login');?>
		<div class="row">
		    <div class="small-3 columns">
					<input class="small-3 columns" name="username" id="username" type="text" placeholder="User Name">
					<input class="small-3 columns" name="password" id="password" type="password" placeholder="Password">
			</div>
		</div>

		<div class="row">
			<div class="small-12 columns">
				<button type="submit" class="button">Submit</button>
			</div>
		</div>	

	<?php echo form_close(); ?>

</div>
