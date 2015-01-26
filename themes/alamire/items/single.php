<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Item Type Metadata', 'Content'), array('snippet' => 150));
    $dc_description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <p class="item-description">
    <?php echo "&raquo; ".link_to($item, 'show', strip_formatting($title)); ?> -
   
    <?php if ($description): ?>
        <?php echo $description; ?></p>
    <?php endif; ?>
    <?php if ($dc_description): ?>
        <?php echo $dc_description; ?></p>
    <?php endif; ?>
</div>
