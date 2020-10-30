<?php 
	$realpath = realpath(dirname(__FILE__));
	include $realpath."/../lib/Session.php";
	Session::init();
	include_once $realpath."/../lib/Database.php";
	include_once $realpath."/../helpers/Format.php";

	spl_autoload_register(function($class){
		include_once "classes/".$class.".php";
	});
	$db  = new Database();
	$fm  = new Format();
	$pd  = new Product();
    $ct = new Category();
	$bnd = new Brand();
	$cmr = new Customer();
	$crt = new Cart();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!doctype html>
<html lang="en">
  <head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<script src="js/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
		
		<title>buyhere</title>
  </head>
  <style>
  </style>
  <body>
  <?php 
	if(isset($_GET['action']) && $_GET['action'] == 'logout'){
		Session::destroy();
	}
  ?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		  <div class="logo"><a class="navbar-brand" href="index.php">
			<span class="logoclr">BUY	</span>HERE.com</a>
		  </div>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			
				<ul class="navbar-nav ml-auto">
				  <li class="nav-item" id="nav-item1">
					<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
				  <li class="nav-item" id="nav-item2">
					<a class="nav-link" href="featureProduct.php">Feature Product</a>
				  </li>
				  <li class="nav-item" id="nav-item3">
					<a class="nav-link" href="topBrand.php">Top Brand</a>
				  </li>
				<?php 
					$checkCart = $crt->checkCartTable();
					if(Session::get("login") == true){
					if($checkCart){
				?>
				  <li class="nav-item" id="nav-item4">
					<a class="nav-link" href="cart.php">Cart <span class="text-success"><?php $sum = Session::get("sum");
					$qty = Session::get("qty");
					echo "$".$sum." ($qty)"; ?></span></a>
				  </li>
				  <?php 
					} }
				  ?>
				  <?php 
					 $customerId = Session::get("customerId");
					 $checkOrder = $crt->checkOrder($customerId);
					 if($checkOrder){
				  ?>
				  <li class="nav-item">
					<a class="nav-link" href="orderDetails.php" id="nav-item5">Order</a>
				  </li>
				  <?php 
					 } 
				  ?>
				  <li class="nav-item">
				  	<a href="">
					</a>
				  </li>
				  <?php 
				 	if(Session::get("login") == false){
					?>
				  <li class="nav-item">
					<a class="nav-link" href="signup.php" id="nav-item5">Signup</a>
				  </li>
				<?php }else{ ?>
				  <li class="nav-item">
					<a class="nav-link" href="profile.php" id="nav-item5">Profile</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="?action=logout" id="nav-item5">Logout</a>
				  </li>
				<?php } ?>
					<li class="nav-item">
						<a class="nav-link" href="contract.php" id="nav-item5">Contract</a>
					</li>
				</ul>
			<form action="search.php" method="get" class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
			
			
	</div>
</nav>