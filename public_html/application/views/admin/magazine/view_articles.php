<?php
if ($query->num_rows() > 0 ) : 
?>

<table border="0">
<tr>
<td>Title</td>
<td>Author</td>
<td>Issue</td>
<td>Category</td>
<td colspan="2">Actions</td>
</tr>

<?php 
foreach ($query->result() as $row) : 

if ($row->issue != 0) {
?>

<tr>
<td><?php echo $row->title; ?></td>
<td><?php echo $row->author; ?></td>
<td><?php echo $row->issue; ?></td>
<td><?php echo $row->cat; ?></td>
<td><a class="actbtn" data-loc="<?php echo base_url();?>index.php/article/edit_article/<?php echo $row->slug;?>">Edit</a></td>
<td><?php echo anchor('article/delete_article/'.$row->id, 'Delete'); ?></td>
</tr>

<?php
};

endforeach; 
?>

</table>

<?php 
endif; 
?>

<script src="<?php echo site_url('resources/js/main.js'); ?>"></script>