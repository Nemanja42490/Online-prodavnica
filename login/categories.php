<?php
// -----------------------------------------------	//
require_once "../config.php";
require_once "header.php";
// -----------------------------------------------	//
if(!Session::get("user_status")||Session::get("user_status")!=3){
	echo "<h1>Invalid access!</h1>";
	header( "refresh:1;url=index.html" );
}else{
// -----------------------------------------------	//
$selectedCategory = new Category;
	if(isset($_GET['cid'])){
		$selectedCategory = Category::get($_GET['cid']);
	}
// -----------------------------------------------	//
	if(isset($_POST['btn_insert'])){
		$selectedCategory = new Category;
	
		$selectedCategory->cat_name = $_POST['tb_name'];
		$selectedCategory->cat_description = $_POST['tb_description'];
		
		$selectedCategory->insert();
	}
// -----------------------------------------------	//	
if(isset($_POST['btn_update'])){
		
	$selectedCategory = Category::get($_POST['selCategory']);
	$selectedCategory->cat_name = $_POST['tb_name'];
	$selectedCategory->cat_description = $_POST['tb_description'];
	
	$selectedCategory->Update($_POST['selCategory']);
		
}
// -----------------------------------------------	//		
	if(isset($_POST['btn_delete'])){
		
		$selectedCategory = Category::get($_POST['selCategory']);
		$selectedCategory->delete($_POST['selCategory']);
		
	}
// -----------------------------------------------	//	
?>	
<div class="cat_container">
	<form method="post" action="">
<?php
// -----------------------------------------------	//	
		$allCategories =  Category::getAll();
// -----------------------------------------------	//	
?>
		<select onchange="window.location='?cid='+this.value" name="selCategory" class="select_cat">
		<option value="0">Nova kategorija</option>
			<?php
			foreach($allCategories as $rw){
			
				echo "<option " . ($selectedCategory->cat_id==$rw->cat_id?"selected":"") . " value='{$rw->cat_id}'>{$rw->cat_name}</option>";
			}
			?>
		</select><br>
		
			<span class="span_txt">Ime: </span><input required class="input_txt" type="text" name="tb_name" value="<?php echo $selectedCategory->cat_name; ?>">
			<br>
			
			<span class="span_txt">Opis: </span><input class="input_txt" type="text" name="tb_description" value="<?php echo $selectedCategory->cat_description; ?>">
			<br><br>
			
			<input type="submit" name="btn_insert" value="Dodaj" class="btn_submit">
			<input type="submit" name="btn_update" value="Promeni" class="btn_submit">
			<input type="submit" name="btn_delete" value="Izbriši" class="btn_submit">

	</form>

<?php
}

?>



<!-- ******************************** -->
<br><br>
<a href="index.php" class="btn_back">Vrati se</a> 
<!-- ******************************** -->
</div>
<?php 
require_once "footer.php";
?>