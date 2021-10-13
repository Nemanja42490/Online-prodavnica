<?php
require_once "config.php";
?>
<!-- ################################################################ -->
<!DOCTYPE html>
<html lang="sr">
<!-- ################################################################ -->
  <head>
    <title>Online Prodavnica</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="style.css" rel="stylesheet" type="text/css" />
  </head>
<!-- ################################################################ -->
<body>
<div id="wrapper">
  <div id="inner">
    <div id="header">
      <div id="nav"> 
            <!-- -------------------------------- -->  
              <a href="./">Početna</a> | 
            <!-- -------------------------------- -->	  
              <a href="?page=3">Korpa</a> | 
            <!-- -------------------------------- -->
              <a href="?page=2">Kontakt</a> | 
            <!-- -------------------------------- -->  
              <a href="login/">Prijavite se</a> 
      </div>
	<!-- -------------------------------- -->
  </div>
	<!-- -------------------------------- -->
<!-- ################################################################ -->
<!-- SIDE BAR -->
<dl id="browse">
      <dt>Kategorija</dt>

	  <?php
      $conn= Database::getInstance();
      $categories = Category::getAll();
      foreach($categories as $rw){
		?>
			<dd><a href="index.php?cid=<?php echo $rw->cat_id; ?>"><?php echo $rw->cat_name; ?></a></dd>
	<?php
		}
	?>
<!-- ################################################################ -->	  
      <dt></dt>
       <dd class="searchform">
           <form action="?page=4" method="get">
             <input type="hidden" name="page" value="4">

                <div>
                  <input name="q" type="text" placeholder="Pretražite" class="text" />
                </div>
          
          <div class="">
            <input type="submit" value="Pretraga" class="btn_submit" />
          </div>
      </form>
      </dd>
</dl>
<!-- ################################################################ -->
    <div id="body">
      <div class="inner">
			
			<?php
			
			$default_page = (isset($_GET['page']))?$_GET['page']:1;
			
			$pages = array(
          "1" => "product.php",
          "2" => "help.php",
          "3" => "cart.php",
          "4" => "search.php",
          "5" => "buy.php",
          "6" => "checkout.php",
          "7" => "restart.php",
          "8" => "checkout_msg.php"
			);
			
			if(isset($pages[$default_page])){	
				include_once "modules/" . $pages[$default_page];	
			}	
			?>
<!-- ################################################################ -->
    </div>
    <!-- ---- -->
    </div>
    <!-- ---- -->
    <div class="clear"></div>
    <div id="footer"> This website is developed by <a href="https://n3-test.rs">N3-Test</a>
    <div id="footnav"> 
<!-- ################################################################ -->
    </div>
    <!-- end footnav -->
    </div>
    <!-- end footer -->
  </div>
  <!-- end inner -->
</div>
<!-- end wrapper -->
</body>
</html>
