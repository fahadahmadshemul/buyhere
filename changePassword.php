<?php 
	 include "inc/header.php";
?>
  
<?php 
    Session::checkSession(); 

    if(isset($_GET['customerId'])){
        $customerId = $_GET['customerId'];
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $updatePass = $cmr->updateCustomerPassword($_POST, $customerId);
    }
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-50 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            
            <h1 class="text-center">Change Password</h1>
            <?php
                if(isset($updatePass)){
                    echo $updatePass;
                }
            ?>
                <table class="table">
                    <tr>

                        <td><input  class="form-control" type="password" name="oldPass" placeholder="Enter Your old password"></td>
                    </tr>
                    <tr>
                        <td><input  class="form-control" type="password"  name="newPass" placeholder="Enter Your new password"></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2" class="text-center"><input type="submit" name="submit" class="btn btn-success" value="Save"><a href="profile.php" class="btn btn-success ml-2">Back</a></td>
                    </tr>
                </table>
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

