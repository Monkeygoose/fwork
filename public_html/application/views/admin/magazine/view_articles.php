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
?>

<tr>
<td><?php echo $row->title; ?></td>
<td><?php echo $row->author; ?></td>
<td><?php echo $row->issue; ?></td>
<td><?php echo $row->cat; ?></td>
<td><?php echo anchor('article/edit_article/'.$row->id, 'Edit'); ?></td>
<td><?php echo anchor('article/delete_article/'.$row->id, 'Delete'); ?></td>
</tr>

<?php 
endforeach; 
?>

</table>

<?php 
endif; 
?>