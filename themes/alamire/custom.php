<?php

function libis_get_simple_page_content($title){
    $page = get_record('SimplePagesPage',array('title'=>$title));
    return $page->text;
}


function libis_get_image($item){
    
    if (metadata('item', 'has files')):
        $link = metadata($item, array('Item Type Metadata','Viewer link'));    
        echo '<div id="side-gallery">'.files_for_item(array("imageSize"=>"thumbnail","linkToFile" => true,"linkAttributes"=>array('href'=>$link))).'</div>';
    endif;
    if (rosetta_item_has_rosetta_object($item)):            
        echo libis_side_gallery($item,100);            
    endif;
   
}

/*
 * Creates a simple gallery view for the items/show page
 * */
function libis_side_gallery($item,$size=500){

	$i=0;
	
        $pids = rosetta_get_rosetta_objects($item); 
        
	if(sizeof($pids)>0){
		$html ="<div id='side-gallery'>";
		foreach($pids as $pid){
			$thumb =  $pid->get_thumb();
                        $link = metadata($item, array('Item Type Metadata','Viewer link'));
                       
                        $html.= "<a href='".$link."'><img src='".$thumb."' class='thumb' border='0'/></a>";
                        
			$i++;
		}
               
		$html .= "</div>";
	}
	
	return $html;
}

function libis_get_featured($count = 1)
{
    $items = get_records('Item',array('featured'=>true),$count);
    if ($items) {
        $html = '';
        foreach ($items as $item) {
            $html .= get_view()->partial('items/single.php', array('item' => $item));
            $images = rosetta_get_images($item, 'thumbnail');
            if($image = item_image('fullsize', array(),0,$item)):
                $html.=  ".$image.";
            elseif(sizeof($images)>0):
                $html.= "<img src='".$images[0]."' class='thumb' border='0'/>";
            endif;
            release_object($item);
        }
    } else {
        $html = '<p>' . __('No featured items available.') . '</p>';
    }
    return $html;
}

?>
