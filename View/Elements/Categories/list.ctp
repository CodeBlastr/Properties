<?php
// open houses category on joujou (copy to the sites dir if making more abstract)
$properties = $this->requestAction('/properties/properties/category/521918b7-2b30-435c-a803-59030ad25527/limit:3'); ?>

<div id="propertyCategory521918b7-2b30-435c-a803-59030ad25527" class="property category">
	<!-- Carousel items -->
	<ul class="property category list">
        <?php for($i = 0; $i < count($properties); $i++) : ?>
		<li class="media">
			<i class="icon-play pull-left"></i>
			<div class="media-body">
				<h6><?php echo $this->Html->link($properties[$i]['Property']['name'], array('plugin' => 'properties', 'controller' => 'properties', 'action' => 'view', $properties[$i]['Property']['id']));?></h6>
				<?php echo $properties[$i]['Property']['description']; ?>
			</div>
		</li>
		<?php endfor; ?>
	</ul>
</div>