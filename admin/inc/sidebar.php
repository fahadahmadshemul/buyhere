<style>
.subside2, .subside3, subside4, subside5{
    display: none;
}
.active{
    display: block;
}
ul.subside2 li, ul.subside3 li, ul.subside4 li, ul.subside5 li {
    background: #032e42;
}

ul.subside2 li a, ul.subside3 li a, ul.subside4 li a, ul.subside5 li a {
    font-size: 14px!important;
    line-height: 40px!important;
}
</style>
<div class="slidebar fixed">
		<header class="">Admin Panel</header>
		<ul class="mainside">
			<li><a href="index.php"><i class="fas fa-qrcode"></i>Dashboard</a></li>
            <li class="dropSubside1"><a href="#" ><i class="fas fa-stream"></i>Category Option<i class="fas fa-caret-down dropIcon"></i></a></li>
            <ul class="subside1">
                <li><a href="addcat.php"><i class="far fa-dot-circle"></i>Add Category</a></li>
                <li><a href="catlist.php"><i class="far fa-dot-circle"></i>Category List</a></li>
            </ul>
			<li class="dropSubside2"><a href="#" ><i class="fas fa-stream"></i>Brand Option<i class="fas fa-caret-down dropIcon"></i></a></li>
            <ul class="subside2">
                <li><a href="addBrand.php"><i class="far fa-dot-circle"></i>Add Brand</a></li>
                <li><a href="brandlist.php"><i class="far fa-dot-circle"></i>Brand List</a></li>
            </ul>
			<li class="dropSubside3"><a href="#" ><i class="fas fa-stream"></i>Product Option<i class="fas fa-caret-down dropIcon"></i></a></li>
            <ul class="subside3">
                <li><a href="addProduct.php"><i class="far fa-dot-circle"></i>Add Product</a></li>
                <li><a href="productList.php"><i class="far fa-dot-circle"></i>Product List</a></li>
            </ul>
            
		</ul>
	</div>