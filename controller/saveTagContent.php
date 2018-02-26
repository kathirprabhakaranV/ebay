<?php 
	$jsonTagContent = json_encode($_POST['TAG']);

    //write tag Content
    $tagContentFile = fopen("../model/tagContent.txt","w");
	fwrite($tagContentFile,$jsonTagContent);
	fclose($tagContentFile);

	$data = file_get_contents("../model/tagContent.txt");
	$data1 = file_get_contents("../model/tagName.txt");
	$tagContent = json_decode($data, true);
	$tagName = json_decode($data1, true);
	$inc = 0;
	for ($i=0; $i < sizeof($tagContent); $i++) { 
		$inc = $inc + 1;
		$oldMessage = $tagName[$inc];
		$deletedFormat = $tagContent[$inc];
		$fileName = $files1 = scandir("../upload");
		$str=file_get_contents('../upload/'.$fileName[2]);
		$str=str_replace("$oldMessage", "$deletedFormat",$str);
		file_put_contents('../upload/'.$fileName[2], $str);
	}
	header("Location:../index.php");
 ?>