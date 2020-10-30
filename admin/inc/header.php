<?php
    $realpath = realpath(dirname(__FILE__));
    include "../lib/Session.php";
    Session::admincheckSession();
    include "../lib/Database.php";
    include "../helpers/Format.php";
    $fm = new Format();
    
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord</title>
    <script src="../js/jquery.min.js"></script>
    <!-- fontawesome kid -->
    <!----<script src="https://kit.fontawesome.com/591547f232.js" crossorigin="anonymous"></script>
    <!-- css cdn -->
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <style>
        .slidebar{
        left:0px;
        top: 12%;
        position: absolute;
        width:256px;
        height:100vh;
        background:#042331;
        transition: all .5s ease;
        overflow-x: scroll;
}
.nav-item  a:hover{
    color:#28a745!important;
}
    </style>
</head>
<body>
    <div class="section">
        <div class="headerNavbar fixed-top w-100">
            <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="index.php"><span>buy</span>here.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		  </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href=""><i class="far fa-envelope"></i></a>
                        </li>
                        <li class="nav-item">
                            <a href=""><i class="far fa-bell"></i></a>
                        </li>
                    
                        <li class="nav-item pl-2 pr-3">
                            <a href="inbox.php">Inbox
                            <?php 
                                $db = new Database();
                                $query = "SELECT * FROM tbl_order WHERE status='0'";
                                $result = $db->select($query);
                                if($result){
                                    $count_msg = mysqli_num_rows($result);
                                    echo "(".$count_msg.")";
                                }else{
                                    echo "(0)";
                                }
                                
                            ?>
                            </a>
                        </li>
                        <li class="nav-item pl-2 pr-3">
                            <a href="contract.php">Contract Message
                            <?php 
                                $contractMsg = "SELECT * FROM tbl_contract WHERE status=0";
                                $contract = $db->select($contractMsg);
                                if($contract){
                                    $count = mysqli_num_rows($contract);
                                    echo "(".$count.")";
                                }else{
                                    echo "(0)";
                                }
                            ?>
                            </a>
                        </li>

                        
                        <li class="nav-item pl-2 pr-3">
                            <a class=" mr-2" href=""><strong class="text-success">Welcome! </strong> <?php echo"(". Session::get("adminName").")";?></a>
                        </li>

                        <?php 
                            //for admin logout
                            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                Session::destroy();
                            }
                        ?>
                        <?php
                            if($_SESSION['login'] == true){?>
                        <li class="nav-item pl-2 pr-3">
                            <a  href="?action=logout">Logout</a>
                        </li>
                        <?php }?>

						<li class="nav-item pl-2 pr-3"><span class="dateTime"></span>
                    </ul>
            </div>
              </nav> 

        </div>
    </div>