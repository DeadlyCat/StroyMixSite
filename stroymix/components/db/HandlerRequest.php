<?php 
$UserName = strip_tags(trim($_POST['UserName']));
$UserName = htmlspecialchars($UserName);
$UserName = mysql_escape_string($UserName);

$UserTel = strip_tags(trim($_POST['UserTel']));
$UserTel = htmlspecialchars($UserTel);
$UserTel = mysql_escape_string($UserTel);


$TypeWork = strip_tags(trim($_POST['TypeWork']));
$TypeWork = htmlspecialchars($TypeWork);
$TypeWork = mysql_escape_string($TypeWork);

$Squre = strip_tags(trim($_POST['Squre']));
$Squre = htmlspecialchars($Squre);
$Squre = mysql_escape_string($Squre);
if($Squre == null || $Squre == '' ){
	$Squre = "не указана";
}

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html;' . "\r\n";
mail("info@sc-tandem.ru", $TypeWork, "Заявка на $TypeWork  от $UserTel($UserName) Площадь: $Squre м2 (" . date("d/m/Y/H:i") . ")",$headers);
echo "Отправили";
?>