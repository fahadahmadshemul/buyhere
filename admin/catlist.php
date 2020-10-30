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
    include "../classes/Category.php";
    $ct = new Category();
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $deleteCat = $ct->deleteCategory($delid);
    }

?>
<!---admin panel body end-->
<div class="main">
    <h2>Category List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <?php
        if(isset($deleteCat)){
            echo $deleteCat;
        }
    ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td>Serial No</td>
                    <td>Brand Name</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selectCat = $ct->selectALlCat();
						if($selectCat){
							$i=0;
							while($select = $selectCat->fetch_assoc()){
								$i++;
								?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $select['catName']; ?></td>
                    <td><a  href="editCat.php?editId=<?php echo $select['catId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delid=<?php echo $select['catId']; ?>"> Delete</a></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>