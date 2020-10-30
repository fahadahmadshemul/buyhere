<?php 
    $realpath = realpath(dirname(__FILE__));
    include $realpath."/../lib/Session.php";

    include $realpath."/../lib/Database.php";
    include $realpath."/../helpers/Format.php";
    

    class AdminLogin{
        public $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        
    }
    
?>