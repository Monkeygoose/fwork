<?php 
if ($query->num_rows() > 0 ) : 
?>

<table border="0">
<tr>
<td>ID</td>
<td>First Name</td>
<td>Last Name</td>
<td colspan="2">Actions</td>
</tr>

<?php 
foreach ($query->result() as $row) : 
?>

<tr>
<td><?php echo $row->user_id; ?></td>
<td><?php echo $row->user_first_name; ?></td>
<td><?php echo $row->user_last_name; ?></td>
<?php if ($row->user_id != 1){ ?>
<td><?php echo anchor('register/delete_user/'.$row->user_id, 'Delete'); ?></td>
<?php } else { echo "<td>N/A</td>"; };?>
</tr>

<?php 
endforeach; 
?>

</table>

<?php 
endif; 
?>