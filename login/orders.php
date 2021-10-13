<?php
require_once "../config.php";
require_once "header.php";
?>
<?php
// -----------------------------------------------	//
require_once "../config.php";
require_once "header.php";
// -----------------------------------------------	//
if(!Session::get("user_status")||Session::get("user_status")!=3){
	echo "<h1>Invalid access!</h1>";
	header( "refresh:1;url=index.html" );
}else{

$orders = Orders::getAll();
// -------------------------------------------------------------------------- //
foreach($orders as $rw){
?>

<div class="orders_container">

<span class="span_txt2">id: <?php echo $rw->order_id; ?></span> 
<br>
<span class="span_txt2"><b>Ime: </b> <?php echo $rw->order_name; ?></span> 
<br>
<span class="span_txt2"><b>Adresa: </b> <?php echo $rw->order_address; ?></span> 
<br>
<span class="span_txt2"><b>Broj telefona: </b> <?php echo $rw->order_tel_number; ?></span> 
<br><br><br>

<?php  
// -------------------------------------------------------------------------- //    
        $a = json_decode($rw->order_products, true);
// -------------------------------------------------------------------------- //    
        foreach($a as $k=>$v){
// -------------------------------------------------------------------------- //
            $product = Product::getAll("WHERE product_id = ({$k})");
            foreach($product as $p){
            ?>
            <div class="orders">
                <h3 class="span_txt"><?php echo $p->product_name; ?> </h3>
                <p class="span_txt">Količina: <?php echo $v; ?></p> <br><br>

                <img src="../images/<?php echo $p->product_image; ?>"  />
            </div>           
<?php
// -------------------------------------------------------------------------- //
            }
        }
    echo "</div>";
}
}
?>

<!-- ******************************** -->
<br><br>
<a href="index.php" class="btn_back">Vrati se</a> 
<!-- ******************************** --> 
<?php require_once "footer.php";

