<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../lib/Database.php";
    include_once $filepath."/../helpers/Format.php";
?>

<?php
    class Category{
        
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addCategory($data){
            $catName = $this->fm->validation($data['catName']);
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                $query = "INSERT INTO tbl_category (catName) VALUES ('$catName')";
                $insert_cat = $this->db->insert($query);
                if($insert_cat){
                    $msg = "<div class='alert alert-success'>Category inserted successfully..!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Category not inserted..!</div>";
                    return $msg;
                }
            }
        }

        public function selectALlCat(){
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $selectCat = $this->db->select($query);
            return $selectCat;
        }

        public function selectCategory($editId){
            $editId = $this->fm->validation($editId);
            $editId = mysqli_real_escape_string($this->db->link, $editId);

            $query = "SELECT * FROM tbl_category WHERE catId='$editId'";
            $selectCat = $this->db->select($query);
            return $selectCat;
        }
        public function updateCategory($catName ,$editId){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$editId';
                ";
                $updateCat = $this->db->update($query);
                if($updateCat){
                    $msg = "<div class='alert alert-success'>Category updated successfully..!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Category not updated.!</div>";
                    return $msg;
                }
            }
        }

        public function deleteCategory($delid){
            $delid = $this->fm->validation($delid);
            $delid = mysqli_real_escape_string($this->db->link, $delid);

            $query = "DELETE FROM tbl_category WHERE catId='$delid'";
            $deleteCat = $this->db->delete($query);
            if($deleteCat){
                $msg = "<div class='alert alert-success'>Category Deleted Successfully..!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'>Category not Deleted..!</div>";
                return $msg;
            }
        }
        public function getCategory($catId){
            $query = "SELECT * FROM tbl_category WHERE catId = '$catId'";
            $getCat = $this->db->select($query);
            return $getCat;
        }
    }
?>