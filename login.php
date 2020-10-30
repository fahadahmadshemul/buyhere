<?php 
	 include "inc/header.php";
?>
  
<?php 
    Session::checkLogin();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $CmrLogin = $cmr->customerLogin($_POST);
    }
?>
	<section class=" my-4" id="pplrPdct">
		<div class="pplrHead mt-4" style="margin-top:100px !important;">
		</div>
		<div class="container my-4">
        
			<form class="w-50 m-auto p-5" action="" method="post" style="border:1px solid #ddd">
            
            <h1 class="text-center">User Login</h1>
                <?php 
                    if(isset($CmrLogin)){
                        echo $CmrLogin;
                    }
                ?>
                <div class="form-group">
                    <label for="">Email Address</label>
                    <input class="form-control" type="text" name="email" placeholder="Enter Your Email Address">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input class="form-control" type="password" name="password" placeholder="Enter Your Email Password">
                </div>
                <input type="submit" name="submit" value="Login" class="btn btn-success">
            </form>
		</div>
	</section>
	
<!-- 	Search product section end -->

	<?php include "inc/footer.php"; ?>

