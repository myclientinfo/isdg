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

<h3>ABGR</h3>

<p>ABGR rates a building according to its electricity consumption, using 12 months’ energy data. Therefore, ways in which structural design can influence electricity consumption is:</p>

<ol>
	<li>Façade design & lighting – allowing more natural lighting or using internal atriums for natural lighting.</li>
	<li>Façade design & cooling – shading mechanisms to reduce heat gain from direct sunlight (especially on Western facade in Australia).</li>
	<li>Façade design & energy supply – incorporation of solar energy technologies in to façade.</li>
	<li>Thermal mass, heating & cooling – correct location of thermal mass (eg concrete, blockwork, brick) can reduce daily temperature extremes and hence help regulate internal building temperatures throughout the day. Similarly, incorrect location of thermal mass can exacerbate temperature extremes and severely impact on user comfort.</li>
</ol>

<h3>Green star</h3>

<p>Materials component of Green star (20 points: 16% of all points) – recycling/reusing/minimising resources</p>

<ol>
<li>Designated recycled area in building – minimum area in building as % is dedicated to recycling.</li>
<li>Reusing façade – at least 50%. Not applicable if constructing on Greenfield site or total floor area of existing building demolished on site is less than 30% of the new building NLA.</li>
<li>Reusing existing structure – minimum 30% reuse of existing and the reused structure comprises at least 50% of the final structure by building volume.</li>
<li>Incorporation of fit out into structure – minimum 30% of fit out is shell and core – no false ceilings/floors etc.</li>
<li>Reducing cement content/using recycled aggregate – minimum 20% recycled aggregate and/or minimum 20% cement replacement of in-situ concrete/15% cement replacement for precast concrete.</li>
<li>Use of post consumer recycled steel – at least 50%. Not applicable if quantity is less than 1% of total contract value.</li>
<li>PVC pipes – minimum 30% replacement with alternative materials – steel/polyethylene.</li>
<li>Timber – all timber to be either post-consumer reused timber or Forest Stewardship Council (FSC) certified timber. Not applicable if quantity is less than 0.1% of total contract value.</li>
</ol>

<h2 id="steel">Steel</h2>

<p>NB. Onesteel have purchased Smorgon Steel, so all products are now produced by Onesteel.</p>

<p>OneSteel products may be produced in either of two production facilities – the Sydney Steel Mill (via the Electric Arc Furnace/EAF process) or the Whyalla Steelworks (via the Blast Furnace/BOS process). For steel manufactured at the Sydney Steel Mill, eg reinforceing, the current annual average content of post-consumer scrap is approximately 85%. For steel made at our Whyalla Steelworks, eg structural steel sections, the current annual average content of post-consumer scrap is approximately 2.5%.</p>

<h2 id="concrete">Concrete</h2>

<h3>Recycled Aggregate</h3>

<p>Boral concrete are currently trialing concrete mixes with 100% recycled aggregate. Recycled aggregate is aggregate which has been extracted from cured concrete, therefore the aggregate has a fine layer of mortar stuck to it. This mix has several implications on structural design requirements:</p>

<ol>
<li>Reduction in compressive strength - 15% reduction in compressive capacity for 60MPa concrete and 8% reduction for 40MPa concrete at 56 days.</li>
<li>Higher shrinkage. This is especially prevalent once 28 day strength has been achieved - at this time, the shrinkage can be around 145% of that of concrete with normal aggregate. The mix has a higher % of water absorption (consistent with that of weathered stone, for example). The higher water demand means that in order to achieve the required water/cement ratio, more cement needs to be added hence making the mix more expensive. Boral are currently working on this product with the aim to make a product that is comparative in cost to concrete with 100% natural aggregate. This may be achieved by partial replacement of the 20mm and 10mm course aggregates with recycled aggregate.</li>
<li>Reduction in flexural strength - 6% reduction in flexural strength for 60MPa concrete and 14% reduction for 40MPa concrete at 56 days.</li>
</ol>

<p>Boral currently sells 20MPa and 25MPa concrete with 100% recycled course aggregate replacement with this product currently being supported by the RTA for non-structural applications and some council authorities (eg Blacktown City Council).</p>

<p>For more information, refer to Standards Australia HB155-2002 Guide to the use of recycled concrete and masonry materials</p>

<h3>Cement Replacement with Fly Ash or Slag</h3>

Arup SSN Ground Granulated Blast Furnace Slag
Arup SSN Fly Ash (Pulverised Fuel Ash or PFA)

<h2 id="reuse-of-structure">Reuse of Structure</h2>

Arup REDGuide

<h2 id="sustainability-in-materials-selection-and-design">Sustainability in Materials Selection and Design</h2>

<ul>
	<li>Select low embodied energy building materials.</li>
	<li>Buy locally produced building materials.</li>
	<li>Use building products made from recycled materials.</li>
	<li>Use building products that are recyclable or reusable.</li>
	<li>Choose low maintenance building products.</li>
	<li>Low VOC building products.</li>
	<li>Consider ease of disassembly, demolition and disposal. Mechanical/bolted fixings can be disassembled as opposed to chemical.</li>
	<li>Consider source of material (geographic, environmental, social implications).</li>
	<li>Use durable products and materials – consider lifespan and lifecycle within whole building. Durability of material compared with location (more durable outside, less durable inside).</li>
	<li>Consider location of building materials with thermal mass – i.e. building layers.</li>
	<li>Lifecycle costs – construction, operation, demolition.</li>
	<li>Structural system - depth of floor plate and floor to floor height influence how adaptable the structure will be for future uses. Shallow floor plates and high floor to floor heights are more adaptable. Similarly, load bearing facade elements should be avoided for ease of future redevelopment. </li>
</ul>

<?php } else if($_GET['category'] == 'costings') { ?>

<ul class="nav nav-pills">
	<li><a href="#preliminary-costings-information">Preliminary Costings Information</a></li>
</ul>

<h2 id="preliminary-costings-information">Preliminary Costings Information</h2>

<p>The attached .pdf contains preliminary costing information in tabular form for assistance with building scheme design. The information has been sourced from the Riders Digest, Melbourne Edition, Australia 2011, by RLB | Rider Levett Bucknall.</p>

<p>Note: For more up to date information see SSN costs page, where there is a direct link to Rider Levett Bucknall global data.</p>

<?php } ?>