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
    include "../classes/Brand.php";
    $pd = new Product();
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $deletePro = $pd->deleteProduct($delid);
    }

?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <?php
        if(isset($deletePro)){
            echo $deletePro;
        }
    ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td width="5%">Serial No</td>
                    <td width="15%">Product Name</td>
                    <td width="5%">Category</td>
                    <td width="5%">Brand</td>
                    <td width="25%">Description</td>
                    <td width="5%">Price</td>
                    <td width="15%">Image</td>
                    <td width="5%">Type</td>
                    <td width="20%">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selectAllProduct = $pd->selectAllProduct();
						if($selectAllProduct){
							$i=0;
							while($select = $selectAllProduct->fetch_assoc()){
								$i++;
								?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $select['productName']; ?></td>
                    <td><?php echo $select['catName']; ?></td>
                    <td><?php echo $select['brandName']; ?></td>
                    <td><?php echo $fm->textShorten($select['body'], 30); ?></td>
                    <td><?php echo $select['price']; ?></td>
                    <td><img width="60px" height="60px" src="<?php echo $select['image']; ?>" alt=""></td>
                    <td><?php echo $select['type']; ?></td>
                    <td><a  href="editProduct.php?editId=<?php echo $select['productId'] ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delid=<?php echo $select['productId']; ?>"> Delete</a></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>