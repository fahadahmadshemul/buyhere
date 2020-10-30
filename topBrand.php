<?php 
	 include "inc/header.php";
?>

  
  <!-- 	Bag product section start -->
  
	<section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
			<h1 class="text-center">Latest From Canon</h1>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getCanon = $pd->getCanonProduct();
				if($getCanon){
					while($getProduct = $getCanon->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $getProduct['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $getProduct['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $getProduct['price'];?></p>
					  <div class="card-body">
						<a  href="productDetails.php?proId=<?php echo $getProduct['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
		</div>
	</section>
    <section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead mt-4" >
			<h1 class="text-center">Latest From Rolex</h1>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getRolexProduct = $pd->getRolexProduct();
				if($getRolexProduct){
					while($getRolex = $getRolexProduct->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $getRolex['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $getRolex['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $getRolex['price'];?></p>
					  <div class="card-body">
						<a  href="productDetails.php?proId=<?php echo $getRolex['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
                
			</div>
		</div>
	</section>
    <section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead mt-4" >
			<h1 class="text-center">Latest From Adidas</h1>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getAdidasProduct = $pd->getAdidasProduct();
				if($getAdidasProduct){
					while($getAdidas = $getAdidasProduct->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $getAdidas['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $getAdidas['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $getAdidas['price'];?></p>
					  <div class="card-body">
						<a  href="productDetails.php?proId=<?php echo $getAdidas['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
                
			</div>
		</div>
	</section>
    <section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead mt-4" >
			<h1 class="text-center">Latest From Easy</h1>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getSamsungProduct = $pd->getSamsungProduct();
				if($getSamsungProduct){
					while($getSamsung = $getSamsungProduct->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $getSamsung['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $getSamsung['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $getSamsung['price'];?></p>
					  <div class="card-body">
						<a  href="productDetails.php?proId=<?php echo $getSamsung['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
                
			</div>
		</div>
	</section>
	
<!-- 	Bag product section end -->

	
   
   <!-- jquery cdn -->
	<?php include "inc/footer.php"; ?>

