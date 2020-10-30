<?php 
     include "inc/header.php";
     Session::checkSession();
?>
<style>
    section.main-content {
    margin-top: 65px;
    padding: 60px 50px;
}
</style>
<div class="container">
    <section class="main-content">
        <div class="mian border p-5">
            <div>
                <h3 class="text-center text-success p-3 w-50 m-auto" style="border-bottom:1px solid #17a2b8">Choose your payment option</h3>
            </div>
            <div class="row text-center p-5">
                <div class="col-md-6 text-center mb-2">
                    <a href="paymentoffline.php" class="btn btn-info btn-lg">Payment Offline</a>
                </div>
                <div class="col-md-6">
                    <a href="paymentonline.php" class="btn btn-info btn-lg text-center">Payment Online</a>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="cart.php" class="btn btn-info btn-lg text-center mt-3">Previous</a>
        </div>
    </div> 
</section>
   
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>
 

