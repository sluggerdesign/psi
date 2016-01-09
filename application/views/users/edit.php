<div class="row">
	<div class="small-12 columns">
		<h3>Edit User</h3>
	</div>
</div>

<?php if(isset($users)) : foreach($users as $u) : ?>

  <?php echo form_open('users/edit');?>
    <div class="row">
        <div class="small-5 columns">
          <label for="Project Name">Name (First Last)
            <input class="small-5 columns" name="name" id="name" type="text" placeholder="Name (First Last)" value="<?=$u->name;?>">
            <input name="id" id="id" type="hidden" value="<?=$u->id;?>">
          </label>
        </div>
    </div>

    <div class="row">
        <div class="small-5 columns">
          <label for="email">Email Address
            <input class="small-5 columns" name="email" id="email" type="text" placeholder="Email Address" value="<?=$u->email;?>">
          </label>
        </div>
    </div>

    <div class="row">
        <div class="small-5 columns">
          <label for="password">Password
            <input class="small-5 columns" name="password" id="password" type="password" placeholder="Password" value="<?=$u->password;?>">
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
