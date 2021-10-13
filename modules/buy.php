<?php
// --------------------------------------------------------------------------- //
$id = isset($_GET['pid']) && is_numeric($_GET['pid'])?$_GET['pid']:0;
$product = Product::getAll("WHERE product_id = {$id}");
// --------------------------------------------------------------------------- //
foreach($product as $rw){
?>
<!-- ------------------------------------------------------------------------ -->	
<div class="box_view">

          <h2><?php echo $rw->product_name; ?> </h2>
            <div class="box_view_img">
                 <img src="images/<?php echo $rw->product_image; ?>" class="left" />
            </div>
		
          <p class="p_price"><b>Cena:</b> <?php echo $rw->product_price; ?></p>

          <p><b>Dostupno:</b> <span class="p_total"> <?php echo $rw->product_available; ?></span></p>
</div>
<!-- ------------------------------------------------------------------------ -->

<form class="" action="?page=3" method="post">
	<input type="hidden" name="pid" value="<?php echo $rw->product_id; ?>">

	<?php if($rw->product_available == 0){
		echo "Proizvod nije dostupan";
	}else{ ?>
		<input type="number" name="quantity" value="1" min="1" max="<?php echo $rw->product_available; ?>">
		<input type="submit" value="Dodaj u korpu" class="btn_submit">
	<?php } ?>
</form>
<!-- ------------------------------------------------------------------------ -->
<div class="clear"></div>
<!-- ------------------------------------------------------------------------ -->
<p class="p_description"><?php echo $rw->product_description; ?></p>
<!-- ------------------------------------------------------------------------ -->
<?php
}
?>
<!-- ------------------------------------------------------------------------ -->