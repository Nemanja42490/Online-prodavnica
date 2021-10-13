<?php
/* ---------------------------------------------------------- */
if(isset($_POST['btnCheckout'])){
	$name = $_POST['tbName'];
	$address = $_POST['tbAddress'];
	$tel = $_POST['tbTel'];
/* ---------------------------------------------------------- */
	session_start();
	if(!Session::get('cart')||empty(Session::get('cart'))){
		echo "card is empty";
	}else{	
		$cartcontent = json_encode(Session::get('cart'));
			$q = new Orders;
			$q->order_name = $_POST['tbName'];
			$q->order_address = $_POST['tbAddress'];
			$q->order_tel_number = $tel = $_POST['tbTel'];
			$q->order_products =  $cartcontent;
			$q->insert();
/* ---------------------------------------------------------- */		
			foreach(Session::get('cart') as $k => $v){
				$u = new Product;
				$u = Product::get($k);
				$u->product_available = $u->product_available - $v;
				$u->Update($k);
			}
/* ---------------------------------------------------------- */	
		Session::stop();
		header('Location:?page=8');
}}
/* ---------------------------------------------------------- */
?>

<div class="checkout">
	<form action="" method="post">
		<span class="form_chk">Ime i Prezime: </span><input class="chk_input" type="text" name="tbName" required><br>
		<span class="form_chk">Adresa: </span><input class="chk_input" type="text" name="tbAddress" required><br>
		<span class="form_chk">Broj telefona: </span><input class="chk_input" type="text" name="tbTel" required><br><br>
	<input type="submit" name="btnCheckout" value="Pošalji"  class="btn_submit">
	</form>
</div>