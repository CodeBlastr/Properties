<div class="properties index row"> 
    <?php if (!empty($properties)) : ?>
        <div class="list-group">
        <?php foreach ($properties as $property) : ?>
			<div class="list-group-item clearfix">
				<div class="media">
					<?php echo $this->Media->display($property['Media'][0], array('width' => 90, 'height' => 90, 'class' => 'pull-left')); ?>
					<div class="media-body col-md-8">
						<h4><?php echo $this->Html->link($property['Property']['name'], array('action' => 'view', $property['Property']['id'])); ?></h4>
						<span class="truncate" data-truncate="200"><?php echo $property['Property']['description']; ?></span>
					</div>
				</div>
				<span class="badge"><?php echo ZuhaInflector::pricify($property['Property']['price'], array('currency' => 'USD')); ?></span>
			</div>
		<?php endforeach; ?>
		</div>        	
	<?php else : ?>
        <p>No properties found.</p>
	<?php endif; ?>
	<?php echo $this->element('paging');?>
</div>

<?php
// set the contextual sorting items
$this->set('forms_sort', array(
    'type' => 'select',
    'sorter' => array(array(
            'heading' => '',
            'items' => array(
                $this->Paginator->sort('price'),
                $this->Paginator->sort('name'),
            )
    )),
));
// set contextual search options
$this->set('forms_search', array(
    'url' => '/properties/properties/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:search_tags', 
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
            'heading' => 'Property',
            'items' => array(
                $this->Html->link(__('List'), array('controller' => 'properties', 'action' => 'index')),
                $this->Html->link(__('Add'), array('controller' => 'properties', 'action' => 'add')),
            )
        ),
        )));