<div class="col-1-3">

	<?php 

	$attributes = array('class' => 'imgdz', 'id' => 'dzone');

	echo form_open_multipart("advert/upload/$temp_folder", $attributes); 

	?>

	<p>Drop images here to upload them.</p>

	<?php 

	$files = get_files("assets/uploads/".$temp_folder."/");

	if(isset($files)){
		foreach ($files as $value) {
		?>
			<div class="dz-preview dz-processing dz-image-preview dz-success dz-complete">
				<div class="dz-image">
					<img data-dz-thumbnail="" src="<?php echo $value; ?>">
				</div>
			</div>
		<?php 
		};
	};
	?>

	</form>

</div>

<script>

new Dropzone("#dzone", {

    init: function() {
    	this.on("addedfile", function() {
	      if (this.files[1]!=null){
	        this.removeFile(this.files[0]);
	      }
	    });
        this.on('success', function(file) {
            var newname = "/assets/uploads/<?php echo $temp_folder;?>/advert.jpg"; // this is my function
            // changing src of preview element
            file.previewElement.querySelector("img").src = newname;
        });
    }

});

</script>