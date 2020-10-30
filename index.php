<?php 
	 include "inc/header.php";
?>
		<div class="backgroundVideo">
			<video autoplay muted loop src="backVideo2.mp4"></video>
			<div class="content">
				<h1 class="my-4">We Provided you the Best Product</h1>
				<a href="" class="btn btn-success">Buy with Us</a>
			</div>
		</div>
  
  <!-- 	Bag product section start -->
  
	<section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead">
			<h4 class="text-center">Bags</h4>
			<hr>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getBags = $pd->getBagProduct();
				if($getBags){
					while($getBag = $getBags->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $getBag['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $getBag['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $getBag['price'];?></p>
					  <div class="card-body">
						<a  href="productDetails.php?proId=<?php echo $getBag['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
			</div>
		</div>
	</section>
	
<!-- 	Bag product section end -->

  <!-- High Quality product section start -->
  
	<section class="container">
			<div class="highpdt my-4">
				<h4 class="text-center">High Quality Product</h4>
				<hr>
			</div>
			<div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
			  <ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
				<div class="carousel-item active">
				  
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
							<img src="img/c.jpg" class="img-fluid img-thumbnail forprice" />
							<p class="price">Price:$40</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
							<img src="img/c2.jpg" class="img-fluid img-thumbnail forprice" />
							<p class="price">Price:$32</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
							<img src="img/c3.jpg" class="img-fluid img-thumbnail forprice" />
							<p class="price">Price:$45</p>
						</div>
					</div>
				  </div>
				  
				</div>
				<div class="carousel-item">
				  
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
								<img src="img/c4.jpg" class="img-fluid img-thumbnail forprice" />
								<p class="price">Price:$44</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
								<img src="img/c5.jpg" class="img-fluid img-thumbnail forprice" />
								<p class="price">Price:$34</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
							<img src="img/c6.jpg" class="img-fluid img-thumbnail forprice" />
							<p class="price">Price:$55</p>
						</div>
					</div>
				  </div>
				</div>
				
				<div class="carousel-item">
				  <div class="row">
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
								<img src="img/c7.jpg" class="img-fluid img-thumbnail forprice" />
								<p class="price">Price:$30</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
								<img src="img/c8.jpg" class="img-fluid img-thumbnail forprice" />
								<p class="price">Price:$45</p>
						</div>
					</div>
					
					<div class="col-lg-4 col-md-4 col-12">
						<div class="box">
							<img src="img/c9.jpg" class="img-fluid img-thumbnail forprice" />
							<p class="price">Price:$50</p>
						</div>
					</div>
				  </div>
				  
				</div>
			</div>
		</div>
	</section>
	
	<!-- High Quality product end -->
	
	<!-------Panjabi product section start-------->
<section class="propular_product my-4" id="pplrPdct">
		<div class="pplrHead">
			<h4 class="text-center">Cloths</h4>
			<hr>
		</div>
		<div class="container my-4">
			<div class="row">
			<?php 
				$getCloth = $pd->getClothProduct();
				if($getCloth){
					while($selectCloth = $getCloth->fetch_assoc()){
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 col-12 mb-3" id="pplr-one">
					<div class="card">
					  <a href="productDetails.php?proId=<?php echo $selectCloth['productId']; ?>"><img class="card-img-top forprice" src="admin/<?php echo $selectCloth['image']; ?>" alt="Card image cap"></a>
					  <p class="pricepplr">Price: $<?php echo $selectCloth['price'];?></p>
					  <div class="card-body">
						<a href="productDetails.php?proId=<?php echo $selectCloth['productId']; ?>" class="btn btn-success">Buy Now</a>
						<a href="#" class="btn btn-primary">Add to cart</a>
					  </div>
					</div>
				</div>
			<?php }}?>
			</div>
		</div>
	</section>
<!------Panjabi product section end----------->
	
	<!-- Camera product start -->
	
	<section class="morePdt">
		<div class="mpheader">
			<h4 class="text-center" id="morePdt">Watch</h4>
			<hr>
		</div>
		<div class="container">
			<div class="row">
			<?php
				$getWatch = $pd->getWatch();
				if($getWatch){
					while($selectWt = $getWatch->fetch_assoc()){
					
			?>
				<div class="col-md-3 col-lg-3 col-12">
					<div class="card my-4">
						<a href="productDetails.php?proId=<?php echo $selectWt['productId']; ?>"><img class="card-img-top" src="admin/<?php echo $selectWt['image']; ?>" alt="Card image cap"></a>
						<div class="card-body">
							<a href="#" class="btn btn-success">Add cart </a>
							<a href="#" class="btn btn-success">Price:$<?php echo $selectWt['price']; ?> </a>
						</div>
					</div>
				</div>	
			<?php }} ?>
			</div>
		</div>
	</section>
	<!-- More product end -->
	
	<!-- camera carousel -->
	
	<div class="container">
		<div class="camhead">
			<h4 class="text-center text-success">Camera</h4>
			<hr>
		</div>
		<div id="carouselExampleControls" class="carousel slide my-4" data-ride="carousel">
		  <div class="carousel-inner">
			<div class="carousel-item active">
			  <div class="row">
<?php
	$getCamera = $pd->getCamera1();
		if($getCamera){
			while($getCam = $getCamera->fetch_assoc()){
?>
				<div class="col-md-3 col-lg-3 col-12">
					<a href="productDetails.php?proId=<?php echo $getCam['productId']; ?>"><img class="d-block w-100 foreimgsetting" src="admin/<?php echo $getCam['image']; ?>" alt="First slide"></a>
					<p class="tocntimg"><a class="text-light" href="productDetails.php?proId=<?php echo $getCam['productId']; ?>">Buy now</a> </p>
					<p class="camprice">Price:$<?php echo $getCam['price']; ?></p>
				</div>
			<?php }}?>
			  </div>
			</div>
			<div class="carousel-item">
			  <div class="row">
			<?php
				$getCamera2 = $pd->getCamera2();
					if($getCamera2){
						while($getCam2 = $getCamera2->fetch_assoc()){
			?>
				<div class="col-md-3 col-lg-3 col-12">
					<a href="productDetails.php?proId=<?php echo $getCam2['productId']; ?>"><img class="d-block w-100 foreimgsetting" src="admin/<?php echo $getCam2['image']; ?>" alt="First slide"></a>
					<p class="tocntimg" ><a class="text-light" href="productDetails.php?proId=<?php echo $getCam2['productId']; ?>">Buy now</a> </p>
					<p class="camprice">Price:$<?php echo $getCam2['price']; ?></p>
				</div>
				<?php }} ?>
			  </div>
			</div>
			<div class="carousel-item">
			  <div class="row">
			  <?php 
				 $getCamera3 = $pd->getCamera3();
				 if($getCamera3){
					while($getCam3 = $getCamera3->fetch_assoc()){ 
			  ?>
				<div class="col-md-3 col-lg-3 col-12">
					<a href="productDetails.php?proId=<?php echo $getCam3['productId']; ?>"><img class="d-block w-100 foreimgsetting" src="admin/<?php echo $getCam3['image']; ?>" alt="First slide"></a>
					<p class="tocntimg"><a href="productDetails.php?proId=<?php echo $getCam3['productId']; ?>">Buy now</a></p>
					<p class="camprice">Price:$<?php echo $getCam3['price']; ?></p>
				</div>
				<?php }} ?>
			  </div>
			</div>
		  </div>
		  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		  </a>
		</div>
	</div>
	
	
	<!-- camera carousel  end-->
	
	
	

	
   
   <!-- jquery cdn -->
	<?php include "inc/footer.php"; ?>

