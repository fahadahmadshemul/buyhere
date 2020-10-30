<?php 
	 include "inc/header.php";
?>

  
  <!-- 	Bag product section start -->
  
	<section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
			<h1 class="text-center">Feature Products</h1>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getfeatureProduct = $pd->getfeatureProduct();
				if($getfeatureProduct){
					while($getProduct = $getfeatureProduct->fetch_assoc()){
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
			<?php }}else{?>
                
			</div>
            <h2 class="text-success text-center p-4">No Producr found...:( From this Category...!</h2>
            <?php } ?>
		</div>
	</section>
	
<!-- 	Bag product section end -->

	
   
   <!-- jquery cdn -->
	<?php include "inc/footer.php"; ?>

