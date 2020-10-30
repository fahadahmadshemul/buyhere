<?php 
	 include "inc/header.php";
?>
  <?php
    if(!isset($_GET['cmrId']) || $_GET['cmrId'] == NULL){
        header("location: paymentoffline.php");
    }else{
        $customerId = $_GET['cmrId'];
    }
?>
<?php 
    Session::checkSession();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $updateCmr = $cmr->customerInfo($_POST, $customerId);
    }
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-75 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            <?php
                if(isset($updateCmr)){
                    echo $updateCmr;
                }
            ?>
            <h1 class="text-center">Create an Account</h1>
            <?php 
                $getCustomerData = $cmr->getCustomerData($customerId);
                if($getCustomerData){
                    while($result = $getCustomerData->fetch_assoc()){
            ?>
                <table class="table">
                    <tr>
                        <td><input class="form-control" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                        <td><input class="form-control" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                        <td><input class="form-control" type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
                        <td><input class="form-control" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="email" name="email" value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><input class="btn btn-success" type="submit" name="submit" value="Save"><a class="btn btn-success ml-2" href="paymentoffline.php">Back</a></td>
                        <td></td>
                    </tr>
                </table>
                    <?php }} ?>
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

