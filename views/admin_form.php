<?php 

$new = empty($data);

$link = '/api/Admin';



if($new) $link .= '/new';
else $link .= '/'.$data['section_title_slug'];

if($type != 'Section'){
	if($new) $link .= '/new';
	else $link .= '/'.$data['page_title_slug'];
}
if($type == 'Piece'){ 
	if($new) $link .= '/new';
	else $link .= '/'.$data['id'];
	$GLOBALS['page_id'] = $data['page_id'];
}

if($type == 'Page'){
	$GLOBALS['page_id'] = $data['id'];
}
?>
<h2><?php echo $type?></h2>

	<form class="form-horizontal" action="<?php echo $link?>" method="POST">
	<input type="hidden" name="method" id="method" value="<?php echo $new ? 'POST' : 'PUT'?>">
	<?php foreach($structure as $key => $field){ ?>
	
	<div class="control-group">
		
		<?php if($field['type'] !='hidden'){?>
		<label class="control-label"><?php echo $field['label']?></label>
		<?php } ?>
		<div class="controls">
			<?php if($field['type'] =='hidden'){ ?>
			<input id="<?php echo $key ?>" name="<?php echo $key ?>" type="hidden" value="<?php echo $data[$key]?>">
			<?php } else if($field['type'] == 'textarea') { ?>
			<textarea id="<?php echo $key ?>" name="<?php echo $key ?>"><?php echo $data[$key]?></textarea>
			<?php } else if($field['type']=='select') { 
				//echo '<pre>';
				//print_r($field['values']);
				//echo '</pre>';
			?>
			<select id="<?php echo $key ?>" name="<?php echo $key ?>">
			<?php foreach($field['values'] as $k => $v){ ?>
				<option value="<?php echo $v['id'] ?>"<?php echo $v[id] == $data[$key] ? '' : '' ?>><?php echo $v['title'] ?></option>
			<?php } ?>
			</select>
			<?php } else if($field['type']=='yesno') { ?>
			<select id="<?php echo $key ?>" name="<?php echo $key ?>">
				<option value="0"<?php echo $data[$key]?'':' selected="selected"'?>>No</option>
				<option value="1"<?php echo $data[$key]?' selected="selected"':''?>>Yes</option>
			</select>
			<?php } else { ?>
			<input id="<?php echo $key ?>" name="<?php echo $key ?>" type="text" value="<?php echo $data[$key]?>">
			<?php } ?>
		</div>
	</div>
	
	<?php } ?>
	<button type="submit" class="btn btn-success">
		Save
	</button>

	
	</form>
	
	

