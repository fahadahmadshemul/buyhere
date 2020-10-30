<?php
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/../lib/Database.php";
    include_once $filepath."/../helpers/Format.php";
?>

<?php
    class Product{
        
        private $db;
        private $fm;

        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function addProduct($data, $file){
            $productName = $this->fm->validation($data['productName']);
            $catId       = $this->fm->validation($data['catId']);
            $brandId     = $this->fm->validation($data['brandId']);
            $body        = $this->fm->validation($data['body']);
            $price       = $this->fm->validation($data['price']);
            $type        = $this->fm->validation($data['type']);
            
            $productName = mysqli_real_escape_string($this->db->link, $productName);
            $catId       = mysqli_real_escape_string($this->db->link, $catId);
            $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
            $body        = mysqli_real_escape_string($this->db->link, $body);
            $price       = mysqli_real_escape_string($this->db->link, $price);
            $type        = mysqli_real_escape_string($this->db->link, $type);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_tmp = $file['image']['tmp_name'];
			
			$div = explode(".", $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName == "" || $catId =="" || $brandId == "" || $body == "" || $price == "" || $type == ""){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }elseif($file_size > 2097152){
                $msg = "<div class='alert alert-danger'>Image size should be less than 2Mb..!</div>";
                return $msg;
            }elseif(in_array($file_ext, $permited) == false){
                $msg = "<div class='alert alert-danger'>You can upload only".implode(',', $permited)."..!</div>";
                return $msg;
            }else{
                move_uploaded_file($file_tmp, $uploaded_image);
                $query = "INSERT INTO tbl_product (productName, catId, brandId, body, price, image, type) VALUES ('$productName','$catId', '$brandId','$body', '$price', '$uploaded_image', '$type')";
                $insert_product = $this->db->insert($query);
                if($insert_product){
                    $msg = "<div class='alert alert-success'>Product inserted successfully..!</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'>Product not inserted..!</div>";
                    return $msg;
                }
            }
        }

        public function selectAllProduct(){
            $query = "SELECT p.*,c.catName,b.brandName FROM tbl_product as p,tbl_category as c,tbl_brand as b WHERE p.catId=c.catId AND p.brandId=b.brandId  ORDER BY productId DESC";
            $selectPro = $this->db->select($query);
            return $selectPro;
        }
        public function getProductById($editId){
            $query = "SELECT * FROM tbl_product WHERE productId = '$editId'";
            $selectpro = $this->db->select($query);
            return $selectpro;
        }
        

        public function getBagProduct(){
            $query = "SELECT * FROM tbl_product WHERE catId = '2' ORDER BY productId DESC";
            $selectCamera = $this->db->select($query);
            return $selectCamera;
        }
        public function getClothProduct(){
            $query = "SELECT * FROM tbl_product WHERE catId = '3' ORDER BY productId DESC";
            $selectCloth = $this->db->select($query);
            return $selectCloth;
        }
        public function getWatch(){
            $query = "SELECT * FROM tbl_product WHERE catId = '4' ORDER BY productId DESC";
            $selectWatch = $this->db->select($query);
            return $selectWatch;
        }
        public function getCamera1(){
            $query = "SELECT * FROM tbl_product WHERE catId='1' LIMIT 1,4";
            $getCamera = $this->db->select($query);
            return $getCamera;
        }
        public function getCamera2(){
            $query = "SELECT * FROM tbl_product WHERE catId='1' LIMIT 5,4";
            $getCamera = $this->db->select($query);
            return $getCamera;
        }

        public function getCamera3(){
            $query = "SELECT * FROM tbl_product WHERE catId='1' LIMIT 6,4";
            $getCamera = $this->db->select($query);
            return $getCamera;
        }

        public function getSingleProduct($productId){
            $productId = $this->fm->validation($productId);

            $productId = mysqli_real_escape_string($this->db->link, $productId);

            $query = "SELECT p.*,c.catName,b.brandName FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.catId AND p.brandId=b.brandId AND p.productId='$productId'";
            $selectSingleProduct = $this->db->select($query);
            return $selectSingleProduct;
        }
        public function getProductByCategory($catId){
            $query = "SELECT * FROM tbl_product WHERE catId = '$catId'";
            $get = $this->db->select($query);
            return $get;
        }
        public function getfeatureProduct(){
            $query = "SELECT * FROM tbl_product WHERE type = 0";
            $get = $this->db->select($query);
            return $get;
        }
        public function getCanonProduct(){
            $query = "SELECT * FROM tbl_product WHERE brandId=6 ORDER BY productId DESC LIMIT 1,3";
            $get = $this->db->select($query);
            return $get;
        }
        public function getRolexProduct(){
            $query = "SELECT * FROM tbl_product WHERE brandId=4 ORDER BY productId DESC LIMIT 1,3";
            $get = $this->db->select($query);
            return $get;
        }
        public function getAdidasProduct(){
            $query = "SELECT * FROM tbl_product WHERE brandId=5 ORDER BY productId DESC LIMIT 1,3";
            $get = $this->db->select($query);
            return $get;
        }
        public function getSamsungProduct(){
            $query = "SELECT * FROM tbl_product WHERE brandId=1 ORDER BY productId DESC LIMIT 1,3";
            $get = $this->db->select($query);
            return $get;
        }
        public function updateProductById($data, $file, $editId){

            $productName = $this->fm->validation($data['productName']);
            $catId       = $this->fm->validation($data['catId']);
            $brandId     = $this->fm->validation($data['brandId']);
            $body        = $this->fm->validation($data['body']);
            $price       = $this->fm->validation($data['price']);
            $type        = $this->fm->validation($data['type']);
            
            $productName = mysqli_real_escape_string($this->db->link, $productName);
            $catId       = mysqli_real_escape_string($this->db->link, $catId);
            $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
            $body        = mysqli_real_escape_string($this->db->link, $body);
            $price       = mysqli_real_escape_string($this->db->link, $price);
            $type        = mysqli_real_escape_string($this->db->link, $type);

            $permited = array('jpg', 'jpeg', 'png', 'gif');
			$file_name = $file['image']['name'];
			$file_size = $file['image']['size'];
			$file_tmp = $file['image']['tmp_name'];
			
			$div = explode(".", $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName == "" || $catId =="" || $brandId == "" || $body == "" || $price == "" || $type == ""){
                $msg = "<div class='alert alert-danger'>Feild must not be empty..!</div>";
                return $msg;
            }else{
                if(!empty($file_name)){
                    move_uploaded_file($file_tmp, $uploaded_image);
                    $query ="UPDATE tbl_product
                            SET
                            productName    = '$productName',
                            catId  = '$catId',
                            body   = '$body',
                            price = '$price',
                            image   = '$uploaded_image',
                            type = '$type'
                    WHERE productId='$editId'";
                    $updated_row = $this->db->update($query);
                    if($updated_row){
                        $msg = "<div class='alert alert-success'>Updated product successfully..!</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'>Product not updated..!</div>";
                        return $msg;
                    }
                }else{
                    $query ="UPDATE tbl_product
                            SET
                            productName    = '$productName',
                            catId  = '$catId',
                            body   = '$body',
                            price = '$price',
                            type = '$type'
                    WHERE productId='$editId'";
                    $updated_row = $this->db->update($query);
                    if($updated_row){
                        $msg = "<div class='alert alert-success'>Updated product successfully..!</div>";
                        return $msg;
                    }else{
                        $msg = "<div class='alert alert-danger'>Product not updated..!</div>";
                        return $msg;
                    }
                }
            }
        }
        public function deleteProduct($delid){
            $query = "SELECT * FROM tbl_product WHERE productId='$delid'";
            $getData = $this->db->select($query);
            if($getData){
                while($delImg = $getData->fetch_assoc()){
                    $dellink = $delImg['image'];
                    unlink($dellink);
                }
            }
            $delquery = "DELETE FROM `tbl_product` WHERE `productId`='$delid';";
            $delPro = $this->db->delete($delquery);
            if($delPro){
                $msg = "<div class='alert alert-success'>Delete product successfully..!</div>";
                return $msg;
            }else{
                $msg = "<div class='alert alert-danger'>Product not Deleted..!</div>";
                return $msg;
            }
        }
        public function serchProduct($search){
            $query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' OR body LIKE '%$search%'";
            $result = $this->db->select($query);
            return $result;
        }
        public function selectProductById($productId){
            $query = "SELECT * FROM tbl_product WHERE productId='$productId'";
            $result = $this->db->select($query);
            return $result;
        }
    }1031363771
?>
