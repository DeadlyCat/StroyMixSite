<?php 
require_once 'Server.php' ;
$array_keys_type = array_keys($_GET,"typeWork",true);
$array_keys_brand = array_keys($_GET,"type",true);
for ($i=0; $i < count($array_keys_type); $i++) { 
	$array_keys_type[$i] = str_replace("_"," ",$array_keys_type[$i]);
}
for ($i=0; $i < count($array_keys_brand); $i++) { 
	$array_keys_brand[$i] = str_replace("_"," ",$array_keys_brand[$i]);
}
$array_filter = array("typeWork"=>$array_keys_type,"type"=>$array_keys_brand);

CreateCatalogItemFilter($connection,$array_filter);

?>