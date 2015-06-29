<?php echo form_open('register/delete_user'); ?>

<?php if (validation_errors()) : ?>

<h3>Whoops! There was an error:</h3>
<p><?php echo validation_errors(); ?></p>

<?php endif; ?>

<?php foreach ($query->result() as $row) : ?>
<?php echo $row->user_first_name . ' ' . $row->user_last_name; ?>
<?php echo form_submit('submit', 'Delete'); ?>
or <?php echo anchor('admin', 'cancel'); ?>
<?php echo form_hidden('id', $row->user_id); ?>
<?php endforeach; ?>

</form>