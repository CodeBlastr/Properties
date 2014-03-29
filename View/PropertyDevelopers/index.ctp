<div class="properties index row"> 
    <?php if (!empty($propertyDevelopers)) : ?>
        <div class="list-group">
        <?php foreach ($propertyDevelopers as $developer) : ?>
			<div class="list-group-item clearfix">
				<div class="media">
					<div class="media-body col-md-8">
						<h4><?php echo $this->Html->link($developer['PropertyDeveloper']['name'], array('action' => 'view', $developer['PropertyDeveloper']['id'])); ?></h4>
						<span class="truncate" data-truncate="200"><?php echo $developer['PropertyDeveloper']['description']; ?></span>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		</div>        	
	<?php else : ?>
        <p>No developers found.</p>
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
                $this->Paginator->sort('name'),
            )
    )),
));
// set contextual search options
$this->set('formsSearch', array(
    'url' => '/properties/property_developers/index/', 
	'inputs' => array(
		array(
			'name' => 'contains:description', 
			'options' => array(
				'label' => '', 
				'placeholder' => 'Developer',
				'value' => !empty($this->request->params['named']['contains']) ? substr($this->request->params['named']['contains'], strpos($this->request->params['named']['contains'], ':') + 1) : null,
				)
			),
		)
	));
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
        array(
            'heading' => 'Developer',
            'items' => array(
                $this->Html->link(__('Add'), array('controller' => 'property_developers', 'action' => 'add')),
            )
        ),
	)));