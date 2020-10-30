<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../lib/Database.php";
    include_once $filepath."/../helpers/Format.php";
?>

<?php
    class Brand{
        
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addBrand($data){
            $brandName = $this->fm->validation($data['brandName']);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if(empty($brandName)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                $query = "INSERT INTO tbl_brand (brandName) VALUES ('$brandName')";
                $insert_cat = $this->db->insert($query);
                if($insert_cat){
                    $msg = "<div class='alert alert-success'>Brand inserted successfully..!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Brand not inserted..!</div>";
                    return $msg;
                }
            }
        }

        public function selectALlBrand(){
            $query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
            $selectBrand = $this->db->select($query);
            return $selectBrand;
        }

        public function selectBrand($editId){
            $editId = $this->fm->validation($editId);
            $editId = mysqli_real_escape_string($this->db->link, $editId);

            $query = "SELECT * FROM tbl_brand WHERE brandId='$editId'";
            $selectCat = $this->db->select($query);
            return $selectCat;
        }
        public function updateBrand($brandName, $editId){
            $brandName = $this->fm->validation($brandName);
            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if(empty($brandName)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$editId';
                ";
                $updateCat = $this->db->update($query);
                if($updateCat){
                    $msg = "<div class='alert alert-success'>Brand updated successfully..!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Brand not updated.!</div>";
                    return $msg;
                }
            }
        }

        public function deleteBrand($delid){
            $delid = $this->fm->validation($delid);
            $delid = mysqli_real_escape_string($this->db->link, $delid);

            $query = "DELETE FROM tbl_brand WHERE brandId='$delid'";
            $deleteCat = $this->db->delete($query);
            if($deleteCat){
                $msg = "<div class='alert alert-success'>Brand Deleted Successfully..!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'>Brand not Deleted..!</div>";
                return $msg;
            }
        }
    }
?>