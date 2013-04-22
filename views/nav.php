<?php 

include '../config.php';

$content = new Content();

if(!isset($_GET['admin'])){
$nav = $content->getMainNav();
} else {
$nav = $content->getAdminNav();
}
?>

<?php 
$i = 1;
foreach($nav as $sectionSlug => $section):
	//print_r($section);
?>


<div class="accordion-group <?php echo $sectionSlug?>" id="accordion-group<?php echo $i ?>">
<div class="accordion-heading">
<a class="accordion-toggle" data-section="<?php echo $sectionSlug?>" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?php echo $i ?>">
<?php echo $section['section_title']?>
</a>
</div>
<div id="collapse<?php echo $i ?>" class="accordion-body collapse<?php echo $i==1?' in':''?>">
<div class="accordion-inner">

    <ul>
    	<?php foreach($section['pages'] as $pageSlug => $page): ?>
        <li><a href="#<?php echo $page['page_title_slug']?>"><?php echo $page['page_title']?></a></li>
      <?php endforeach; ?>
    </ul>
</div>
</div>
</div>

<? 
$i++;
endforeach; ?>