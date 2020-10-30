<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../lib/Database.php";
?>
<?php 
    class Customer{
        public $db;
        public $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function signupCustomer($data){
            $name     = trim(htmlspecialchars(stripslashes($data['name'])));
            $address  = trim(htmlspecialchars(stripslashes($data['address'])));
            $city     = trim(htmlspecialchars(stripslashes($data['city'])));
            $country  = trim(htmlspecialchars(stripslashes($data['country'])));
            $zip      = trim(htmlspecialchars(stripslashes($data['zip'])));
            $phone    = trim(htmlspecialchars(stripslashes($data['phone'])));
            $email    = trim(htmlspecialchars(stripslashes($data['email'])));
            $password = trim(htmlspecialchars(stripslashes(md5($data['password']))));

            $name      = mysqli_real_escape_string($this->db->link, $name);
            $address   = mysqli_real_escape_string($this->db->link, $address);
            $city      = mysqli_real_escape_string($this->db->link, $city);
            $country   = mysqli_real_escape_string($this->db->link, $country);
            $zip       = mysqli_real_escape_string($this->db->link, $zip);
            $phone     = mysqli_real_escape_string($this->db->link, $phone);
            $email     = mysqli_real_escape_string($this->db->link, $email);
            $password  = mysqli_real_escape_string($this->db->link, $password);

            if(empty($name) || empty($address) || empty($city) || empty($country) || empty($zip) || empty($phone) || empty($email) || empty($password) ){
                $msg = "<div class='alert alert-danger'>Feild must not be Empty.!</div>";
                return $msg;
            }else{
                $mailquery = "SELECT * FROM tbl_customer WHERE email='$email'";
                $chkmail = $this->db->select($mailquery);
                if($chkmail == true){
                    $msg = "<div class='alert alert-danger'>Email Address Already Exist.!</div>";
                    return $msg;
                }else{
                    $query = "INSERT INTO tbl_customer (name, address, city, country, zip, phone, email, password) VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$password')";
                    $insert_row = $this->db->insert($query);
                    if($insert_row){
                        $msg = "<div class='alert alert-success'>Customer Registration Successfully.!</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'>Customer Registered.!</div>";
                        return $msg;
                    }
                }
            }
        }
        public function customerLogin($data){
            $email = $this->fm->validation($data['email']);
            $password = $this->fm->validation($data['password']);

            $email = mysqli_real_escape_string($this->db->link, $email);
            $password = mysqli_real_escape_string($this->db->link, $password);

            if(empty($email) || empty($password)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty.!</div>";
                return $msg;
            }else{
                $query = "SELECT * FROM tbl_customer WHERE email='$email' AND password=md5('$password')";
                $selectCus = $this->db->select($query);
                if($selectCus != false){
                    $result = $selectCus->fetch_assoc();
                    Session::set('login', true);
                    Session::set('customerId', $result['customerId']);
                    Session::set('name', $result['name']);
                    Session::set('email', $result['email']);
                    header("location: index.php");
                }else{
                    $msg = "<div class='alert alert-danger'>Email or password not match.!</div>";
                    return $msg;
                }
            }
        }
        public function getCustomerData($customerId){
            $query = "SELECT * FROM tbl_customer WHERE customerId = '$customerId'";
            $result = $this->db->select($query);
            return $result;
        }
        public function customerInfo($data, $customerId){
            $name     = trim(htmlspecialchars(stripslashes($data['name'])));
            $address  = trim(htmlspecialchars(stripslashes($data['address'])));
            $city     = trim(htmlspecialchars(stripslashes($data['city'])));
            $country  = trim(htmlspecialchars(stripslashes($data['country'])));
            $zip      = trim(htmlspecialchars(stripslashes($data['zip'])));
            $phone    = trim(htmlspecialchars(stripslashes($data['phone'])));
            $email    = trim(htmlspecialchars(stripslashes($data['email'])));

            $name      = mysqli_real_escape_string($this->db->link, $name);
            $address   = mysqli_real_escape_string($this->db->link, $address);
            $city      = mysqli_real_escape_string($this->db->link, $city);
            $country   = mysqli_real_escape_string($this->db->link, $country);
            $zip       = mysqli_real_escape_string($this->db->link, $zip);
            $phone     = mysqli_real_escape_string($this->db->link, $phone);
            $email     = mysqli_real_escape_string($this->db->link, $email);

            if(empty($name) || empty($address) || empty($city) || empty($country) || empty($zip) || empty($phone) || empty($email)){
                $msg = "<div class='alert alert-danger'>Feild must not be Empty.!</div>";
                return $msg;
            }else{
                $query = "UPDATE tbl_customer SET 
                            name='$name',
                            address='$address',
                            city='$city',
                            country='$country',
                            zip='$zip',
                            phone='$phone',
                            email='$email'
                            WHERE customerId = '$customerId'";
                $result = $this->db->update($query);
                if($result){
                    $msg = "<div class='alert alert-success'>User Information updated successfully.!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>User Information not updated.!</div>";
                    return $msg;
                }
            }
        }
        public function getCustomerInfo($customerId){
            $query = "SELECT * FROM tbl_customer WHERE customerId='$customerId'";
            $result = $this->db->select($query);
            return $result;
            
        }
        public function updateCustomerPassword($data, $customerId){
            $oldPass    = trim(htmlspecialchars(stripslashes($data['oldPass'])));
            $newPass    = trim(htmlspecialchars(stripslashes($data['newPass'])));

            $oldPass      = mysqli_real_escape_string($this->db->link, $oldPass);
            $newPass      = mysqli_real_escape_string($this->db->link, $newPass);

            if(empty($oldPass) || empty($newPass)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty.!</div>";
                return $msg;
            }else{
                $chk = "SELECT * FROM tbl_customer WHERE password=md5('$oldPass') AND customerId='$customerId'";
                $chek = $this->db->select($chk);
                if($chek != false){
                    $query = "UPDATE tbl_customer SET password=md5('$newPass') WHERE customerId='$customerId'";
                    $result = $this->db->update($query);
                    if($result){
                        $msg = "<div class='alert alert-success'>Changed password successfully.!</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'>Password not changed.!</div>";
                        return $msg;
                    }
                }else{
                    $msg = "<div class='alert alert-danger'>Old password not match.!</div>";
                    return $msg;
                }
            }
        }
        public function contractMessage($data){
            $name    = trim(htmlspecialchars(stripslashes($data['name'])));
            $email    = trim(htmlspecialchars(stripslashes($data['email'])));
            $phone    = trim(htmlspecialchars(stripslashes($data['phone'])));
            $message    = trim(htmlspecialchars(stripslashes($data['message'])));

            $name      = mysqli_real_escape_string($this->db->link, $name);
            $email      = mysqli_real_escape_string($this->db->link, $email);
            $phone      = mysqli_real_escape_string($this->db->link, $phone);
            $message      = mysqli_real_escape_string($this->db->link, $message);

            if(empty($name) || empty($email) || empty($phone) || empty($message)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty.!</div>";
                return $msg;
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $msg = "<div class='alert alert-danger'>Invalid email format.!</div>";
                return $msg;
            }elseif(preg_match("/[^0-9-]+/i",$phone)){
                $msg = "<div class='alert alert-danger'>Invalid Phone no format.!</div>";
                return $msg;
            }elseif(strlen($phone) <= 10){
                $msg = "<div class='alert alert-danger'>Phone no too short.!</div>";
                return $msg;
            }else{
                $query = "INSERT INTO tbl_contract (name, email, phone, message) VALUES ('$name','$email','$phone','$message')";
                $result = $this->db->insert($query);
                if($result){
                    $msg = "<div class='alert alert-success'>Sent message successfully.!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Message not send.!</div>";
                    return $msg;
                }
            }
        }
        public function selectAllContractMessage(){
            $query = "SELECT * FROM tbl_contract WHERE status = 0";
            $result = $this->db->select($query);
            return $result;
        }
        public function selectAllSeenMessage(){
            $query = "SELECT * FROM tbl_contract WHERE status = 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getMessageById($id){
            $query = "SELECT * FROM tbl_contract WHERE id='$id'";
            $result = $this->db->select($query);
            return $result;
        }
        public function seenContractMessage($seenId){
            $query = "UPDATE tbl_contract SET status = '1' WHERE id = '$seenId'";
            $result = $this->db->update($query);
            return $result;
        }
        public function deleteContractMessage($delid){
            $query = "DELETE FROM tbl_contract WHERE id='$delid'";
            $result = $this->db->delete($query);
            if($result){
                $msg = "<div class='alert alert-success'>Delete Message successfully.!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'>Message not Deleted.!</div>";
                    return $msg;
            }
        }
        public function replyMessage($data){
            $to_email = $data['to_email'];
            $form_email = $data['form_email'];
            $subject = $data['subject'];
            $message = $data['message'];
            if(empty($to_email) || empty($form_email) || empty($subject) || empty($message)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty.!</div>";
                return $msg; 
            }elseif(!filter_var($form_email, FILTER_VALIDATE_EMAIL)){
                $msg = "<div class='alert alert-danger'>Invalid Email Format.!</div>";
                return $msg;
            }else{
                $send_mail = mail($to_email,$subject,$message,$form_email);
                if($send_mail){
                    $msg = "<div class='alert alert-success'>Message Send successfully.!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Message not send.!</div>";
                    return $msg;
                }
            }
        }
    }
?>