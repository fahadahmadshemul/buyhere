<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../lib/Database.php";
    include_once $filepath."/../helpers/Format.php";
?>
<?php 
    class Cart{
        public $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addtoCart($quantity, $productId){
            $quantity = $this->fm->validation($quantity);
            $productId = $this->fm->validation($productId);

            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $productId = mysqli_real_escape_string($this->db->link, $productId);
            $sId = session_id();

            $slquery = "SELECT * FROM tbl_product WHERE productId='$productId'";
            $select = $this->db->select($slquery)->fetch_assoc();
            $productName = $select['productName'];
            $price = $select['price'];
            $image = $select['image'];

            $chkquery = "SELECT * FROM tbl_cart WHERE productId = '$productId' AND sId='$sId'";
            $getPro = $this->db->select($chkquery);

            if($getPro){
                $msg = "<div class='alert alert-danger'>Product already added..!</div>";
                return $msg;
            }else{
                $query = "INSERT INTO tbl_cart (sId, productId, productName, price, quantity, image) VALUES ('$sId', '$productId', '$productName
                ', '$price', '$quantity', '$image')";
                $inserCart = $this->db->insert($query);
                if($inserCart){
                    header("location: cart.php");
                }else{
                    header("location: 404.php");
                }
            }
        }
        public function getCartPrduct(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function updateCart($cartId, $quantity){
            $cartId = $this->fm->validation($cartId);
            $quantity = $this->fm->validation($quantity);

            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $query = "UPDATE tbl_cart SET quantity='$quantity' WHERE cartId='$cartId'";
            $update_cart = $this->db->update($query);
        }
        public function delProductFromCart($cartId){
            $cartId = $this->fm->validation($cartId);

            $cartId = mysqli_real_escape_string($this->db->link, $cartId);

            $query = "DELETE FROM tbl_cart WHERE cartId='$cartId'";
            $delpro = $this->db->delete($query);
            if($delpro){
                header("location:cart.php");
            }else{
                $msg = "<div class='alert alert-danger'>Data not Deleted</div>";
                return $msg;
            }
        }
        
        public function inserOrderProduct($customerId){
            $sId = session_id();
            $squery = "SELECT * FROM `tbl_cart` WHERE `sId`='$sId'";

            $getPro = $this->db->select($squery);
            if($getPro){
                while($result = $getPro->fetch_assoc()){
                    $productId   = $result['productId'];
                    $productName = $result['productName'];
                    $quantity    = $result['quantity'];
                    $price       = $result['price'] * $quantity;
                    $image       = $result['image'];

                    $query = "INSERT INTO tbl_order (customerId, productId, productName, quantity, price, image) VALUES('$customerId', '$productId', '$productName', '$quantity', '$price', '$image')";
                    $inserted_row = $this->db->insert($query); 
                }
            }
        }
        public function delCustomerCart(){
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function totalPayableAmount($customerId){
            $query = "SELECT * FROM tbl_order WHERE customerId = '$customerId' AND date=now()";
            $result = $this->db->select($query);
            return $result;
        }
        public function getOrderProduct($customerId){
            $query = "SELECT  * FROM tbl_order WHERE customerId='$customerId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function getAllOrder(){
            $query = "SELECT * FROM tbl_order ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
        }
        public function shiftedProduct($shiftId){
            $query = "UPDATE tbl_order SET status=1 WHERE id='$shiftId'";
            $result = $this->db->update($query);
            return $result;
        }
        public function deleteShiftedProduct($delId){
            $query = "DELETE FROM tbl_order WHERE id='$delId'";
            $result = $this->db->delete($query);
            return $result;
        }
        public function confirmProduct($confirmId){
            $query = "UPDATE tbl_order SET status=2 WHERE id='$confirmId'";
            $result = $this->db->update($query);
            return $result;
        }
        public function checkCartTable(){
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function checkOrder($customerId){
            $query = "SELECT *  FROM tbl_order WHERE customerId='$customerId'";
            $result = $this->db->select($query);
            return $result;
        }
    }
?>