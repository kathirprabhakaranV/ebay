<?php 
    include_once 'header.php'; 
?>
<div class="col-md-12">
    <h4 class="header-line">Welcome to Ebay Template Editor</h4>
</div>
<form action="../controller/saveTagContent.php" method="POST" enctype="multipart/form-data">
	<div class="row">
		<?php 
			$tagLength = (int)file_get_contents("../model/tagLength.txt");
			$tagNameJson = file_get_contents("../model/tagName.txt");
			$tagContentJson = file_get_contents("../model/tagContent.txt");
			$tagContent = json_decode($tagContentJson, true);
			$tagName = json_decode($tagNameJson, true);
			$inc = 0;
			for ($i=0; $i < $tagLength; $i++) { 
				$inc = $i + 1;
				echo "<div class='col-md-4 col-sm-4'>";
				echo "<div class='form-group'>";
				echo "<label>".$tagName[$inc]."</label>";
				echo "<input class='form-control' type='text' name='TAG[".$inc."]' value='".$tagContent[$inc]."' required>";
				echo "</div></div>";
			}
		?>
	</div>
		<div class="row">
		<div class="right-div">
	        <button type="submit" class="btn btn-info btn-lg">Genetrate</button>
	    </div>
	</div>
</form>
<div class="row">
	<div class="col-md-12">
		<textarea rows="25" class="jumbotron col-md-12 form-control">
			<?php 
				$file = "../upload/HTML_Page.html";
				echo file_get_contents($file); 
			?>
		</textarea>
	</div>
</div>
<?php
 	include_once 'footer.php'; 
 ?>