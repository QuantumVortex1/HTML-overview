<?php
function get_elements($filter_str){
    $xml = simplexml_load_file(__DIR__ ."/../elements.xml");
    $exact_elements = $xml->xpath("/root/element/title"); //[contains(text(), '$filter_str')]");
    $desc_elements = $xml->xpath("/root/element/desc[contains(normalize-space(), '$filter_str')]");
    return [$exact_elements, $desc_elements, $filter_str];
}
function get_all_elements(){
    return simplexml_load_file(__DIR__ ."/../elements.xml");
}