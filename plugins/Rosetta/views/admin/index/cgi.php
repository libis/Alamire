<?php
    $base_url = get_option('rosetta_resolver');
    $http_client = new Zend_Http_Client();
            
    if(get_option('rosetta_proxy')):               
        $config = array(
                        'adapter'    => 'Zend_Http_Client_Adapter_Proxy',
                        'proxy_host' => get_option('rosetta_proxy'),
                        'proxy_port' => 8080
        );
        $http_client->setConfig($config);
    endif;    

    $http_client->setUri(
        $base_url."/search?query=IE.dc.title=".urlencode($_GET['search'])
    );

    $http_response = $http_client->request();
    $data = $http_response->getBody();

    if($data):
        $images = json_decode($data);    
           
        //create form
        $size = sizeof($images);

        $i=0;$j=0;$html = "<div class='result' >";
        foreach ($images->set as $image) {
            
                $i++;
                $j++;
                $html .="<p><img src='".$base_url.$image->pid."'/><Input type = 'Radio' Name ='pid' value= '".$image->pid."'>
                </p> "; 
               
                //check if there are children (complex object)
                //if($arr["children"]){
                        //$text .="<td class='result-child'><button style='float:none;' class='digi-child' value= '".$arr["children"]."'>Get Children</button></td>";
                //}

        }
        $html .= "</div>";

        echo $html;
    endif;
?>
