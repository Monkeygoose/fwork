<script type="text/javascript" src="<?php echo base_url('assets/js/tinymce/jquery.tinymce.min.js');?>"></script>
<script type="text/javascript">
$(function(){
	$("textarea.tinymce").tinymce({
	// Location of TinyMCE script
		script_url : "<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>",
		selector: "textarea",
		theme: "modern",
		height : "350px",
		relative_urls: false,
		document_base_url: "<?php echo base_url(); ?>",

		style_formats: [
		    {
		        title: 'Image Left',
		        selector: 'img',
		        styles: {
		            'float': 'left', 
		            'margin': '0 10px 0 10px'
		        }
		     },
		     {
		         title: 'Image Right',
		         selector: 'img', 
		         styles: {
		             'float': 'right', 
		             'margin': '0 0 10px 10px'
		         }
		     }
		],

		plugins: [
		     "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
		     "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		     "save table contextmenu directionality emoticons template paste textcolor"
		]

	});
});

</script>