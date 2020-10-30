<?php
    include "inc/header.php";
    if(!isset($_GET['editId']) || $_GET['editId']==NULL){
        header("location: catlist.php");
    }else{
        $editId = $_GET['editId'];
    }
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
    include "../classes/Category.php";
    $ct = new Category();

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $catName = $_POST['catName'];
        $updateCat = $ct->updateCategory($catName, $editId);
    }
?>
<!---admin panel body end-->
<div class="main">
    <h2 >Add Category</h2>
    <div class="block">
        <?php 
            $selectCat = $ct->selectCategory($editId);
            if($selectCat){
                while($select = $selectCat->fetch_assoc()){
        ?>
        <form style="background:#063146;border-radius:4px;" action="" method="post" class="w-50 m-auto border p-4">
            <?php
                if(isset($updateCat)){
                    echo $updateCat;
                }
            ?>
            <div class="form-group">
                <label for="catName">Category Name</label>
                <input class="form-control" type="text" name="catName" Value="<?php echo $select['catName'];?>">
                <input type="submit" name="submit" value="Save" class="btn btn-success mt-2">
            </div>
        </form>
        <?php  }}?>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>