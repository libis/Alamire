<?php

function libis_get_simple_page_content($title){
    $page = get_record('SimplePagesPage',array('title'=>$title));
    return $page->text;
}


function libis_get_image($item){
    if(metadata('item', 'has files') || digitool_item_has_digitool_url($item)):
        if (metadata('item', 'has files')):
            echo '<div class="element-text">'.files_for_item(array("imageSize"=>"fullsize")).'</div>';
        endif;
        if (digitool_item_has_digitool_url($item)):            
            echo libis_side_gallery($item,100);            
        endif;
    endif;
}

/*
 * Creates a simple gallery view for the items/show page
 * */
function libis_side_gallery($item,$size=500){

	$i=0;
	
        $digis = digitool_get_digitool_urls($item);    
        
	if(sizeof($digis)>0){
		$html ="<div id='side-gallery'>";
		foreach($digis as $digi){
			$thumb =  $digi->get_thumb();
                        $link =  $digi->get_view();
                       
                        $html.= "<a href='".$link."' rel='".$thumb."'><img src='".$thumb."' class='thumb' border='0'/></a>";
                        
			$i++;
		}
               
		$html .= "</div>";
	}
	
	return $html;
}

function libis_get_news($count = 3)
{
    $items = get_records('Item',array('type'=>'Manuscript','featured'=>true));
    if ($items) {
        $html = '';
        foreach ($items as $item) {
            $html .= get_view()->partial('items/single.php', array('item' => $item));
            release_object($item);
        }
    } else {
        $html = '<p>' . __('No featured items available.') . '</p>';
    }
    return $html;
}

?>
