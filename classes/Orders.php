<?php

class Orders extends ActiveRecord {
	
	
	public $order_name="",$order_address="",
	$order_products="", $order_tel_number= "";
	
	public static $table = " orders";
	
	public static $key = " order_id";
	
}
