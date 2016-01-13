<div class="row">
	<div class="small-12 columns">
		<h3>Add User</h3>
	</div>
</div>

<?php $attributes = array('id' => 'create-user'); ?>
<?php echo form_open('users/create', $attributes);?>
  <div class="row">
      <div class="small-5 columns">
        <label for="name">Name (First Last)
          <input class="small-5 columns" name="name" id="name" type="text" placeholder="Name (First Last)">
        </label>
      </div>
  </div>

  <div class="row">
      <div class="small-5 columns">
        <label for="email">Email Address
          <input class="small-5 columns" name="email" id="email" type="text" placeholder="Email Address" readonly onfocus="this.removeAttribute('readonly');">
        </label>
      </div>
  </div>

  <div class="row">
      <div class="small-5 columns">
        <label for="password">Password
          <input class="small-5 columns" name="password" id="password" type="password" placeholder="Password" readonly onfocus="this.removeAttribute('readonly');">
        </label>
      </div>
  </div>

  <div class="row">
    <div class="small-12 columns">
      <button type="submit" class="button"><i class="fi-plus"></i> Add</button>
    </div>
  </div>

<?php echo form_close(); ?>
