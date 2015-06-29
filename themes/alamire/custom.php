<?php

function libis_get_simple_page_content($title){
    $page = get_record('SimplePagesPage',array('title'=>$title));
    return $page->text;
}


function libis_get_image($item){
    
    if (metadata('item', 'has files')):
        echo '<div class="element-text">'.files_for_item(array("imageSize"=>"fullsize")).'</div>';
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
                        $link =  $pid->get_representation();
                       
                        $html.= "<a href='".$link."' rel='".$thumb."'><img src='".$thumb."' class='thumb' border='0'/></a>";
                        
			$i++;
		}
               
		$html .= "</div>";
	}
	
	return $html;
}

/*
 * Creates a simple gallery view for the items/show page
 * */
function libis_get_image_link($item){
	$i=0;
	
        $pids = rosetta_get_rosetta_objects($item); 
                
	if(sizeof($pids)>0){
            $i=1;
            foreach($pids as $pid){
                $link =  $pid->get_representation();
                if(sizeof($pids) == 1):
                    return "<a href='".$link."'>image</a>";                        
                endif;

                if($i==1):
                    $html= "<a href='".$link."'>images 1</a>";                        
                else:
                    $html.= " | <a href='".$link."'>".$i."</a>";                        
                endif;

                $i++;
            }           
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
            if(sizeof($images)>0){
                $html.= "<a href='".  record_url($item)."' rel='".$images[0]."'><img src='".$images[0]."' class='thumb' border='0'/></a>";
            }
            release_object($item);
        }
    } else {
        $html = '<p>' . __('No featured items available.') . '</p>';
    }
    return $html;
}

?>
