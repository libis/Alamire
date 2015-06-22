<?php

/**
 * @package     omeka
 * @subpackage  solr-search
 * @copyright   2012 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<?php queue_css_file('results'); ?>
<?php echo head(array('title' => __('Solr Search')));?>

<div id="primary">
   
    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>
    
    <!-- Facets. -->
    <div id="solr-facets">

      <?php foreach ($results->facet_counts->facet_fields as $name => $facets): ?>

        <!-- Does the facet have any hits? -->
        <?php if (count(get_object_vars($facets))): ?>

          <!-- Facet label. -->
          <?php $label = SolrSearch_Helpers_Facet::keyToLabel($name); ?>
          <h3><?php echo $label; ?></h3>

          <ul>
            <!-- Facets. -->
            <?php foreach ($facets as $value => $count): ?>
              <li class="<?php echo $value; ?>">

                <!-- Facet URL. -->
                <?php $url = SolrSearch_Helpers_Facet::addFacet($name, $value); ?>

                <!-- Facet link. -->
                <a href="<?php echo $url; ?>" class="facet-value">
                  <?php echo $value; ?>
                </a>

                <!-- Facet count. -->
                (<span class="facet-count"><?php echo $count; ?></span>)

              </li>
            <?php endforeach; ?>
          </ul>

        <?php endif; ?>

      <?php endforeach; ?>
    </div>

</div><!-- end primary -->
<div id="secondary">
   
    <div id="search-container">        
        <?php echo search_form(); ?>
    </div>

    <script>
        jQuery(document).ready(function(){                    
            var val = '<?php echo array_key_exists('q', $_GET) ? $_GET['q'] : '';?>';
            jQuery('#query').attr('placeholder','search...');
            if(val!=''){                     
                jQuery('#query').val(val);
            }

        });
    </script>

    <!-- Applied facets. -->
    <?php if(SolrSearch_Helpers_Facet::parseFacets()):?>
    <div id="solr-applied-facets">

      <ul>
        <!-- Get the applied facets. -->
        <?php foreach (SolrSearch_Helpers_Facet::parseFacets() as $f): ?>
          <li>
            <!-- Facet label. -->
            <?php $label = SolrSearch_Helpers_Facet::keyToLabel($f[0]); ?>
            <span class="applied-facet-label"><?php echo $label; ?></span> &raquo;
            <span class="applied-facet-value"><?php echo $f[1]; ?></span>

            <!-- Remove link. -->
            <?php $url = SolrSearch_Helpers_Facet::removeFacet($f[0], $f[1]); ?>
            (<a href="<?php echo $url; ?>">remove</a>)

          </li>
        <?php endforeach; ?>
      </ul>

    </div>
    <?php endif;?>

    

    <!-- Results. -->
    <div id="solr-results">
      <div id="solr-result-title">Browse results (<?php echo sizeof($results->response->docs);?>)</div>
      <?php foreach ($results->response->docs as $doc): ?>
        <?php if($doc->resulttype == 'Item'):?>
            <?php $item = get_record_by_id('item',preg_replace ( '/[^0-9]/', '', $doc->__get('id')));?>                                         
            <?php  set_current_record('item',$item); ?>         
            <!-- Document. -->
            <div class="result">            

                <!-- Record URL. -->
                <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>
                

                <!-- Title. -->
                <a href="<?php echo $url; ?>" class="result-title">
                    <?php if ($holding = metadata('item', array('Item Type Metadata', 'Holding institution'))): ?>    
                    <?php echo $holding." - "; ?>
                    <?php endif; ?>  
                    <?php
                        $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                        if (empty($title)) {
                            $title = '<i>' . __('Untitled') . '</i>';
                        }
                        echo $title;                        
                    ?>
                </a>          
            </div>
      <?php endif;?>      
      <?php endforeach; ?>

    </div>


    <?php echo pagination_links(); ?>
</div>    
<?php echo foot();
