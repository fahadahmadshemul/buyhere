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
    if(isset($_GET['confirmId'])){
        $confirmId = $_GET['confirmId'];
        $confirm = $crt->confirmProduct($confirmId);
    }
    if(isset($_GET['delconfirm'])){
        $delconfirm = $_GET['delconfirm'];
        $delete = $crt->deleteShiftedProduct($delconfirm);
    }
?>

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center text-success">Order Details</h2>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Serial No</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $customerId = Session::get('customerId');
                        $getOrder = $crt->getOrderProduct($customerId);
                        if($getOrder){
                            $i=0;
                            while($order = $getOrder->fetch_assoc()){
                              $i++;
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $order['productName']; ?></td>
                            <td><img style="width:40px;height:30px" src="admin/<?php echo $order['image']; ?>" alt=""></td>
                            <td><?php echo $order['quantity']; ?></td>
                            <td><?php echo "$". $order['price']; ?></td>
                            <td><?php echo $fm->formatDate($order['date']); ?></td>
                            <td><?php if($order['status'] == 0){?>
                                pending
                            <?php }elseif($order['status'] == 1){ ?><a href="?confirmId=<?php echo $order['id']; ?>">confirm</a><?php }else{echo "confirmed";} ?></td>
                            <td> <?php if($order['status'] == 2){?>  <a onclick="return confirm('Are you sure to delete?')" href="?delconfirm=<?php echo $order['id'];?>">X</a><?php }else{ echo "N/A";} ?></td>
                        </tr>
                            <?php }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
</section>
</div>
<!-- jquery cdn -->
<?php include "inc/footer.php"; ?>
 

