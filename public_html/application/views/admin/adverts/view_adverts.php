<?php

// $row->location
// $row->section
// $row->page
// $row->type
// $row->client_name
// $row->click_count
// $row->view_count
// $row->link
// $row->image
// $row->text
// $row->start_date
// $row->end_date

if ($query->num_rows() > 0 ) : 
?>

<table border="0">
<tr>
<td>Client Name</td>
<td>Location</td>
<td>Type</td>
<td>Image URL</td>
<td colspan="2">Actions</td>
</tr>

<?php 
foreach ($query->result() as $row) : 
?>

<tr>
<td><?php echo $row->client_name; ?></td>
<td><?php echo $row->location; ?></td>
<td><?php echo $row->type; ?></td>
<td><?php echo $row->image; ?></td>
<td><a href="<?php echo base_url();?>index.php/article/edit_article/<?php echo $row->id;?>">Edit</a></td>
<td><?php echo anchor('advert/delete_advert/'.$row->id, 'Delete'); ?></td>
</tr>

<?php
endforeach; 
?>

</table>

<?php 
endif; 
?>

<script>
    var url = "<?php echo site_url('resources/js/main.js'); ?>";
    $.getScript(url);
</script>