<?php 
// featured category on joujou (copy to the sites dir if making more abstract)
$properties = $this->requestAction('/properties/properties/category/521b7d14-e534-4fbf-9281-58810ad25527'); ?>

<div class="row-fluid">
	<div class="span12">
		<div id="myCarousel" class="carousel slide">
			<!-- Carousel items -->
			<div class="carousel-inner">
		        <?php for($i = 0; $i < count($properties); $i++) : ?>
				<div class="<?php echo $i == 0 ? 'active' : null; ?> item">
					<?php echo $this->Element('Galleries.thumb', array('thumbSize' => 'large', 'model' => 'Property', 'foreignKey' => $properties[$i]['Property']['id'])); ?>
					<div class="carousel-caption">
						<h4><small>Featured Listing</small></h4>
						<h1><?php echo $this->Html->link($properties[$i]['Property']['name'], array('plugin' => 'properties', 'controller' => 'properties', 'action' => 'view', $properties[$i]['Property']['id'])); ?></h1>
						<p>
							<?php echo $properties[$i]['Property']['location']; ?>
						</p>
						<hr />
						<p>
							$<?php echo $properties[$i]['Property']['price']; ?>
						</p>
						<hr />
						<p>
							<?php echo $properties[$i]['Property']['bedrooms']; ?> Bedroom
						</p>
						<hr />
						<p>
							<?php echo $properties[$i]['Property']['bathrooms']; ?> bathrooms
						</p>
						<hr />
						<p>
							<?php echo $properties[$i]['Property']['footage']?>
						</p>
						<hr />
						<p>
							<?php echo $properties[$i]['Property']['acres']?>
						</p>
						<hr />
						<p align="center" class="intrested">
							Intrested in the listing?
						</p>
						<p align="center">
							<button class="btn btn-primary contact-btn" type="button">CONTACT US</button>
						</p>
					</div>
				</div>
				<?php endfor; ?>
			</div>
			<!-- Carousel nav --> 
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			<ul class="carousel-indicators row-fluid" style="position: static;">
		        <?php for($i = 0; $i < count($properties); $i++) : ?>
		        	<li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : null; ?>"></li>
		        <?php endfor; ?>
			</ul>
		</div>
	</div>
</div>
