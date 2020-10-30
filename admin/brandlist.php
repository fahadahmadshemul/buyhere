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
    $ct = new Brand();
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $deleteBrand = $ct->deleteBrand($delid);
    }

?>
<!---admin panel body end-->
<div class="main">
    <h2>Category List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <?php
        if(isset($deleteBrand)){
            echo $deleteBrand;
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
                    $selectBrand = $ct->selectALlBrand();
						if($selectBrand){
							$i=0;
							while($select = $selectBrand->fetch_assoc()){
								$i++;
								?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $select['brandName']; ?></td>
                    <td><a  href="editBrand.php?editId=<?php echo $select['brandId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delid=<?php echo $select['brandId']; ?>"> Delete</a></td>
                </tr>
                <?php }}?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>