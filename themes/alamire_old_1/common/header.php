<!DOCTYPE html>
<html class="<?php echo get_theme_option('Style Sheet'); ?>" lang="<?php echo get_html_lang(); ?>">
<head>
    <link href='http://fonts.googleapis.com/css?family=Dosis:400,500,600,700' rel='stylesheet' type='text/css'>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=yes" />
    <?php if ($description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>

    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts)." ".$description; ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <?php fire_plugin_hook('public_head',array('view'=>$this)); ?>
    <!-- Stylesheets -->
    <?php
    queue_css_file(array('iconfonts', 'style'));
    queue_css_file(array('lean-slider', 'style'));

    echo head_css();
    ?>
    <!-- JavaScripts -->
    <?php queue_js_file('vendor/modernizr'); ?>
    <?php queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)')); ?>
    <?php queue_js_file('vendor/respond'); ?>
    <?php queue_js_file('globals'); ?>
    <?php queue_js_file('lean-slider'); ?>
    <?php echo head_js(); ?>
</head>
 <?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
        <header>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <div id="header-left">
                <div id="site-title">
                    <img src="<?php echo img("logo.jpg"); ?>">
                    <div class="alamire-title">Alamire Foundation</div>              
                </div>
                
                 <div id="primary-nav">
                
               
             <?php
                  echo public_nav_main();
             ?>
            </div>
          </div>
                <div id="site-title-text">
                    <a href="<?php echo url("/");?>">IDEM</a>
                      <?php if ($description = option('description')): ?>
                      <div id="description"><?php echo $description; ?></div>
                   <?php endif; ?>
                </div> 
          
            

           
            
            <div id="search-container">
                <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
                <?php echo search_form(array('show_advanced' => true)); ?>
                <?php else: ?>
                <?php echo search_form(); ?>
                <?php endif; ?>
            </div>
            
            <script>
                jQuery(document).ready(function(){                    
                    var val = '<?php echo array_key_exists('q', $_GET) ? $_GET['q'] : '';?>';
                    jQuery('#query').attr('placeholder','Search the collection...');
                    if(val!=''){                     
                        jQuery('#query').val(val);
                    }
      
                });
            </script>
            
            
        </header>

         
  
         <div id="mobile-nav">
             <?php
                  echo public_nav_main();
             ?>
         </div>
        
        <?php echo theme_header_image(); ?>
                       
    <div id="content">

<?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
