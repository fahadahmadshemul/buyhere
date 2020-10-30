<?php 
	 include "inc/header.php";
?>
<style>
    section.main-content {
    margin-top: 65px;
    padding: 60px 50px;
}
</style>
<?php 
    if(!isset($_GET['proId']) || $_GET['proId'] == NULL){
        header("location: index.php");
    }else{
        $productId = $_GET['proId'];
    }
?>
<div class="container">
<section class="main-content">
    <div class="mian">
    <?php
        $getSingleProduct = $pd->getSingleProduct($productId);
        if($getSingleProduct){
            while($singlePdt = $getSingleProduct->fetch_assoc()){
    ?>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <img src="admin/<?php echo $singlePdt['image']; ?>" alt="">
                    </div>
                    <div class="col-md-6">
                        <h2><?php echo $singlePdt['productName']; ?></h2>
                        <div class="p-3">
                            <p>Price : $<?php echo $singlePdt['price']; ?></p>
                            <p>Category : <?php echo $singlePdt['catName']; ?></p>
                            <p>Brand : <?php echo $singlePdt['brandName']; ?></p>
                        </div>
                        <div class="mb-2">
                    <?php
                        if(($_SERVER['REQUEST_METHOD'] == "POST") && isset($_POST['addcat'])){
                            $quantity = $_POST['quantity'];
                            $addCart = $crt->addtoCart($quantity, $productId);
                            
                        }
                    ?>
                        <form action="" method="post">
                        <?php 
                            if(isset($addCart)){
                                echo $addCart;
                            }
                        ?>
                            <table>
                                <tr>
                                    <td><input class="form-control" type="number" name="quantity" value="1"></td>
                                    <td>
                                    <?php if(Session::get('login') == true){ ?>
                                    <input type="submit" name="addcat" value="Buy Now"  class="btn btn-primary ml-2">
                                    <?php }else{ ?>
                                        <a  class="btn btn-primary ml-2" href="login.php">Login</a>
                                    <?php } ?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="bg-primary text-light p-2 text-center">Product Details</h2>
                        <p class="p-2"><?php echo $singlePdt['body']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <h3>CATEGORY</h3>
                <div>
                    <?php 
                        $selectCat = $ct->selectALlCat();
                        if($selectCat){
                            while($select = $selectCat->fetch_assoc()){
                    ?>
                    <p  style="border-bottom:1px dashed #000;"><a class="text-dark" style="text-decoration:none"  href="categoryView.php?catId=<?php echo $select['catId']?>"><?php echo $select['catName'];?></a></p>
                <?php }} ?>
                </div>
            </div>
        </div>
    <?php }} ?>
    </div>
</section>
</div>
   
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>

