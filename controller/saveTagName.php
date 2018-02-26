<?php
	$jsonTagName = json_encode($_POST['TAG']);

    //write tag name
    $tagNameFile = fopen("../model/tagName.txt","w");
	echo fwrite($tagNameFile,$jsonTagName);
	fclose($tagNameFile);

	header("Location:../view/home.php");

 ?>