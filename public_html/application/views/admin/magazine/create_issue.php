<?php echo validation_errors(); ?>

<?php echo form_open('issue/create_issue') ?>

	<input type="number" name="issue_num" placeholder="Issue Number"/><br />

	<input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br />

	<input type="submit" name="submit" value="Create Issue" />

</form>