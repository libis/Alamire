<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $description = metadata($item, array('Item Type Metadata', 'Content'), array('snippet' => 150));
    ?>
    <p class="item-description">
    <?php echo "&raquo; ".link_to($item, 'show', strip_formatting($title)); ?> -
    <?php /*if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array(), 0, $item), 
            array('class' => 'image'), 'show', $item
        );
    }*/
    ?>
    <?php if ($description): ?>
        <?php echo $description; ?></p>
    <?php endif; ?>
</div>
