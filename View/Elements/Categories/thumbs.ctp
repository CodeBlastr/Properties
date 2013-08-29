<?php
// sold category on joujou  (copy to the sites dir if making more abstract)
$properties = $this->requestAction('/properties/properties/category/521918ae-8e44-4b28-a797-58810ad25527/limit:2'); ?>

<div id="propertyCategoryThumbs521918ae-8e44-4b28-a797-58810ad25527" class="property category">
	<!-- Carousel items -->
	<ul class="property category thumbs list">
        <?php for($i = 0; $i < count($properties); $i++) : ?>
		<li class="media">
			<?php echo $this->Element('Galleries.thumb', array('thumbSize' => 'small', 'thumbClass' => 'pull-left', 'model' => 'Property', 'foreignKey' => $properties[$i]['Property']['id'])); ?> 
		</li>
		<?php endfor; ?>
	</ul>
</div>

