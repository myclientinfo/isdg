

<ul class="nav nav-pills <?php echo $pageContent['data'][0]['section_title_slug'] ?>">
<?php foreach($pageContent['data'] as $piece):

?>
<li><a href="#<?php echo $piece['piece_title_slug']?>"><?php echo $piece['piece_title_short']?></a></li>
<?php endforeach; ?>
</ul>

<div id="page-content" class="<?php echo $pageContent['data'][0]['section_title_slug'] ?>">
<?php foreach($pageContent['data'] as $piece):
?>
<h2 id="<?php echo $piece['piece_title_slug']?>"><?php echo $piece['piece_title_short']?></h2>

<?php echo $piece['content']?>

<?php endforeach; ?>
</div>
