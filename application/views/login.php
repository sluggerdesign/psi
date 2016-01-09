<?php if($_POST) : ?>

	<div class="row">
	  <div class="small-12 columns">
	    <div class="callout alert">
	      <p>Oops! Your username or password were incorrect. Please try again.</p>
	    </div>
	  </div>
	</div>

<?php else : ?>

	<div class="row">
	  <div class="small-12 columns">
	    <div class="callout secondary">
	      <p>Welcome! Please enter your username and password below.</p>
	    </div>
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
