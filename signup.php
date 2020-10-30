<?php 
	 include "inc/header.php";
?>
  
<?php 
    Session::checkLogin();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $signupCmr = $cmr->signupCustomer($_POST);
    }
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-75 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            <?php
                if(isset($signupCmr)){
                    echo $signupCmr;
                }
            ?>
            <h1 class="text-center">Create an Account</h1>
                <table class="table">
                    <tr>
                        <td><input class="form-control" type="text" name="name" placeholder="Enter your name"></td>
                        <td><input class="form-control" type="text" name="address" placeholder="Enter your Address"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="city" placeholder="Enter your City"></td>
                        <td><input class="form-control" type="text" name="country" placeholder="Enter your Country"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="zip" placeholder="Enter your  zip-code"></td>
                        <td><input class="form-control" type="text" name="phone" placeholder="Enter your Phone no"></td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="email" name="email" placeholder="Enter your Email Address"></td>
                        <td><input class="form-control" type="password" name="password" placeholder="Enter your Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><input class="btn btn-success" type="submit" name="submit" value="Sign Up"><br> Or already have a account?please <a href="login.php">Login</a></td>
                        <td></td>
                    </tr>
                </table>
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

