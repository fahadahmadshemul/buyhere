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
    include "../classes/Product.php";
    $pd = new Product();

    if(isset($_GET['productId'])){
        $productId = $_GET['productId'];
    }
?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
    <div class="block" style="background:#063146;color:#fff;">
        <table class="table table-striped table-hover w-50 m-auto">
            <thead>
                <tr>
                    <th width="15%">Product Name</th>
                    <th width="15%">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $selectAllProduct = $pd->selectProductById($productId);
                    if($selectAllProduct){
                        while($select = $selectAllProduct->fetch_assoc()){
                    
					?>
                <tr>
                    <td><?php echo $select['productName']; ?></td>
                    <td><img width="250px" height="" src="<?php echo $select['image']; ?>" alt=""></td>
                    
                <?php }}?>
                <tr>
                            <td><a href="inbox.php" class="btn btn-success">Ok</a></td>
                </tr>
            </tbody>
            
        </table>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>