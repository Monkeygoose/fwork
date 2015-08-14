<div class="col-1-3">

	<?php 

	$attributes = array('class' => 'imgdz', 'id' => 'dzone');

	echo form_open_multipart("admin/upload/$temp_folder", $attributes); 

	?>

	<p>Drop images here to upload them.</p>

	</form>

</div>

<script>

new Dropzone("#dzone", {

    init: function() {
        this.on('success', function(file) {
            var newname = "/assets/uploads/<?php echo $temp_folder;?>/"+file.name; // this is my function
            // changing src of preview element
            file.previewElement.querySelector("img").src = newname;
        });
    }

});

</script>