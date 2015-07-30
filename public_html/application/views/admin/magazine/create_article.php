<?php echo validation_errors(); ?>

<?php echo form_open('article/create_article'); ?>

	<input type="text" name="title" placeholder="Title"><br />

	<input type="text" name="author" placeholder="Author"><br />

	<select name="cat">
		<option disabled selected>Category</option>
		<option value="art">Art</option>
		<option value="music">Music</option>
		<option value="poetry">Poetry</option>
		<option value="design">Design</option>

	</select><br />

	<select name="issue">
		<option disabled selected>Issue</option>
		<?php 
		foreach ($query->result() as $row) : 
		?>
			<option value="<?php echo $row->issue_num;?>"><?php echo $row->issue_num; ?></option>
		<?php 
		endforeach; 
		?>
	</select><br />

	<textarea name="text" class="tinymce"></textarea><br />

	<input type="submit" name="submit" value="Create Article" />

</form>

<img src="<?php echo base_url('assets/img/logo.png');?>">