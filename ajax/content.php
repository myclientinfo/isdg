<?php 
//print_r($_GET);

require_once '../config.php';
$section = 'building-scheme-design';
$page = 'structural-loads';


$section = $_GET['section'];
$page = $_GET['page'];

$content = new Content();
$pageContent = $content->getContent($section, $page);

//print_r($pageContent);
?>

<ul class="nav nav-pills <?php echo $section ?>">
<?php foreach($pageContent['data'] as $piece):
?>
<li><a href="#<?php echo $piece['piece_slug']?>"><?php echo $piece['piece_short_title']?></a></li>
<?php endforeach; ?>
</ul>

<div id="page-content" class="<?php echo $section ?>">
<?php foreach($pageContent['data'] as $piece):
?>
<h2 id="<?php echo $piece['piece_slug']?>"><?php echo $piece['piece_title']?></h2>

<?php echo $piece['content']?>

<?php endforeach; ?>
</div>

<?
die();
if($_GET['category'] == 'structural-loads'){?>



<h2 id="typical-grid-dimensions">Typical grid dimensions</h2>




<h2 id="typical-sections">Typical Sections</h2>

<p>Text to be provided</p>

<h2 id="typical-service-zone-requirements">Typical Service Zone Requirements</h2>

<p>Text to be provided</p>


<?php } else if($_GET['category'] == 'sustainability-information') { ?>

<ul class="nav nav-pills">
	<li><a href="#rating-schemes">Rating Schemes</a></li>
	<li><a href="#steel">Steel</a></li>
	<li><a href="#concrete">Concrete</a></li>
	<li><a href="#reuse-of-structure">Reuse of Structure</a></li>
	<li><a href="#sustainability-in-materials-selection-and-design">Sustainability in Materials Selection and Design</a></li>
</ul>

<h2 id="rating-schemes">Rating Schemes</h2>



<h2 id="steel">Steel</h2>



<h2 id="concrete">Concrete</h2>



<h2 id="reuse-of-structure">Reuse of Structure</h2>


<h2 id="sustainability-in-materials-selection-and-design">Sustainability in Materials Selection and Design</h2>


<?php } else if($_GET['category'] == 'costings') { ?>

<ul class="nav nav-pills">
	<li><a href="#preliminary-costings-information">Preliminary Costings Information</a></li>
</ul>

<h2 id="preliminary-costings-information">Preliminary Costings Information</h2>

<p>The attached .pdf contains preliminary costing information in tabular form for assistance with building scheme design. The information has been sourced from the Riders Digest, Melbourne Edition, Australia 2011, by RLB | Rider Levett Bucknall.</p>

<p>Note: For more up to date information see SSN costs page, where there is a direct link to Rider Levett Bucknall global data.</p>

<?php } ?>