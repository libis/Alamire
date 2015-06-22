<?php echo head(); ?>
<div id="primary">
   
    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>
    
</div><!-- end primary -->
<div id="secondary">
<h4><?php echo html_escape(get_option('simple_contact_form_thankyou_page_title')); // Not HTML ?></h4>
<?php echo get_option('simple_contact_form_thankyou_page_message'); // HTML ?>
</div>

<?php echo foot(); ?>