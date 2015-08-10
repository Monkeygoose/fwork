<?php echo validation_errors(); ?>

<?php echo form_open('article/create_post'); ?>

	<div class="formitems">

		<input type="text" name="title" placeholder="Title"><br />

		<input type="text" name="author" placeholder="Author"><br />

		<select name="cat">
			<option disabled selected>Category</option>
			<option value="art">Art</option>
			<option value="music">Music</option>
			<option value="poetry">Poetry</option>
			<option value="design">Design</option>

		</select><br />

		<input type="hidden" name="issue" value="0">

	</div>

	<textarea name="text" class="tinymce"></textarea><br />

	<div class="formitems">

		<input type="submit" name="submit" value="Create Post" />

	</div>

</form>