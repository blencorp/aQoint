<?php
function createFDF($file,$info){
    $data="%FDF-1.2\n%âãÏÓ\n1 0 obj\n<< \n/FDF << /Fields [ ";
    foreach($info as $field => $val){
    	if(is_array($val)){
        	$data.='<</T('.$field.')/V[';
        	foreach($val as $opt)
        		$data.='('.trim($opt).')';
        	$data.=']>>';
    	}else{
        	$data.='<</T('.$field.')/V('.trim($val).')>>';
    	}
    }
    $data.="] \n/F (".$file.") /ID [ <".md5(time()).">\n] >>".
        " \n>> \nendobj\ntrailer\n".
        "<<\n/Root 1 0 R \n\n>>\n%%EOF\n";
    return $data;
}
?>
