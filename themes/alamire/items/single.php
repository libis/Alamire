<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $dc_description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <p class="item-description">
    <?php link_to($item, 'show', strip_formatting($title)); ?> -
   
    <?php if ($dc_description): ?>
        <?php echo $dc_description; ?></p>
    <?php endif; ?>
</div>
