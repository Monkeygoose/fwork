<?php
if ($query->num_rows() > 0 ) : 
?>

<table border="0">
<tr>
<td>ID</td>
<td>Issue Number</td>
<td>Release Date</td>
<td>Number of Articles</td>
<td colspan="2">Actions</td>
</tr>

<?php 
foreach ($query->result() as $row) : 
?>

<tr>
<td><?php echo $row->ID; ?></td>
<td><?php echo $row->issue_num; ?></td>
<td><?php echo date('[ l ] jS F Y', strtotime($row->date)); ?></td>
<td><?php echo $row->num_articles; ?></td>
<td><?php echo anchor('issue/delete_issue/'.$row->ID, 'Delete'); ?></td>
</tr>

<?php 
endforeach; 
?>

</table>

<?php 
endif; 
?>