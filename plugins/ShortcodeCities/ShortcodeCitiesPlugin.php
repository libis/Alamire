<?php

class ShortcodeCitiesPlugin extends Omeka_Plugin_AbstractPlugin
{

    public function setUp()
    {
        add_shortcode('cities', array('ShortcodeCitiesPlugin', 'cityList'));
        parent::setUp();
    }


    /**
     * Easy shortcut for carousel of featured items with [featured_carousel]
     * @param array $args
     * @param Zend_View $view
     * @return string HTML to display
     */
    public static function cityList($args, $view)
    {
        if(isset($args['category'])):
          $category = $args['category'];
        else:
          $category = null;
        endif;

        //get records of type
        $records = get_records('Item', array('type'=>'9'),999);
        $results = array();

        foreach($records as $record):
          $results_i = array();
          $texts =  all_element_texts($record, array('return_type'=>'array'));
          if(!isset($texts['Manuscript Item Type Metadata']['Holding institution']) ||
            !isset($texts['Manuscript Item Type Metadata']['Category']) ||
            !isset($texts['Manuscript Item Type Metadata']['Manuscript label'])):
            continue;
          endif;
          $inst = $texts['Manuscript Item Type Metadata']['Holding institution'][0];
          $inst = explode(' - ', $inst);
          $cities = $texts['Manuscript Item Type Metadata']['Holding institution'];
          $cats = $texts['Manuscript Item Type Metadata']['Category'];

          foreach ($cats as $cat) {
            if($cat == $category):
              $results[$cat][$inst[0]][$inst[1]][$texts['Manuscript Item Type Metadata']['Manuscript label'][0]] = '<a href="'.record_url($record).'">'.$texts['Manuscript Item Type Metadata']['Manuscript label'][0].'</a>';
            elseif($category == null):
              $results['All'][$inst[0]][$inst[1]][$texts['Manuscript Item Type Metadata']['Manuscript label'][0]] = '<a href="'.record_url($record).'">'.$texts['Manuscript Item Type Metadata']['Manuscript label'][0].'</a>';
            endif;
          }

        endforeach;

        $html = '<div class="category-tree"><ul>';
        foreach($results as $category=>$cities):
          //sort on city
          ksort($cities);
          //echo "<li>".$category."<ul>";

          foreach($cities as $city=>$insts):
            ksort($insts);
            $html .= "<li>".$city."<ul>";
            foreach($insts as $inst=>$values):
              ksort($values);
              $html .=  "<li>".$inst."<ul>";
              foreach($values as $value):
                $html .= "<li>".$value."</li>";
              endforeach;
              $html .= "</ul></li>";
            endforeach;
            $html .= "</ul></li>";
          endforeach;
          //echo "</ul></li>";

        endforeach;
        $html .= '</ul></div>';
        return $html;
    }

}
