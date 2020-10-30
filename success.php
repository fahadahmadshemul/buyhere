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

<?php 
    $customerId = Session::get('customerId');
    $amount = $crt->totalPayableAmount($customerId);
    if($amount){
        while($result = $amount->fetch_assoc()){
            $price = $result['price'];
            $sum = $sum + $price;
        }
    }
?>
<section class="main-content">
    <div class="container w-50 m-auto mt-5 border p-5">
    <h3 class="text-center text-success" style="border-bottom:1px solid">success</h3>
        <p class="text-center">Total Payable Amount(Including vat ) : 
            <?php 
                $vat = $sum * 0.1;
                $total = $sum+$vat;
                echo "$".$total;
            ?>

            Thanks for Purchase.Receive your order successfully.We will contract you as soon as possible with delivery details.Here is your order details.....  <a href="orderDetails.php">Visit Here</a> 
        </p>
    </div>
</section>
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>
 

