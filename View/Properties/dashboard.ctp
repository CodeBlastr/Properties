

<div class="properties row">
    
<div class="table-responsive">
  <table class="table table-striped">
		<thead>
			<tr>
				<th><?php echo $this->Paginator->sort('mls', 'MLS Number'); ?></th>
				<th><?php echo $this->Paginator->sort('name', 'Name'); ?></th>
				<th><?php echo $this->Paginator->sort('location', 'Location'); ?></th>
				<th><?php echo $this->Paginator->sort('summary', 'Summary'); ?>Summary</th>
				<th><?php echo $this->Paginator->sort('price', 'Price'); ?></th>
				<th><?php echo $this->Paginator->sort('is_public', 'Public'); ?></th>
				<th><?php echo $this->Paginator->sort('created', 'Created'); ?></th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($this->request->data as $propery): ?>
				<tr>
					<td><?php echo $propery['Property']['mls']; ?><?php echo $propery['Property']['is_featured'] ? '<br><span class="label label-warning">Featured</span>': ''; ?> </td>
					<td><?php echo $propery['Property']['name']; ?></td>
					<td><?php echo $propery['Property']['location']; ?></td>
					<td><?php echo $propery['Property']['summary']; ?></td>
					<td><span class="label label-success"><?php echo $propery['Property']['price']; ?></span></td>
					<td><?php echo $propery['Property']['is_public'] ? '<span class="glyphicon glyphicon-ok"></span>': ''; ?></td>
					<td><?php echo $this->Time->format('M d, Y', $propery['Property']['created']); ?></td>
					<td>
						<div class="btn-group">
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-eye-open"></span>', array('admin' => false, 'action' => 'view', $propery['Property']['id']), array('escape' => false)); ?>
						<?php echo $this->Html->link('<span class="glyphicon glyphicon-edit"></span>', array('action' => 'edit', $propery['Property']['id']), array('escape' => false)); ?>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
  </table>
</div>


</div>

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
	
// set the contextual breadcrumb items
$this->set('context_crumbs', array('crumbs' => array(
	$this->Html->link(__('Admin Dashboard'), '/admin'),
	$page_title_for_layout,
)));

// set the contextual menu items
$this->set('context_menu', array('menus' => array(
    array(
		'heading' => 'Properties',
		'items' => array(
			$this->Html->link(__('Dashboard'), array('admin' => true, 'controller' => 'properties', 'action' => 'dashboard'), array('class' => 'active')),
			)
		),
        array(
            'heading' => 'Properties',
            'items' => array(
                $this->Html->link(__('List Properties'), array('controller' => 'properties', 'action' => 'index')),
				$this->Html->link(__('Add Property'), array('controller' => 'properties', 'action' => 'add')),
            )
        ),
        ))); ?>