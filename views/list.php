
<table>
<tr>
	<th>Title</th>
	<?php if($type != 'Section'){ ?>
	<th>Section</th>
	<?php } ?>
	<?php if($type == 'Piece'){ ?>
	<th>Page</th>
	<?php } ?>
	<th>Order</th>
</tr>
<?php foreach($data as $row){ 
	$link = '/api/Content/'.$row['section_title_slug'];
	if($type != 'Section') $link .= '/'.$row['page_title_slug'];
	if($type == 'Piece') $link .= '/'.$row['id'];
	$link .= '?view';
?>
<tr>
	<td><a href="<?php echo $link ?>"><?php echo $row['title']?></a></td>
	<?php if($type != 'Section'){ ?>
	<td><?php echo $row['section_title']?></td>
	<?php } ?>
	<?php if($type == 'Piece'){ ?>
	<td><?php echo $row['page_title']?></td>
	<?php } ?>
	<td><?php echo $row['order_number']?></td>
</tr>	
<?php } ?>
</table>