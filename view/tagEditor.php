<?php 
    include_once 'header.php'; 
?>
<div class="col-md-12">
    <h4 class="header-line">Tag Editor</h4>
</div>
<form action="../controller/saveTagName.php" method="POST" enctype="multipart/form-data">
	<div class="row">
		<?php 
			$tagLength = (int)file_get_contents("../model/tagLength.txt");
			$tagNameJson = file_get_contents("../model/tagName.txt");
			$tagName = json_decode($tagNameJson, true);
			$inc = 0;
			for ($i=0; $i < $tagLength; $i++) { 
				$inc = $i + 1;
				echo "<div class='col-md-4 col-sm-4'>";
				echo "<div class='form-group'>";
				echo "<label>"."Tag"."&nbsp;".$inc."</label>";
				echo "<input class='form-control' type='text' name='TAG[".$inc."]' value='".$tagName[$inc]."' required>";
				echo "</div></div>";
			}
		 ?>
	</div>
	<div class="row">
		<div class="right-div">
	        <button type="submit" class="btn btn-info btn-lg">Save</button>
	    </div>
	</div>
</form>
<?php
 	include_once 'footer.php'; 
 ?>