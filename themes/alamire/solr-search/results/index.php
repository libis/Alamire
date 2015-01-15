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


<h2><?php echo __('Search the Collection'); ?> (<?php echo $results->response->numFound; ?> results)</h2>

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


<!-- Results. -->
<div id="solr-results">

  <?php foreach ($results->response->docs as $doc): ?>
    <?php $item = get_record_by_id('item',preg_replace ( '/[^0-9]/', '', $doc->__get('id')));?>                                         
    <?php  set_current_record('item',$item); ?>         
    <!-- Document. -->
    <div class="result item hentry">
      <?php if (metadata('item', 'has thumbnail')): ?>
    <div class="item-img">
        <?php echo link_to_item(item_image('thumbnail')); ?>
    </div>
    <?php endif; ?>  
    <?php if(digitool_item_has_digitool_url($item)): ?>
        <div class="item-img">
            <?php echo link_to_item(digitool_get_thumb_for_browse($item));?>            
        </div>
    <?php endif; ?>
      <!-- Header. -->
      <div class="result-header">

        <!-- Record URL. -->
        <?php $url = SolrSearch_Helpers_View::getDocumentUrl($doc); ?>

        <!-- Title. -->
        <h2><a href="<?php echo $url; ?>" class="result-title">
            <?php
                $title = is_array($doc->title) ? $doc->title[0] : $doc->title;
                if (empty($title)) {
                    $title = '<i>' . __('Untitled') . '</i>';
                }
                echo $title;
            ?>
        </a></h2>
   
        <!--<span class="result-type">(<?php echo $doc->resulttype; ?>)</span>-->
        
        

      </div>

      <!-- Highlighting. -->
      <?php if (get_option('solr_search_hl')): ?>
        <ul class="hl">
          <?php foreach($results->highlighting->{$doc->id} as $field): ?>
            <?php foreach($field as $hl): ?>
              <li class="snippet"><?php echo strip_tags($hl, '<em>'); ?></li>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      
    <div class="item-meta">
    

    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
    <div class="item-description">
        <?php echo $description; ?>
    </div>
    <?php endif; ?>

    <?php if (metadata('item', 'has tags')): ?>
    <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
        <?php echo tag_string('items'); ?></p>
    </div>
    <?php endif; ?>

    </div>
    </div>
  <?php endforeach; ?>

</div>


<?php echo pagination_links(); ?>
<?php echo foot();
