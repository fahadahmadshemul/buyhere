<?php 
    $realpath = realpath(dirname(__FILE__));
    include $realpath."/../lib/Session.php";
    Session::admincheckLogin();

    include $realpath."/../lib/Database.php";
    include $realpath."/../helpers/Format.php";

    class AdminLogin{
        public $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function adminLogin($data){
            $adminUser = $this->fm->validation($data['adminUser']);
            $adminPass = $this->fm->validation($data['adminPass']);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                $query = "SELECT * FROM `tbl_admin` WHERE `adminUser`='$adminUser' AND `adminPass`=md5('$adminPass')";
                $result = $this->db->select($query);
                if($result != false){
                    $value = $result->fetch_assoc();
                    Session::set('login', true);
                    Session::set('adminId', $value['adminId']);
                    Session::set('adminName', $value['adminName']);
                    Session::set('adminEmail', $value['adminEmail']);
                    header("location: index.php");
                }else{
                    $msg = "<div class='alert alert-danger'>Email or password not match.!</div>";
                    return $msg;
                }
            }
        }
    }
    
?>