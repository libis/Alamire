<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $dc_description = metadata($item, array('Dublin Core', 'Description'), array());
    ?>
    <p class="item-description">
    <?php strip_formatting($title);?> 
        <br>
    <?php if ($dc_description): ?>
        <?php echo $dc_description; ?></p>
    <?php endif; ?>
</div>
