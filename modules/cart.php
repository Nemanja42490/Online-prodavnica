<!-- --------------------------------------------------- -->
<div class="cart_msg">Ovo je Vaša korpa:</div>
<!-- --------------------------------------------------- -->
<?php
Session::start();
/* ------------------------------------------------------ */ 
if(isset($_POST['pid'])&&isset($_POST['quantity'])){
	
	if(isset(Session::get('cart')[$_POST['pid']])){
		
		$_SESSION['cart'][$_POST['pid']]+= $_POST['quantity'];
		header('Location:?page=3');

	}else{
		$_SESSION['cart'][$_POST['pid']] =  $_POST['quantity'];
		header('Location:?page=3');
	}	
}
/* ------------------------------------------------------ */ 
if(empty(Session::get('cart'))){
	echo "<p class='cart_empty'> Vaša korpa je prazna. </p>";
	return;
}
/* ------------------------------------------------------ */ 
$product_ids = array_keys(Session::get('cart'));
$product_ids_string = implode(" ,",$product_ids);
// --------------------------------------------
$product = Product::getAll("WHERE product_id in ({$product_ids_string})");
// -------------------------------------------------------------------------- //
foreach($product as $rw){
?>
<!-- ------------------------------------------------------------------------ -->
<div class="box">

        <h3><?php echo $rw->product_name; ?> </h3>

        <div class="box_img">
                <img src="images/<?php echo $rw->product_image; ?>" class="left" />
        </div>
		
		<p>Količina: <?php echo Session::get('cart')[$rw->product_id]; ?></p> 

    </div>
<!-- ------------------------------------------------------------------------ -->
<?php
}
?>
<!-- ------------------------------------------------------------------------ -->
<div class="clear"></div>
<!-- ------------------------------------------------------------------------ -->
<div class="cart_links">

	<a href="?page=7" >Ukloni sve iz korpe</a>

</div>
<!-- ------------------------------------------------------------------------ -->
<div class="cart_links cart_buy">

	<a href="?page=6">Idi na kasu</a>

</div>




