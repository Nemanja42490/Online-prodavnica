<?php
// ------------------------------------------------------- //
require_once "../config.php";
require_once "header.php";
// ------------------------------------------------------- //
if(!Session::get("user_status")||Session::get("user_status")!=3){
	echo "<h1>Invalid access!</h1>";
	header( "refresh:1;url=index.html" );
}else{
// ------------------------------------------------------- //
$selectedProduct = new Product;
	if(isset($_GET['pid'])){
		$selectedProduct = Product::get($_GET['pid']);
	}
	if(isset($_POST['btn_insert'])){
		
		$selectedProduct = new Product;
		
			$selectedProduct->product_name = $_POST['tb_title'];
			$selectedProduct->product_price = $_POST['tb_price'];

		if(isset($_FILES['fup_image'])){
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selectedProduct->product_image = $_FILES['fup_image']['name'];	
		}else{
			echo $selectedProduct->product_image;
		}
			$selectedProduct->product_available = $_POST['tb_available'];
			$selectedProduct->product_description = $_POST['tb_desc'];
			$selectedProduct->product_category= $_POST['sel_category'];

			$selectedProduct->insert();	

			header( "Location:index.php" );
	}	
// ------------------------------------------------------- //
if(isset($_POST['btn_update'])){
		
			$selectedProduct = Product::get($_POST['selProduct']);
		
			$selectedProduct->product_name = $_POST['tb_title'];
			$selectedProduct->product_price = $_POST['tb_price'];
			

		if(isset($_FILES['fup_image']) && $_FILES['fup_image']['size']>0){	
			move_uploaded_file($_FILES['fup_image']['tmp_name'],"../images/".$_FILES['fup_image']['name']);
			$selectedProduct->product_image = $_FILES['fup_image']['name'];
		}else{}

			$selectedProduct->product_category= $_POST['sel_category'];

			$selectedProduct->product_available = $_POST['tb_available'];
			$selectedProduct->product_description = $_POST['tb_desc'];
		
			$selectedProduct->Update($_POST['selProduct']);
			
	}	
// ------------------------------------------------------- //		
if(isset($_POST['btn_delete'])){
	$selectedCategory = Product::get($_POST['selProduct']);
	$selectedCategory->delete($_POST['selProduct']);

	header( "Location:index.php" );
}
// ------------------------------------------------------- //	
?>
<div class="product_container">
<!-- --------------------------------------------------- --->		
<form action="" method="post" enctype="multipart/form-data">
<!-- --------------------------------------------------- --->	
<?php
// ------------------------------------------------------- //
	$allProducts= Product::getAll();
// ------------------------------------------------------- //
?>	<span class="span_txt">Proizvod:</span>
	<select onchange="if(this.value < 0) return; window.location='?pid='+this.value" name="selProduct" class="select_cat">
	<option value="0">Nov proizvod</option>
		<?php
		foreach($allProducts as $rw){
		
			echo "<option " . ($selectedProduct->product_id==$rw->product_id?"selected":"") . " value='{$rw->product_id}'>{$rw->product_name}</option>";
		}
		?>
	</select>
	
	<br><br>
<!-- --------------------------------------------------- --->	
<span class="span_txt">Naziv:</span> <input class="input_txt" type="text" name="tb_title" value="<?php echo $selectedProduct->product_name; ?>"><br><br>
<!-- --------------------------------------------------- --->	
<span class="span_txt">Cena:</span> <input class="input_txt" type="text" name="tb_price" value="<?php echo $selectedProduct->product_price; ?>"><br><br>
<!-- --------------------------------------------------- --->	
<span class="span_txt">Količina:</span> <input class="input_txt" type="text" name="tb_available" value="<?php echo $selectedProduct->product_available; ?>"><br><br>
<!-- --------------------------------------------------- --->
<span class="span_txt">Opis:</span> <input class="input_txt" type="text" name="tb_desc" value="<?php echo $selectedProduct->product_description; ?>"><br><br>
<!-- --------------------------------------------------- --->	
<span class="span_txt">Kategorija:</span>	
	<?php
	$allCategories = Category::getAll();
	?>
	<select name="sel_category" class="select_cat">
		<option value="0">Odaberi Kategoriju</option>
		<?php

		foreach($allCategories as $rw){
		
			echo "<option " . ($selectedProduct->product_category == $rw->cat_id?"selected":"") . " value='{$rw->cat_id}'>{$rw->cat_name}</option>";

		}
		?>
	</select>
<!-- --------------------------------------------------- --->	
<br><br><br>
<span class="span_txt">Dodaj Sliku:</span><br><br>
<img src="../images/<?php echo $selectedProduct->product_image; ?>">	
<br>	
<!-- --------------------------------------------------- --->
 <input class="file_upload_button" type="file" name="fup_image"/>
 
 <br><br><br><br>
<!-- --------------------------------------------------- --->

		<input type="submit" name="btn_insert" value="Dodaj" class="btn_submit">
		<input type="submit" name="btn_update" value="Promeni" class="btn_submit">
		<input type="submit" name="btn_delete" value="Izbriši" class="btn_submit">
	
</form>

<?php
}
?>
</div>
<!-- --------------------------------------------------- --->
<br><br>
<a href="index.php" class="btn_back">Vrati se</a> 
<!-- --------------------------------------------------- --->
<?php require_once "footer.php";