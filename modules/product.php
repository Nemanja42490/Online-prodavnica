<?php
// -------------------------------------------------------------------------- //
$category = isset($_GET['cid']) && is_numeric($_GET['cid']) ? $_GET['cid']:1;
$product = Product::getAll("WHERE product_category = $category");
// -------------------------------------------------------------------------- //
foreach($product as $rw){
?>
<!-- ------------------------------------------------------------------------ -->
	<div class="box">
    <a href="?page=5&pid=<?php echo $rw->product_id;  ?>">

          <h3><?php echo $rw->product_name; ?> </h3>
            <div class="box_img">
                 <img src="images/<?php echo $rw->product_image; ?>" class="left" />
            </div>
		
          <p class="p_price"><b>Cena:</b> <?php echo $rw->product_price; ?></p>

          <p><b>Dostupno:</b> <span class="p_total"> <?php echo $rw->product_available; ?></span></p>
    </a>
          <div class="clear"></div>
    </div>
<!-- ------------------------------------------------------------------------ -->
<?php
}
?>
<!-- ------------------------------------------------------------------------ -->
<div class="clear"></div>
<!-- ------------------------------------------------------------------------ -->