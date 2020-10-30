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
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $replyMessage = $cmr->replyMessage($_POST);
    }

    
?>
<!---admin panel body end-->
<div class="main">
    <h2>Reply Message</h2>
<?php 
    $getMessage = $cmr->getMessageById($id);
    if($getMessage){
        while($message = $getMessage->fetch_assoc()){
?>
    <div class="block" style="background:#063146;color:#fff;">
       <form action="" method="POST" class="w-50 m-auto border p-4">
       <?php 
        if(isset($replyMessage)){
            echo $replyMessage;
        }
       ?>
       <div class="form-group">
        <label for="">To</label>
        <input type="text" readonly  class="form-control" name="to_email" id="" value="<?php echo $message['email']; ?>">
       </div>
       <div class="form-group">
        <label for="">From</label>
        <input type="text"  class="form-control" name="form_email" id="" placeholder="Enter Your Email">
       </div>
       <div class="form-group">
        <label for="">Subject</label>
        <input type="text"  class="form-control" name="subject" id="" placeholder="Enter Your Subject">
       </div>
       <div class="form-group">
        <label for="">Message</label>
        <textarea class="form-control" name="message" id="" placeholder="Enter Message" ></textarea>
       </div>
       <div class="form-group">
        <input type="submit" name="submit" value="Send" class="btn btn-success">
       </div>
       </form>
    </div>
        <?php }  }?>
</div>
<?php 
    include "inc/footer.php";
?>