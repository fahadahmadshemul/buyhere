<?php
    $realpath = realpath(dirname(__FILE__));
    include $realpath."/../classes/adminLogin.php";
    $adl = new AdminLogin();

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $adminLogin = $adl->adminLogin($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<style>
    body {
        background: #005814;
        height: 90vh;
    }

    form.w-50.m-auto.border.p-5 {
        background: #fff;
        border-radius: 4px;
    }
</style>
<body>
    <div class="container mt-5">
        <form action="" method="post" class="w-50 m-auto border p-5  ">
            <h2 style="border-bottom:2px solid #2ca952;" class="text-center text-success p-1 w-50 m-auto">Admin Login</h2>
            <?php
                if(isset($msg)){
                    echo $msg;
                }
            ?>
            
            <div class="form-group">
                <label for="adminUser">User Name</label>
                <input type="text" class="form-control" name="adminUser" placeholder="Enter Your User Name">
            </div>
            <div class="form-group">
                <label for="adminPass">Password</label>
                <input type="password" class="form-control" name="adminPass" placeholder="Enter Your Password">
            </div>
            <input type="submit" name="submit" value="Login" class="btn btn-success">
        </form>
    </div>
</body>
</html>