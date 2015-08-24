<?php echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
)); ?>
<div id="primary">
   
    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>
    
</div><!-- end primary -->
<div id="secondary">
    <h4><?php echo metadata('simple_pages_page', 'title'); ?></h4>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>
</div>

<?php echo foot(); ?>
