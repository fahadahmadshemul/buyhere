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
    include "../classes/Brand.php";
    include "../classes/Category.php";
    include "../classes/Product.php";
    $bnd = new Brand();
    $ct  = new Category();
    $pd  = new Product();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $addProduct = $pd->addProduct($_POST, $_FILES);
    }
?>
<!---admin panel body end-->
<div class="main">
    <h2 >Add Product</h2>
    <div class="block">
        <form style="background:#063146;border-radius:6px;" action="" method="post" class="w-75 m-auto border p-4 text-light" enctype="multipart/form-data">
            <?php
                if(isset($addProduct)){
                    echo $addProduct;
                }
            ?>
            <div class="form-group">
                <label for="productName">Product Name</label>
                <input class="form-control" type="text" name="productName" placeholder="Enter Product Name">
            </div>
            <div class="form-group">
                <label for="catId">Select Category</label>
                <select class="form-control" name="catId" id="select">
                <?php 
                    $selectCat = $ct->selectALlCat();
                    if($selectCat){
                        while($select = $selectCat->fetch_assoc()){   
                ?>
                    <option value="<?php echo $select['catId']; ?>"><?php echo $select['catName']; ?></option>
                <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label for="brandId">Select Brand</label>
                <select class="form-control" name="brandId" id="select">
                <?php 
                    $selectBrand = $bnd->selectALlBrand();
                    if($selectBrand){
                        while($value = $selectBrand->fetch_assoc()){   
                ?>
                    <option value="<?php echo $value['brandId']; ?>"><?php echo $value['brandName']; ?></option>
                    <?php }}?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="body"></textarea>
            </div>
            <div class="form-group">
                <label for="">Price</label>
                <input class="form-control" type="text" name="price" id="">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input class="form-control" type="file" name="image" id="">
            </div>
            <div class="form-group">
                <label for="type">Product type</label>
                <select class="form-control" name="type" id="select">
                    <option value="0">Feature</option>
                    <option value="1">General</option>
                </select>
            </div>
            <input class="btn btn-success" type="submit" name="submit" id="" value="Add Product">
        </form>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>
