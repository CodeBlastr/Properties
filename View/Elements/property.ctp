
<div class="product view media row-fluid" id="<?php echo __('property%s', $property['Property']['id']); ?>">

    <div class="item gallery property pull-left media-object"> 
        <?php echo $this->Element('Galleries.gallery', array('model' => 'Property', 'foreignKey' => $property['Property']['id'])); ?>
    </div>

    <div class="item description property span5 pull-left media-body">
        <div class="item summary property">
            <h2 class="media-heading" itemprop="name"><?php echo $property['Property']['name']; ?></h2>
            <span itemprop="description"><?php echo $property['Property']['summary']; ?></span>
        </div>
        <?php echo $property['Property']['description']; ?>
        <div class="item price property" itemprop="offers" itemscope itemtype="http://schema.org/Offer"> 
            <?php echo __('Price: $'); ?><span id="itemPrice" itemprop="price"><?php echo ZuhaInflector::pricify($property['Property']['price']); ?></span> 
        </div>
    </div>
</div>