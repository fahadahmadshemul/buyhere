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
?>
<!---admin panel body end-->
<div class="main">
    <h2 >Dashboard</h2>
    <div class="block">
        <p>Welcome to admin panel</p>
    </div>
</div>
<?php 
    include "inc/footer.php";
?>