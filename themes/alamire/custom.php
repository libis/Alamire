<?php

function libis_get_simple_page_content($title){
    $page = get_record('SimplePagesPage',array('title'=>$title));
    return $page->text;
}

?>
