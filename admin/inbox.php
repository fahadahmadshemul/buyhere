<?php
    include "inc/header.php";
?>
<style>
    .main {
        background: whitesmoke;
        margin-top: 75px;
        margin-left: 257px;
        min-height:100vh;
        border:10px solid #0c6922;
    }
    .main h2{
        background: #0c6922;
        color: #fff;
        padding: 10px 20px;
        border-bottom: 3px solid #064214;
    }
    .main .block{
        padding:20px 30px;
    }
</style>
<?php
    include "inc/sidebar.php";
    include "../classes/Cart.php";
    include "../classes/Brand.php";
    $crt = new Cart();
    

?>

<?php 
    if(isset($_GET['shiftId'])){
        $shiftId = $_GET['shiftId'];
        $shiftProduct = $crt->shiftedProduct($shiftId);
    }
    if(isset($_GET['delId'])){
        $delId = $_GET['delId'];
        $deleteProduct = $crt->deleteShiftedProduct($delId);
    }
?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <?php
        
    ?>
       <div class="table-responsive-sm">
            <table style="background:#063146;" class="table table-striped  table-hover">
                <thead>
                    <tr>
                    <th scope="col">View Product</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $order = $crt->getAllOrder();
                    if($order){
                        while($result = $order->fetch_assoc()){
                ?>
                    <tr>
                        <th scope="row"><a href="viewProduct.php?productId=<?php echo $result['productId'] ?>">View Product</a></th>
                        <td><?php echo $result['date']; ?></td>
                        <td><?php echo $result['productName']; ?></td>
                        <td><?php echo $result['quantity']; ?></td>
                        <td><?php echo "$". $result['price']; ?></td>
                        <td><a href="profile.php?customerId=<?php echo $result['customerId']; ?>">Address</a></td>
                        <td><?php if($result['status'] == 0){ ?><a href="?shiftId=<?php echo $result['id']; ?>">shifted</a><?php }elseif($result['status'] ==2){ ?><a href="?delId=<?php echo $result['id']; ?>">Remove</a><?php }else{ echo "pending";} ?></td>
                    </tr>
                <?php } }?>
                </tbody>
            </table>
       </div>

    </div>
</div>
<?php 
    include "inc/footer.php";
?>