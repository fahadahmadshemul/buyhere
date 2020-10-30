<?php 
	 include "inc/header.php";
?>
  
<?php 
    Session::checkSession(); 
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-75 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            <?php
                // if(isset($signupCmr)){
                //     echo $signupCmr;
                // }
            ?>
            <h1 class="text-center">Your Details</h1>
            <?php 
                $customerId = Session::get("customerId");
                $getCustomer = $cmr->getCustomerInfo($customerId);
                if($getCustomer){
                    while($result = $getCustomer->fetch_assoc()){
            ?>
                <table class="table">
                    <tr>
                        <td><input readonly class="form-control" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="email" name="email" value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><a class="btn btn-success" href="updateProfile.php?customerId=<?php echo $result['customerId']; ?>">Update Profile</a></td>
                    </tr>
                </table>
                    <?php }} ?>
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

