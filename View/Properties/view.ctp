<div id="viewProperty">
	<div class="row-fluid">
		<div class="span12">
			<div id="myCarousel" class="carousel">
			<!-- Carousel items -->
				<div class="carousel-inner">
				    <div class="active item">…</div>
				    <div class="item">…</div>
				    <div class="item">…</div>
				</div>
			<!-- Carousel nav -->
			 	<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span4  border_set new_lifted" id="propAddress">
			<div class="row-fluid">
				<div class="span12">
					<div class="navbar noPadBtm">
						<div class="navbar-inner border_gone">
							<p class="nav-text">
								<span>Property Address</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid top_space" id="housePrice">
				<div class="span12 text-center">
					<span>Offered At</span>
					<h2 id="housePrice">$$$$</h2>
				</div>
			</div>
			<div class="row-fluid top_space" id="houseName">
				<div class="span12 text-center">
					<span>Name/style of house</span>
				</div>
			</div>
			<div class="row-fluid" id="houseInfo">
				<div class="span12 text-center">
					<p><img src="/theme/default/upload/1/img/bedicon.jpg" alt="Bed Icon"> X Bedrooms</p>
					<p><img src="/theme/default/upload/1/img/bathicon.jpg" alt="Bath Icon"> X Bathrooms</p>
					<p><img src="/theme/default/upload/1/img/houseicon.jpg" alt="House Icon"> X Square Feet</p>
					<p><img src="#" alt="Acre Icon"> X Acre</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12 text-center">
					<p><img src="/theme/default/upload/1/img/calicon.jpg" alt="Open house button" />Property Status info/update</p>
				</div>
			</div>
			<div class="row-fluid margin_button">
				<div class="span12 text-center">
					<p><button class="btn btn-medium same_width red_button">Download Brochure</button></p>
					<p><button class="btn btn-medium same_width red_button">Download MLS Detail</button></p>
				</div>
			</div>
		</div>
		<div class="span4 border_set new_lifted" id="propDescrip">
			<div class="row-fluid">
				<div class="span12">
					<div class="navbar">
						<div class="navbar-inner border_gone">
							<p class="nav-text">
								<span>Key Features</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" id="propFeatures">
					<ul>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
						<li><span>Item</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="span4 border_set new_lifted" id="propContact">
			<div class="row-fluid">
				<div class="span12">
					<div class="navbar noPadBtm">
						<div class="navbar-inner border_gone">
							<p class="nav-text-map">
								<span>Location Maasdfp</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div>
						<?php echo $this->Element('Maps.mapped', array('locations' => array($property), 'mapHeight' => '200px', 'mapZoom' => 11, 'autoZoomMultiple' => true));  ?>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<div class="navbar">
						<div class="navbar-inner border_gone_sides">
							<p class="nav-text-map">
								<span>Like This Listing? Contact Us</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span12" id="contactPad">
					<form class="form-search text-center" id="contactForm">
						<input type="text" class="span12 search-query" placeholder="Please Enter Your Full Name">
						<input type="text" class="span12 search-query" placeholder="Please Enter Your Phone Number">
						<input type="text" class="span12 search-query" placeholder="Please Enter Your Email">
						<input type="text" class="span12 search-query" placeholder="Human Test, Please Enter 10">
						<button type="submit" class="btn btn-large blue_button">Contact Us</button>
					</form>
				</div>
			</div>
		</div>
	</div>		
</div>

<style>
	#viewProperty li{
		color:#7D2010;
	}
	#viewProperty li > span{
		color:#333333;
	}
	#viewProperty .noPadBtm {
		margin-bottom:0;
	}
	#viewProperty .border_set{
		border:thin solid #d3d3d3;
		/*box-shadow:0 1em 1em #000000;*/	
	}
	#viewProperty .navbar-inner{
		border-radius:0px;
		background: url("/theme/default/upload/1/img/wrap-title2.jpg") repeat scroll 0 0 transparent;
	}
	#viewProperty .navbar-inner.border_gone{
		border-top:0;
		border-right:0;
		border-left:0;
		border-bottom:1px solid #d4d4d4	
	}
	#viewProperty .navbar-inner.border_gone_sides{
		border-top:1px solid #d4d4d4;
		border-right:0;
		border-left:0;
		border-bottom:1px solid #d4d4d4;
	}
	#viewProperty .nav-text{
		font-family: 'Raleway', 'Oswald', sans-serif;
		color: #2F3B61;
		font-size: 19px;
		text-align: center;
		margin-bottom:0;
		padding-top: 5%;
	}
	#viewProperty .nav-text-map{
		font-family: 'Raleway', 'Oswald', sans-serif;
		color: #2F3B61;
		font-size: 17px;
		text-align: center;
		margin-bottom:0;
		padding-top: 5%;
	}
	#viewProperty .head_bar{
		background-color:#EAEAEA;
		padding:2%;	
	}
	#viewProperty .top_space{
		padding-top:3%;
	}
	#viewProperty .same_width{
		width:60%;
	}
	#viewProperty .search-query{
		width: 96% !important;
		box-shadow: 1px 1px 2px #555 inset;
		border-radius: 9px;
		color: #BEC3E0;
		min-width: 167px;
		margin:2% 0;
	}
	#viewProperty .blue_button{
		margin-top:2%;
		color: #ffffff;
		background-color: #353446;
		border:none;
		text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
		background: url("/theme/default/upload/1/img/buttonbkgd.png") repeat scroll 0 0 transparent;
		font-size: 18px;
		height: 41px;
		text-transform:uppercase;
	}
	#viewProperty .red_button {
		color: #ffffff;
		background-color: #671A0D;
		background-image: none;
		text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);
		border:none;
		-webkit-border-radius: 0px;
	    -moz-border-radius: 0px;
	    border-radius: 0px;   
	}
	#viewProperty .new_lifted{
		border-radius:2px;
		position:relative;
		background:#fcfcfc;
		box-shadow: 0px 0px 1px 0px rgba(0,0,0,0.2);
		-o-box-shadow: 0px 0px 1px 0px  rgba(0,0,0,0.2);
		-moz-box-shadow: 0px 0px 1px 0px  rgba(0,0,0,0.2);
	}
	#viewProperty .new_lifted:before, .new_lifted:after {
		content: "";
		position: absolute;
		z-index: -1;
		-ms-transform: skew(-3deg,-2deg);
		-webkit-transform: skew(-3deg,-2deg); /* Safari and Chrome */
		-o-transform: skew(-3deg,-2deg); /* Opera */
		-moz-transform: skew(-3deg,-2deg); /* Firefox */
		bottom: 14px;
		box-shadow: 0 18px 8px rgba(0, 0, 0, 0.3);
		height: 50px;
		left: 1px;
		max-width: 50%;
		width: 50%;
	}
	#viewProperty .new_lifted:after {
		-ms-transform: skew(3deg,2deg); /* IE 9 */
		-webkit-transform: skew(3deg,2deg); /* Safari and Chrome */
		-o-transform: skew(3deg,2deg); /* Opera */
		-moz-transform: skew(3deg,2deg); /* Firefox */
		left: auto;
		right: 1px;
	}
	#viewProperty .margin_button{
		margin-bottom:12%;
	}
	#viewProperty #housePrice{
		margin-top:0;
	}
	#viewProperty #houseName{
		border-top:thin solid #D3D3D3;
		border-bottom:thin solid #d3d3d3;
	}
	#viewProperty #houseInfo{
		margin:2% 0;
		padding:2%;
	}
	#viewProperty #houseDescrip{
		padding: 2%;
	}
	#viewProperty #contactPad{
		padding:0 2% 2% 2%;
	}
	.properties.view_property .row-fluid [class*="span4"] {
		margin-left: 0.6%;
	}
	.properties.view_property .row-fluid .span4 {
		width: 32.623932%;
	}
</style>
<script>
	function equalHeight(group) {
		var tallest = 0;
		group.each(function() {
			var thisHeight = $(this).height();
			if(thisHeight > tallest) {
				tallest = thisHeight;
			}
		});
		group.height(tallest);
	}
	
	$(document).ready(function() {
		equalHeight($(".border_set"));
	});
</script>


<?php
echo $this->Element('mapped', array('locations' => $properties, 'mapHeight' => '400px', 'mapZoom' => 11, 'autoZoomMultiple' => true), array('plugin' => 'maps')); 

echo $this->Element('Properties.property', array('property' => $property)); ?>


<?php
// set contextual search options
$this->set('forms_search', array(
    'url' => '/properties/properties/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:name', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Property Search',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
    array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard')),
			)
		),
	array(
		'heading' => 'Property',
		'items' => array(
			$this->Html->link(__d('properties', 'List'), array('action' => 'index')),
			$this->Html->link(__d('properties', 'Edit'), array('action' => 'edit', $property['Property']['id'])),
			$this->Html->link(__d('properties', 'Delete'), array('action' => 'delete', $property['Property']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $property['Property']['id'])),
			),
		),
	))); ?>
