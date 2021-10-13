<?php

class Product extends ActiveRecord {
	
	
	public $product_name="",$product_price="",
	$product_image='', $product_category= 0, $product_available= 0, $product_description= "";
	
	public static $table = " product";
	
	public static $key = " product_id";
	
}
