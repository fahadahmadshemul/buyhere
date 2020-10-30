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
    $fm = new Format();
    if(isset($_GET['seenId'])){
        $seenId = $_GET['seenId'];
        $result = $cmr->seenContractMessage($seenId);
    }
    if(isset($_GET['delid'])){
        $delid = $_GET['delid'];
        $deleteContractMessage = $cmr->deleteContractMessage($delid);

    }


?>
<!---admin panel body end-->
<div class="main">
    <h2>Product List</h2>
    <div class="block" style="background:#063146;color:#fff;">
    <h3 class="text-success">Inbox</h3>
    <?php
        if(isset($deleteContractMessage)){
            echo $deleteContractMessage;
        }
    ?>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td width="5%">Serial No</td>
                    <td width="5%">Name</td>
                    <td width="5%">Email</td>
                    <td width="5%">Phone</td>
                    <td width="15%">Message</td>
                    <td width="30%">Date</td>
                    <td width="35%">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selectContract = $cmr->selectAllContractMessage();
						if($selectContract){
							$i=0;
							while($select = $selectContract->fetch_assoc()){
								$i++;
								?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $select['name']; ?></td>
                    <td><?php echo $select['email']; ?></td>
                    <td><?php echo $select['phone']; ?></td>
                    <td><?php echo $fm->textShorten($select['message'],20); ?></td>
                    <td><?php echo $select['date']; ?></td>
                    <td><a  href="viewMessage.php?id=<?php echo $select['id']; ?>">View</a> || <a href="?seenId=<?php echo $select['id']; ?>"> Seen</a> || <a href="replyMessage.php?id=<?php echo $select['id']; ?>">Reply</a></td>
                </tr>
                <?php }}else{?>
                    
                    <tr>
                        <td colspan="7" class="text-center">No data available..!</td>
                    </tr>
                    
                   <?php }?>
            </tbody>
        </table>
    </div>
    
    <div class="block" style="background:#063146;color:#fff;">
        <h4 class="text-success">Seen Message</h4>
        <!----seen box----->
<table class="table table-striped table-hover">
            <thead>
                <tr>
                    <td width="5%">Serial No</td>
                    <td width="5%">Name</td>
                    <td width="5%">Email</td>
                    <td width="5%">Phone</td>
                    <td width="15%">Message</td>
                    <td width="30%">Date</td>
                    <td width="35%">Action</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $selectAllSeenMessage = $cmr->selectAllSeenMessage();
						if($selectAllSeenMessage){
							$i=0;
							while($result = $selectAllSeenMessage->fetch_assoc()){
								$i++;
								?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $result['name']; ?></td>
                    <td><?php echo $result['email']; ?></td>
                    <td><?php echo $result['phone']; ?></td>
                    <td><?php echo $fm->textShorten($result['message'],20); ?></td>
                    <td><?php echo $result['date']; ?></td>
                    <td> <a href="replyMessage.php?id=<?php echo $result['id']; ?>">Reply</a> || <a onclick="return confirm('Are you sure to delete?')" href="?delid=<?php echo $result['id']; ?>">Delete</a></td>
                </tr>
                <?php }}else{?>
                    
                    <tr>
                        <td colspan="7" class="text-center">No data available..!</td>
                    </tr>
                    
                   <?php }?>
            </tbody>
        </table>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>
