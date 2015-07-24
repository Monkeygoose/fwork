<?php echo validation_errors(); ?>

<?php echo form_open('article/create_article'); ?>

	<input type="text" name="title" placeholder="Title"><br />

	<input type="text" name="author" placeholder="Author"><br />

	<select name="category">
		<option disabled selected>Category</option>
		<option value="art">Art</option>
		<option value="music">Music</option>
		<option value="poetry">Poetry</option>
		<option value="design">Design</option>

	</select><br />

	<select name="issue_num">
		<option disabled selected>Issue</option>
		<?php 
		foreach ($query->result() as $row) : 
		?>
			<option value="<?php echo $row->issue_num;?>"><?php echo $row->issue_num; ?></option>
		<?php 
		endforeach; 
		?>
	</select><br />

	<textarea class="tinymce"></textarea><br />

	<input type="submit" name="submit" value="Create Article" />

</form>

<script type="text/javascript">
$(function(){
	$("textarea.tinymce").tinymce({
	// Location of TinyMCE script
		script_url : "<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>",

		selector: "textarea",
		theme: "modern",
		plugins: [
		     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		     "save table contextmenu directionality emoticons template paste textcolor"
		]

	});
});
</script>