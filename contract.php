<?php 
    include "inc/header.php";
?>
<!-- cotract us section -->
	
<div class="container my-4" id="contract">
			
			<div class="contactHead">
				<h2 class="text-center my-4" id="cntUs">Contract Us</h2>
			</div>
        <?php 
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $contract = $cmr->contractMessage($_POST);
            }
        ?>
			<div class="row">
				<col-md-6 class="col-lg-6 col-12">
					<form action="" method="post">
						<h3 class="text-center">Send message to admin</h3>
            <?php
              if(isset($contract)){
                echo $contract;
              }
            ?>
					  <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" id="" placeholder="Enter your name">
              </div>
              <div class="form-group">
                <label for="">Email Address</label>
                <input class="form-control" type="text" name="email" placeholder="Enter your email address" id="">
              </div>
              <div class="form-group">
                <label for="">Phone no:</label>
                <input class="form-control" type="text" name="phone" placeholder="Enter your Phone no" id="">
              </div>
              <div class="form-group">
                <label for="">Message</label>
                <textarea class="form-control" name="message" id="" placeholder="Enter your message"></textarea>
              </div>
              <div class="form-group">
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
              </div>
					</form>
				</col-md-6>
				
				<div class="col-md-6 col-lg-6 col-12">
					<div id="map">
					
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3649.696204990047!2d90.41879721430075!3d23.82939958455048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a4136c4b61%3A0x19549f5462616f04!2sBdtask%20-%20A%20Leading%20Software%20Company%20In%20Bangladesh!5e0!3m2!1sen!2sbd!4v1581571330763!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
					
					</div>
				</div>
			</div>
		</div>
	
	<!-- cotract us section -->
	<?php include "inc/footer.php"; ?>