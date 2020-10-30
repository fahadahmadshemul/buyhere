<?php 
	 include "inc/header.php";
?>
  
<?php 
    Session::checkSession(); 

    if(isset($_GET['customerId'])){
        $customerId = $_GET['customerId'];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $updateProfile = $cmr->customerInfo($_POST, $customerId);
    }
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-75 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            <?php
                if(isset($updateProfile)){
                    echo $updateProfile;
                }
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
                        <td><input  class="form-control" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                        <td><input  class="form-control" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input  class="form-control" type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                        <td><input  class="form-control" type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input  class="form-control" type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
                        <td><input class="form-control" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input  class="form-control" type="email" name="email" value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><input type="submit" name="submit" class="btn btn-success" value="Save"><a href="profile.php" class="btn btn-success ml-2">Back</a></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><a href="changePassword.php?customerId=<?php echo $result['customerId']; ?>" class="btn btn-success ml-2">Change Password</a></td>
                    </tr>
                </table>
                    <?php }} ?>
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

