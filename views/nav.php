<?php 
$i = 1;
foreach($nav as $sectionSlug => $section):
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
    	<?php foreach($section['pages'] as $pageSlug => $page): 
	    	if(isset($page['link'])){
	    		$link = $page['link'];
	    	} else {
		    	$link = '/api/Content/'.$sectionSlug.'/'.$page['page_title_slug'];
	    	}
	    	
    	?>
        <li>
        <a href="<?php echo $link?>?view"><?php echo $page['page_title']?></a></li>
        <?php endforeach; ?>
    </ul>
</div>
</div>
</div>

<? 
$i++;
endforeach; ?>