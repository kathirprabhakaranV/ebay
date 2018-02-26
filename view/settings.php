<?php 
    include_once 'header.php'; 
?>
<div class="col-md-12">
    <h4 class="header-line">Settings</h4>
</div>
<form action="" method="POST" enctype="multipart/form-data">
<div class="row alert alert-info">
    <div class="col-md-6 col-sm-6">
    	<div class="form-group">
            <label>Upload File</label>
            <?php
            	$fileName = $files1 = scandir("../upload");
            	$fileurl = "../upload/" . $fileName[2];
            	echo "<input class='form-control' type='file' name='editorHtml' placeholder='--Choose file--' value='".$fileurl."'>";
            ?>
        </div>
    </div>
    <div class="col-md-6 col-sm-6">
    	<div class="form-group">
            <label>No. of Tags</label>
            <?php
				echo "<input class='form-control' type='text' min='1' name='tagLength' placeholder='--Enter Tag Length--' value='".(int)file_get_contents("../model/tagLength.txt")."' required>";
			 ?>
        </div>
    </div>
</div>
<div class="row">
	<div class="right-div">
        <button type="submit" class="btn btn-info btn-lg">Save</button>
    </div>
</div>
</form>
<?php
	if(isset($_FILES['editorHtml'])){
		$errors= array();
		$file_name = $_FILES['editorHtml']['name'];
		$file_size =$_FILES['editorHtml']['size'];
		$file_tmp =$_FILES['editorHtml']['tmp_name'];
		$file_type=$_FILES['editorHtml']['type'];

		$file_ext = strtolower(pathinfo($_FILES['editorHtml']['name'],PATHINFO_EXTENSION));

		$expensions= array("html","txt");

		if(in_array($file_ext,$expensions)=== false){
			$errors[]="extension not allowed, please choose a HTML file only.";
		}

		if($file_size > 2097152){
			$errors[]='File size must be excately 2 MB';
		}

		if(empty($errors)==true){
			move_uploaded_file($file_tmp,"../upload/"."HTML_Page".".$file_ext");
		}else{
			print_r($errors);
		}

		//write tag length in file
		$tagFile = fopen("../model/tagLength.txt", "w") or die("Unable to open file!");
		fwrite($tagFile, $_POST["tagLength"]);
		fclose($tagFile);
	}
?>
<?php
 	include_once 'footer.php'; 
 ?>