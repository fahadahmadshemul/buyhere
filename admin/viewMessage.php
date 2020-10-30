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
    
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        header("location: contract.php");
    }else{
        $id = $_GET['id'];
    }

    
?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
<?php 
    $getMessage = $cmr->getMessageById($id);
    if($getMessage){
        while($message = $getMessage->fetch_assoc()){
?>
    <div class="block" style="background:#063146;color:#fff;">
       <form action="" class="w-50 m-auto border p-4">
       <div class="form-group">
        <label for="">Name</label>
        <input type="text" readonly class="form-control" name="" id="" value="<?php echo $message['name']; ?>">
       </div>
       <div class="form-group">
        <label for="">Email</label>
        <input type="text" readonly class="form-control" name="" id="" value="<?php echo $message['email']; ?>">
       </div>
       <div class="form-group">
        <label for="">Phone</label>
        <input type="text" readonly class="form-control" name="" id="" value="<?php echo $message['phone']; ?>">
       </div>
       <div class="form-group">
        <label for="">Message</label>
        <textarea class="form-control" name="" id="" ><?php echo $message['message']; ?></textarea>
       </div>
       <div class="form-group">
        <label for="">Date</label>
        <input type="text" readonly class="form-control" name="" id="" value="<?php echo $message['date']; ?>">
       </div>
       <div class="form-group">
        <a href="contract.php" class="btn btn-success">Ok</a>
       </div>
       </form>
    </div>
        <?php }  }?>
</div>
<?php 
    include "inc/footer.php";
?>