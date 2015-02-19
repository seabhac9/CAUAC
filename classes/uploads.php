<?php

$uploaddir = '../uploads/';
//$uploadfile = $uploaddir . basename($_FILES['fileElem']['name']);

$temp = explode(".",$_FILES["fileElem"]["name"]);
$newfilename = rand(1,99999) . '.' . end($temp);

if (move_uploaded_file($_FILES['fileElem']['tmp_name'], $uploaddir . $newfilename)) {
	$retval= $newfilename;
} else {
    $retval = '';
}

$result[] = array(
	"resp" => $retval
	);

echo json_encode($result);

?>
