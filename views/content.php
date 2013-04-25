

<?php 
//print_r();	
	
?>
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
<?
die();
if($_GET['category'] == 'structural-loads'){?>



<h2 id="typical-grid-dimensions">Typical grid dimensions</h2>




<h2 id="car-parks">Car Parks</h2>


<p>Car park dimensions are determined upon the 'user class' as defined in AS2890. The table below defines the general arrangement, with typical configurations for different types of buildings provided below. AS2890 also lists:</p>

<ul>
	<li>no-go zones for structural elements to allow doors, etc to open</li>
	<li>maximum slopes and transitions for ramps</li>
	<li>clearances for disability parking [2.3m along travel path and 2.5m at disabled bay]</li>
	<li>minimum curves, etc</li>
	<li>download a copy from the Aus Info Center <a href="http://essentials.intranet.arup.com/index.cfm?87EAE528-A468-B325-098E-D10C5596B411">Australian Standards Link</a></li>
</ul>

<table>
<tr><th>User Type</th><th>User Class</th><th>Bay length </th><th>Bay width</th><th>Aisle Width</th></tr>
<tr><td>Employee and Commuter parking
(generally, all-day parking)</td><td>1</td><td>5.4</td><td>2.40</td><td>6.2</td></tr>
<tr><td>Medium term parking
(town centre parking, hotels, sports and entertainment, airports)</td><td>2</td><td>5.4</td><td>2.5</td><td>5.8</td></tr>
<tr><td>Short term normal parking
(town centre parking, hospital, medical centres)</td><td>3</td><td>5.4</td><td>2.6</td><td>5.8</td></tr>
<tr><td>Short term high turnover parking
(shopping centres)</td><td>3A (Option 1)<br>3A (Option 2)</td><td>5.4<br>5.4</td><td>2.6<br>2.7</td><td>6.6<br>6.2</td></tr>
</table>


<h3>Office Parking</h3>


<h3>Retail / Shopping Centres</h3>

<p>Across car spaces: 	8.4m (3 car spaces x 2.7m + 0.3m col)<br>
Across aisle and spaces: 	8.3m (2 parking bays back to back)</p>

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