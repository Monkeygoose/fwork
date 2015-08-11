<div class="col-1-3" style="padding: 0px 20px;">

<?php 
$attributes = array('id' => 'upload');

echo form_open_multipart('admin/upload', $attributes); 

?>

		<input type="hidden" name="directory" value="<?php echo $temp_folder;?>">

		<div id="drop">Drop Here</br>
			<a>Browse derp</a>
			<input type="file" name="upl" multiple />
		</div>

		<ul>
			<!-- The file uploads will be shown here -->
		</ul>

	</form>

</div>