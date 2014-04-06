<h1><?php echo $propertyDeveloper['PropertyDeveloper']['name']; ?></h1>
<?php echo $propertyDeveloper['PropertyDeveloper']['description']; ?>

<?php if (!empty($propertyDeveloper['Property'])) : ?>
	<div class="list-group">
		<?php foreach ($propertyDeveloper['Property'] as $property) : ?>
			<div class="list-group-item">
				<?php echo $this->Html->link($property['location'], array('controller' => 'properties', 'action' => 'view', $property['id'])); ?>
				<span class="badge"><?php echo $this->Html->link('Edit', array('controller' => 'properties', 'action' => 'edit', $property['id'])); ?></span>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Edit'), array('controller' => 'property_developers', 'action' => 'edit', $propertyDeveloper['PropertyDeveloper']['id'])),
			$this->Html->link(__('Delete'), array('controller' => 'property_developers', 'action' => 'delete', $propertyDeveloper['PropertyDeveloper']['id']), null, 'Are you sure?')
			)
		),
	)));