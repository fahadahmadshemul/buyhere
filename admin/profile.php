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
    include "../classes/Customer.php";
    $cmr = new Customer();

    if(isset($_GET['customerId'])){
        $customerId = $_GET['customerId'];
    }
?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <form class="w-75 m-auto p-3" action="" method="post" style="border:1px solid #ddd">
            <?php
                // if(isset($signupCmr)){
                //     echo $signupCmr;
                // }
            ?>
            <h1 class="text-center">Customer Details</h1>
            <?php 
                
                $getCustomer = $cmr->getCustomerInfo($customerId);
                if($getCustomer){
                    while($result = $getCustomer->fetch_assoc()){
            ?>
                <table class="table">
                    <tr>
                        <td><input readonly class="form-control" type="text" name="name" value="<?php echo $result['name']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="address" value="<?php echo $result['address']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="text" name="city" value="<?php echo $result['city']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="country" value="<?php echo $result['country']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="text" name="zip" value="<?php echo $result['zip']; ?>"></td>
                        <td><input readonly class="form-control" type="text" name="phone" value="<?php echo $result['phone']; ?>"></td>
                    </tr>
                    <tr>
                        <td><input readonly class="form-control" type="email" name="email" value="<?php echo $result['email']; ?>"></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center"><a class="btn btn-success" href="inbox.php">Ok</a></td>
                    </tr>
                </table>
                    <?php }} ?>
            </form>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>