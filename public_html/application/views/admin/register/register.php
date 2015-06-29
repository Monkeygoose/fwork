<?php echo form_open('register/register_user') ; ?>

<?php if (validation_errors()) : ?>

<h3>Whoops! There was an error:</h3>
<p><?php echo validation_errors(); ?></p>

<?php endif; ?>

	<?php echo form_input(array(
		'name' => 'first_name', 
		'id' => 'first_name',
		'value' => set_value('first_name', ''),
		'maxlength' => '100', 
		'size' => '50',
		'style' => 'width:100%',
		'placeholder' => 'First Name'
		)
	); ?>

	<?php echo form_input(array(
		'name' => 'last_name', 
		'id' => 'last_name',
		'value' => set_value('last_name', ''),
		'maxlength' => '100', 
		'size' => '50',
		'style' => 'width:100%',
		'placeholder' => 'Last Name'
		)
	); ?>

	<?php echo form_input(array(
		'name' => 'email', 
		'id' => 'email',
		'value' => set_value('email', ''),
		'maxlength' => '100', 
		'size' => '50',
		'style' => 'width:100%',
		'placeholder' => 'Email'
		)
	); ?>

	<?php echo form_password(array(
		'name' => 'password1', 
		'id' => 'password1',
		'value' => set_value('password1', ''),
		'maxlength' => '100', 
		'size' => '50',
		'style' => 'width:100%',
		'placeholder' => 'Password'
		)
	); ?>

	<?php echo form_password(array(
		'name' => 'password2', 
		'id' => 'password2',
		'value' => set_value('password2', ''),
		'maxlength' => '100', 
		'size' => '50',
		'style' => 'width:100%',
		'placeholder' => 'Confirm Password'
		)
	); ?>

<?php echo form_submit('submit', 'Submit'); ?>

or <?php echo anchor('admin', 'cancel'); ?>

<?php echo form_close(); ?>