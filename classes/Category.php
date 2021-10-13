<?php

class Category extends ActiveRecord {
	
	public $cat_name, $cat_description;
	
	public static $table = " categories";
	public static $key = " cat_id";
	
}
