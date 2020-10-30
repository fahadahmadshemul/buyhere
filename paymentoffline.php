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
    if(isset($_GET['orderid']) && $_GET['orderid'] == "order"){
        $customerId = Session::get('customerId');
        $insertOrder = $crt->inserOrderProduct($customerId);
        $delData = $crt->delCustomerCart();
        header("location: success.php");
    }
?>
<div class="container">
    <section class="main-content">
        <div class="mian">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $getPro = $crt->getCartPrduct();
                            if($getPro){
                                $i=0;
                                $sum=0;
                                $qty=0;
                            while($result = $getPro->fetch_assoc()){
                                $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td>$<?php echo $result['price']; ?></td>
                                <td><?php echo $result['quantity']; ?></td>
                                <td>$
                                    <?php 
                                        $total = $result['price'] * $result['quantity'];
                                        echo $total;
                                    ?>
                                 </td>
                            </tr>
                            <?php 
                            $qty = $qty + $result['quantity'];
                            $sum = $sum + $total;
                        ?>
                            <?php } } ?>
                            
                        </tbody>
                       
                    </table>
                    <table class="table w-50 ml-auto table-striped table-hover">
                        <tr>
                            <td>sub total</td>
                            <td>$<?php echo $sum; ?></td>
                        </tr>  
                        <tr>
                            <td>Vat</td>
                            <td>10%(<?php echo "$". $vat = $sum * 0.1;?>)</td>
                        </tr> 
                        <tr>
                            <td>Grand total</td>
                            <td>$<?php echo $sum + $vat; ?></td>
                        </tr>  
                        <tr>
                            <td>Quantity</td>
                            <td><?php echo $qty; ?></td>
                        </tr>  
                    </table>
                </div>
                <div class="col-md-6 ">
                    <h4 class="text-center">Your Details</h4>
                <?php 
                    $customerId = Session::get('customerId');
                    $getCustomerData = $cmr->getCustomerData($customerId);
                    if($getCustomerData){
                        while($data = $getCustomerData->fetch_assoc()){
                ?>
                    <table class="table table-striped table-hover">
                        <tr>
                            <td>Name</td>
                            <td><?php echo $data['name']; ?></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><?php echo $data['address']; ?></td>
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo $data['city']; ?></td>
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo $data['country']; ?></td>
                        </tr>
                        <tr>
                            <td>Zip</td>
                            <td><?php echo $data['zip']; ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?php echo $data['phone']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $data['email']; ?></td>
                        </tr>
                        <tr>
                            <td class="text-center" colspan="2"><a class="btn btn-success" href="editProfile.php?cmrId=<?php echo $data['customerId']; ?>">Update Details</a></td>
                        </tr>
                    </table>
                <?php }}?>
                
                </div>
                
            </div>
        </div> 
        <div class="text-center">
        <a class="btn btn-info btn-lg" href="?orderid=order">Order Now</a>
        </div>
</section>
</div>
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>
 

