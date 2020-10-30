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
	if(isset($_GET['delPro'])){
		$cartId  = $_GET['delPro'];
		$delProduct = $crt->delProductFromCart($cartId);
	}
?>
<?php
    if(($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['update'])){
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $updateCart = $crt->updateCart($cartId, $quantity);
        if($quantity <=0){
			$delProduct = $crt->delProductFromCart($cartId);
		}
    }
?>
<?php
	if(!isset($_GET['id'])){
		echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>
<div class="container">
<section class="main-content">
    <div class="mian">
<?php 
    if(isset($delProduct)){
        echo $delProduct;
    }
?>
    <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="5%">SL</th>
                    <th width="30%">Product Name</th>
                    <th width="10%">Image</th>
                    <th width="10%">Price</th>
                    <th width="20%">Quantity</th>
                    <th width="15%">Total Price</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $getPro = $crt->getCartPrduct();
                if($getPro){
                    $i=0;
                    $qty=0;
                    $sum=0;
                    while($result = $getPro->fetch_assoc()){
                        $i++;
            ?>
                <tr>
                    <td><?php echo $i?></td>
                    <td><?php echo $result['productName'];?></td>
                    <td><img style="width:60px;height:60px;" src="admin/<?php echo $result['image'];?>" alt=""></td>
                    <td>$ <?php echo $result['price']; ?></td>
                    <td>
                    <form action="" method="post" style="display:inline-flex;">
                        <input type="hidden" name="cartId" value="<?php echo $result['cartId']; ?>"/>
                        <input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
                        <input  type="submit" name="update" value="Update"/>
                    </form>
                    </td>
                    <td>$
                        <?php 
                            $total = $result['price'] * $result['quantity'];
                            echo $total;
                        ?>
                    </td>
                    <td><a onclick="return confirm('Are you sure to delete?')" href="?delPro=<?php echo $result['cartId']; ?>">X</a></td>
                </tr>
                <?php 
                    $qty = $qty+$result['quantity'];
                    $sum = $sum+$total;
                    Session::set("sum", $sum);
                    Session::set("qty", $qty);
                ?>
            <?php } } ?>
            </tbody>
        </table>
        <?php
            $getData = $crt->getCartPrduct();
            if($getData){
        ?>
        <table style="float:right;text-align:left;" width="40%">
            <tr>
                <th>Sub Total : </th>
                <td>$. <?php echo $sum; ?></td>
            </tr>
            <tr>
                <th>VAT : </th>
                <td>10%</td>
            </tr>
            <tr>
                <th>Grand Total :</th>
                <td>$. <?php 
                    $vat = $sum * 0.1;
                    echo $sum + $vat;
                ?> </td>
            </tr>
        </table>
            <?php }else{
                header("location: index.php");
                //echo "<h4 style='display:block;font-size:30px'>Cart is empty please shop now!</h4>";
            }?>
    </div>
    
</section>
</div>
<div class="container p-4 mt-4">
        <div class="row text-center w-50 m-auto">
            <div class="col-md-6">
                <a class="btn btn-info btn-lg mt-3" href="index.php">Continue Shopping</a>
            </div>
            <div class="col-md-6">
            <a class="btn btn-info btn-lg mt-3" href="payment.php">Checkout!</a>
            </div>
        </div>
        
    </div>
</div>
   
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>
 

