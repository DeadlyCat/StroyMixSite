<?php 
require_once 'dbConnection.php';
function LoadComponent($pach){
	$pageLoad = file_get_contents($pach);
	return $pageLoad;
}
function SelectMeterialsFilter($connection,$filter){
	$Requist_str = "SELECT * FROM `materials` WHERE  ";
	$catalog_elems_array = array();
	for ($i=0; $i <count($filter["typeWork"]) ; $i++) { 
		$Requist_str .= "`type` = '" . $filter["typeWork"][$i] . "'";
		if($i != count($filter["typeWork"]) -1 ){
			$Requist_str .="OR";
		} else{
			if(count($filter["type"])>0 ){
				$Requist_str .="OR";
			}
		}
	}
	for ($i=0; $i <count($filter["type"]) ; $i++) { 
		$Requist_str .= "`title` = '" . $filter["type"][$i] . "'";
		if($i != count($filter["type"]) -1){
			$Requist_str .="OR";
		}
	}
	$catalog_elems = mysqli_query($connection,$Requist_str);
	while ($row = mysqli_fetch_assoc($catalog_elems)) {
		array_push($catalog_elems_array,$row);
	}
	return  $catalog_elems_array;
}
function SelectAllCatalog($connection){
	$echoArray = array();
	$catalog = mysqli_query($connection,"SELECT * FROM `materials`");
	while ($row = mysqli_fetch_assoc($catalog)) {
		array_push($echoArray,$row);
	}
	return $echoArray;
}
function SelectWorkers($connection){
	$Workers = mysqli_query($connection,"SELECT * FROM `workers`");
	$Workers_res = mysqli_fetch_assoc($Workers);
	return $Workers_res;
}
function SelectBasket($connection){
	
	$basket_json = json_decode(trim($_COOKIE["basket"]));
	$basket = json_decode(json_encode($basket_json),true);
	$basket_res_array =array();
	$basket_res_props =array();
	for ($i=0; $i <count($basket); $i++) { 
		$id = $basket[$i]["id"];
		$props =array(
			"count" => $basket[$i]["count"],
			"check" =>$basket[$i]["check"]
		);
		$basket_query = mysqli_query($connection,"SELECT * FROM `materials` WHERE `id`= '$id' ");
		$basket_res = mysqli_fetch_assoc($basket_query);
		array_push($basket_res_array, $basket_res);
		array_push($basket_res_props, $props);
	}
	$echoArray = array("props"=>$basket_res_props, "basketItem"=> $basket_res_array);
	return $echoArray;
}
function SelectAllWorks($connection){

	$works_contracts_array = array();
	$works_props_array = array();
	$SidingArray_works = array();
	$RoofArray_works = array();
	$WindowArray_works = array();
	$SidingArray_Text_works = array();
	$RoofArray_Text_works = array();
	$WindowArray_Text_works = array();
	$works_contracts = mysqli_query($connection,"SELECT * FROM `contracts`");
	$works_props  = mysqli_query($connection,"SELECT * FROM `works`");
	while ($row = mysqli_fetch_assoc($works_contracts)) {
		array_push($works_contracts_array,$row);
	}
	while ($row = mysqli_fetch_assoc($works_props)) {
		array_push($works_props_array,$row);
	}
	for ($i=0; $i < count($works_props_array); $i++) { 
		if($works_contracts_array[$i]["typeWork"] == "Фасадные работы"){
			array_push($SidingArray_works, $works_contracts_array[$i]);	
			array_push($SidingArray_Text_works, $works_props_array[$i]);	
		}
		if($works_contracts_array[$i]["typeWork"] == "Кровельные работы"){
			array_push($RoofArray_works, $works_contracts_array[$i]);	
			array_push($RoofArray_Text_works, $works_props_array[$i]);	
		}
		if($works_contracts_array[$i]["typeWork"] == "Оконные работы"){
			array_push($WindowArray_works, $works_contracts_array[$i]);	
			array_push($WindowArray_Text_works, $works_props_array[$i]);	
		}
	}
	$SidingArray_works = array("SidingProps" =>$SidingArray_works, "SidingText" => $SidingArray_Text_works);
	$RoofArray_works = array("RoofProps" =>$RoofArray_works, "RoofText" => $RoofArray_Text_works);
	$WindowArray_works = array("WindowProps" =>$WindowArray_works, "WindowText" => $WindowArray_Text_works);

	$echoArray = array("Siding" =>$SidingArray_works, "Roof" =>$RoofArray_works, "Window" =>$WindowArray_works);
	return $echoArray;
}
function SelectMaterial($connection,$type){
	$Materials_array = array();
	$Titles_array = array();
	$MatName_array = array();
	$Materials = mysqli_query($connection,"SELECT * FROM `materials` WHERE `type` = '$type'");
	$Titles = mysqli_query($connection,"SELECT `title` FROM `materials` WHERE `type` = '$type' GROUP BY `title`");
	$MatName = mysqli_query($connection,"SELECT `Matname` FROM `materials` WHERE `type` = '$type' GROUP BY `Matname`");
	while ($row = mysqli_fetch_assoc($Materials)) {
		array_push($Materials_array,$row);
	}
	while ($row = mysqli_fetch_row($Titles)) {
		array_push($Titles_array,$row);
	}
	while ($row = mysqli_fetch_row($MatName)) {
		array_push($MatName_array,$row);
	}
	$echoArray = array("materials" => $Materials_array, "titles" => $Titles_array,"matNames" => $MatName_array );
	return $echoArray;

}
function SelectAllReviews($connection){
	$reviews_texts_array = array();
	$reviews_props_array = array();
	$SidingArray = array();
	$RoofArray = array();
	$WindowArray = array();
	$SidingArray_Text = array();
	$RoofArray_Text = array();
	$WindowArray_Text = array();
	$reviews_texts = mysqli_query($connection,"SELECT * FROM `reviews`");
	$reviews_props = mysqli_query($connection,"SELECT * FROM `contracts`");
	while ($row = mysqli_fetch_assoc($reviews_texts)) {
		array_push($reviews_texts_array,$row);
	}
	while ($row = mysqli_fetch_assoc($reviews_props)) {
		array_push($reviews_props_array,$row);
	}
	for ($i=0; $i < count($reviews_texts_array); $i++) { 
		if($reviews_props_array[$i]["typeWork"] == "Фасадные работы"){
			array_push($SidingArray, $reviews_props_array[$i]);	
			array_push($SidingArray_Text, $reviews_texts_array[$i]);	
		}
		if($reviews_props_array[$i]["typeWork"] == "Кровельные работы"){
			array_push($RoofArray, $reviews_props_array[$i]);	
			array_push($RoofArray_Text, $reviews_texts_array[$i]);	
		}
		if($reviews_props_array[$i]["typeWork"] == "Оконные работы"){
			array_push($WindowArray, $reviews_props_array[$i]);	
			array_push($WindowArray_Text, $reviews_texts_array[$i]);	
		}
	}
	$SidingArray = array("SidingProps" =>$SidingArray, "SidingText" => $SidingArray_Text);
	$RoofArray = array("RoofProps" =>$RoofArray, "RoofText" => $RoofArray_Text);
	$WindowArray = array("WindowProps" =>$WindowArray, "WindowText" => $WindowArray_Text);
	$echoArray = array("Siding" =>$SidingArray, "Roof" =>$RoofArray, "Window" =>$WindowArray);
	return $echoArray;
}
function SelectCotegories($connection){
	$Cotegories = mysqli_query($connection,"SELECT `typeWork` FROM `searchengine`  GROUP BY `typeWork`");
	$Cotegories_array = array();
	while ($row = mysqli_fetch_assoc($Cotegories)) {
		array_push($Cotegories_array,$row);
	}
	return $Cotegories_array;
}
function SelectBrand($connection){
	$Brand = mysqli_query($connection,"SELECT `type` FROM `searchengine`  GROUP BY `type`");
	$Brand_array = array();
	while ($row = mysqli_fetch_assoc($Brand)) {
		array_push($Brand_array,$row);
	}
	return $Brand_array;
}
function CreateCatalogItemFilter($connection,$filter){
	$itemsArray = SelectMeterialsFilter($connection,$filter);
	foreach ($itemsArray as $item) {
		$item_load = LoadComponent('../catalog-item.php');
		$item_load = str_replace("imgPach",$item['img'],$item_load);
		$item_load = str_replace("titlePach",$item['title'] ." <br>(".$item['Matname'] .")",$item_load);
		$item_load = str_replace("infoPach",$item['info'],$item_load);
		$item_load = str_replace("countPach",$item['count'],$item_load);
		$item_load = str_replace("priceFullPach",$item['priceFull'],$item_load);
		$item_load = str_replace("priceSalePach",$item['priceSale'],$item_load);
		$item_load = str_replace("idElem",$item['id'],$item_load);
		echo $item_load;
	}
}
function CreateCatalogItem($connection){
	$itemsArray = SelectAllCatalog($connection);
	foreach ($itemsArray as $item) {
		$item_load = LoadComponent('./components/catalog-item.php');
		$item_load = str_replace("imgPach",$item['img'],$item_load);
		$item_load = str_replace("titlePach",$item['title'] ." <br>(".$item['Matname'] .")",$item_load);
		$item_load = str_replace("infoPach",$item['info'],$item_load);
		$item_load = str_replace("countPach",$item['count'],$item_load);
		$item_load = str_replace("priceFullPach",$item['priceFull'],$item_load);
		$item_load = str_replace("priceSalePach",$item['priceSale'],$item_load);
		$item_load = str_replace("idElem",$item['id'],$item_load);
		echo $item_load;
	}
}
function CreateWorkItem($connection,$type){
	$itemArray = SelectAllWorks($connection)[$type];
	$CountSteps = 2;
	$ItemEcho = "";
	
	for ($i=0; $i < count($itemArray["SidingProps"]); $i++) { 
		$Date = countDaysBetweenDates($itemArray["SidingProps"][$i]["dateStart"],$itemArray["SidingProps"][$i]["dateFinish"]);
		$item_load = LoadComponent('./components/work-item.php');
		$item_load = str_replace("WorkTitle", $itemArray["SidingProps"][$i]["city"] . "(" . $itemArray["SidingProps"][$i]["typeWork"] . ")", $item_load);
		$item_load = str_replace("WorkSquare", $itemArray["SidingProps"][$i]["square"], $item_load);
		$item_load = str_replace("WorkMaterial", $itemArray["SidingText"][$i]["material"], $item_load);
		$item_load = str_replace("WorkDays",  $Date, $item_load);
		$item_load = str_replace("WorkPrice", $itemArray["SidingProps"][$i]["price"], $item_load);
		$ItemEcho .= $item_load;
		if($CountSteps <=count($itemArray["SidingProps"])  ){
			if($i == $CountSteps - 1){
				$item_container_load = LoadComponent('./components/work-item-container.php');
				$CountSteps += 2;
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho = "";
				echo $item_container_load;
			} 
		}else{
			$item_container_load = LoadComponent('./components/work-item-container.php');
			$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
			$ItemEcho ="";
			echo $item_container_load;
		}

	}
}
function CreateReviewsItemSiding($connection){
	$itemArray = SelectAllReviews($connection)["Siding"];
	$CountStepOnPageConst = 6;
	$CountSteps = $CountStepOnPageConst;
	$ItemEcho = "";
	for ($i=0; $i < count($itemArray["SidingProps"]); $i++) { 
		$item_load = LoadComponent('./components/review-item.php');
		$item_load = str_replace("NameAuthor", $itemArray["SidingProps"][$i]["surname"] . " " . $itemArray["SidingProps"][$i]["name"], $item_load);
		$item_load = str_replace("typeWork", $itemArray["SidingProps"][$i]["typeWork"], $item_load);
		$item_load = str_replace("city", $itemArray["SidingProps"][$i]["city"], $item_load);
		$item_load = str_replace("reviewText", $itemArray["SidingText"][$i]["text"], $item_load);
		$item_load = str_replace("dateReview", $itemArray["SidingText"][$i]["dateReview"], $item_load);
		$ItemEcho .= $item_load;
		if($CountSteps <=count($itemArray["SidingProps"])  ){
			if($i == $CountSteps - 1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$CountSteps += $CountStepOnPageConst;
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho = "";
				echo $item_container_load;
			} 
		}else{
			if($i== count($itemArray["SidingProps"]) -1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho ="";
				echo $item_container_load;
			}
			
		}
	}
	if(count($itemArray["SidingProps"]) == 0){
		echo '<p class ="reviews-empty">Отзывов об этом виде работ пока нет</p>';
	}
}
function CreateReviewsItemRoof($connection){
	$itemArray = SelectAllReviews($connection)["Roof"];
	$CountStepOnPageConst = 3;
	$CountSteps = $CountStepOnPageConst;
	$ItemEcho = "";
	for ($i=0; $i < count($itemArray["RoofProps"]); $i++) { 
		$item_load = LoadComponent('./components/review-item.php');
		$item_load = str_replace("NameAuthor", $itemArray["RoofProps"][$i]["surname"] . " " . $itemArray["RoofProps"][$i]["name"], $item_load);
		$item_load = str_replace("typeWork", $itemArray["RoofProps"][$i]["typeWork"], $item_load);
		$item_load = str_replace("city", $itemArray["RoofProps"][$i]["city"], $item_load);
		$item_load = str_replace("reviewText", $itemArray["RoofText"][$i]["text"], $item_load);
		$item_load = str_replace("dateReview", $itemArray["RoofText"][$i]["dateReview"], $item_load);
		$ItemEcho .= $item_load;
		if($CountSteps <=count($itemArray["RoofProps"])  ){
			if($i == $CountSteps - 1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$CountSteps += $CountStepOnPageConst;
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho = "";
				echo $item_container_load;
			} 
		}else{
			if($i== count($itemArray["RoofProps"]) -1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho ="";
				echo $item_container_load;
			}
			
		}
	}
	if(count($itemArray["RoofProps"]) == 0){
		echo '<p class ="reviews-empty">Отзывов об этом виде работ пока нет</p>';
	}
}
function CreateReviewsItemWindow($connection){
	$itemArray = SelectAllReviews($connection)["Window"];
	$CountStepOnPageConst = 3;
	$CountSteps = $CountStepOnPageConst;

	$ItemEcho = "";
	for ($i=0; $i < count($itemArray["WindowProps"]); $i++) { 
		$item_load = LoadComponent('./components/review-item.php');
		$item_load = str_replace("NameAuthor", $itemArray["WindowProps"][$i]["surname"] . " " . $itemArray["WindowProps"][$i]["name"], $item_load);
		$item_load = str_replace("typeWork", $itemArray["WindowProps"][$i]["typeWork"], $item_load);
		$item_load = str_replace("city", $itemArray["WindowProps"][$i]["city"], $item_load);
		$item_load = str_replace("reviewText", $itemArray["WindowText"][$i]["text"], $item_load);
		$item_load = str_replace("dateReview", $itemArray["WindowText"][$i]["dateReview"], $item_load);
		$ItemEcho .= $item_load;
		if($CountSteps <=count($itemArray["WindowProps"])  ){
			if($i == $CountSteps - 1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$CountSteps += $CountStepOnPageConst;
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho = "";
				echo $item_container_load;
			} 
		}else{
			if($i== count($itemArray["WindowProps"]) -1){
				$item_container_load = LoadComponent('./components/review-item-container.php');
				$item_container_load = str_replace("Target", $ItemEcho, $item_container_load);
				$ItemEcho ="";
				echo $item_container_load;
			}
			
		}
	}
	if(count($itemArray["WindowProps"]) == 0){
		echo '<p class ="reviews-empty">Отзывов об этом виде работ пока нет</p>';
	}
}
function CreateWorkerItem($connection){
	$ItemArray = SelectWorkers($connection);
	for ($i=0; $i < count($ItemArray["id"]); $i++) {
		$item_load = LoadComponent('./components/worker-item.php');
		$item_load = str_replace("WorkerName", $ItemArray["surname"] . " " .$ItemArray["name"] . " " .$ItemArray["patronymic"] , $item_load);		
		$item_load = str_replace("Post", $ItemArray["post"], $item_load);		
		$item_load = str_replace("WorkerText", $ItemArray["text"], $item_load);		
		$item_load = str_replace("WorkerPhoto", $ItemArray["img"], $item_load);		
		echo $item_load;
	}
}
function CreateBasketItem($connection){
	$basket_array = SelectBasket($connection);
	for ($i=0; $i < count($basket_array["basketItem"]); $i++) { 
		$item_load = LoadComponent('./components/basket-item.php');
		if($basket_array["props"][$i]["check"] == 1){
			$item_load = str_replace("CheckItem", "checked" , $item_load);	
		}
		else{
			$item_load = str_replace("CheckItem", "" , $item_load);	
		}
		$item_load = str_replace("ImgElem",$basket_array["basketItem"][$i]["img"]  , $item_load);		
		$item_load = str_replace("TitleElem",$basket_array["basketItem"][$i]["title"]  , $item_load);		
		$item_load = str_replace("MatElem",$basket_array["basketItem"][$i]["Matname"]  , $item_load);		
		$item_load = str_replace("TextElem",$basket_array["basketItem"][$i]["info"]  , $item_load);		
		$item_load = str_replace("priceElem",$basket_array["basketItem"][$i]["priceSale"]  , $item_load);		
		$item_load = str_replace("CountELem",$basket_array["props"][$i]["count"]  , $item_load);		
		$item_load = str_replace("IdELem",$basket_array["basketItem"][$i]["id"]  , $item_load);		
		echo $item_load;
	}
}
function CreateSearchCategoriesInputItem($connection){
	$cotegories_array = SelectCotegories($connection);


	for ($i=0; $i < count($cotegories_array); $i++) { 
		$item_load = LoadComponent('./components/form-search-item.php');
		$item_load = str_replace("TypeName", $cotegories_array[$i]["typeWork"], $item_load);
		echo $item_load;	
	}
}
function CreateSearchBrandInputItem($connection){
	$brand_array = SelectBrand($connection);
	for ($i=0; $i < count($brand_array); $i++) { 
		$item_load = LoadComponent('./components/form-search-item.php');
		$item_load = str_replace("TypeName", $brand_array[$i]["type"], $item_load);
		echo $item_load;	
	}
}
function CreateExpampleMaterialItem($connection,$type){
	$CountMaterial = "";
	$materials_array = SelectMaterial($connection,$type);
	for ($i=0; $i < count($materials_array["matNames"]); $i++) { 
		$count = 0;
		$item_load = LoadComponent('./components/example-material-item.php');
		for ($j=0; $j < count($materials_array["materials"]); $j++) { 
			if($materials_array["materials"][$j]['Matname'] == $materials_array["matNames"][$i][0]){
				$count++;
				if($count == 1){
					$item_load = str_replace("TitleMaterial", $materials_array["materials"][$j]['title'] . " (".$materials_array["materials"][$j]['Matname'] .")", $item_load);	
					$item_load = str_replace("MaterialText", $materials_array["materials"][$j]['info'], $item_load);		
					$item_load = str_replace("PriceAfter", $materials_array["materials"][$j]['priceSale'], $item_load);		
					$item_load = str_replace("PriceBefore", $materials_array["materials"][$j]['priceFull'], $item_load);		
					$item_load = str_replace("MaterialModel", $materials_array["materials"][$j]['imgExpamle'], $item_load);		
				}
				if($count > 0){
					$Count_load = LoadComponent('./components/example-material-item-count-container.php');
					$Count_load = str_replace("PropMaterialImg", $materials_array["materials"][$j]['img'], $Count_load);	
					$Count_load = str_replace("MaterialModel", $materials_array["materials"][$j]['imgExpamle'], $Count_load);	
					$CountMaterial .= $Count_load;
				}
			}
		}
		if($count > 0){
			$item_load = str_replace("CountMat", $CountMaterial, $item_load);	
			echo $item_load;
			$CountMaterial="";
		}
		
	}
}
function BasketItemsCount(){
	if(!empty($_COOKIE["basket"])){
		$basket_json = json_decode(trim($_COOKIE["basket"]));
		$basket = json_decode(json_encode($basket_json),true);
		$calc = 0;
		for ($i=0; $i <count($basket); $i++) { 
			$calc += $basket[$i]["count"];
		}
	}else{
		$calc =0;
	}
	echo $calc;
}
function countDaysBetweenDates($d1, $d2)
{
	$d1_ts = strtotime($d1);
	$d2_ts = strtotime($d2);
	$seconds = abs($d1_ts - $d2_ts);
	return floor($seconds / 86400);
}

?>
