<?php

$options = array();

$options['title'] = "Section";

$options['available'] = array(
	"Front Page" => "frontpage",
	"Blog" => "blog",
	"Events" => "Events"
);

$data = $advert['section-site'];

?>

<select class="location-options" name="location">
	<option disabled selected>Location</option>
	<option value="site">Website</option>
	<option value="magazine">Magazine</option>
</select>

<select class="site-options hidden" name="section-site">
	<option disabled selected>Section</option>
	<option value="frontpage">Front Page</option>
	<option value="blog">Blog</option>
	<option value="blog">Events</option>
</select>

<select class="section-options magazine-options hidden" name="section-mag">
	<option disabled>Issue</option>
	<?php 
	foreach ($issues->result() as $row) : 
	?>
		<option value="<?php echo $row->issue_num;?>" <?php check_selection( $row->issue_num, $advert['section-mag'] );?> ><?php echo "Issue-".$row->issue_num; ?></option>
	<?php 
	endforeach; 
	?>
</select>
