﻿<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
    <img src="img/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <p class="alert-msg">Thông báo lỗi</p>
    </div>
    <img src="img/dark-logo.png" class="logo" alt="">

    <!--become seller element-->
    <!--apply form-->
    <?php include("navadmin.php") ?>
    <!--products list-->
    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">quản lý sản phẩm</p>
            <button class="btn btn-new-product" id="new-product" onclick="location.href='addProduct.html'">	&#43; thêm sản phẩm</button>
        </div>
        <div class="box">
            <select class="select">
                <option>Xếp theo: mới nhất</option>
                <option>cũ nhất</option>
                <option>Số lượng</option>
                <option>Thương hiệu</option>
                <option>Loại</option>
                <option>Giá từ thấp đến cao</option>
                <option>Giá từ cao đến thấp</option>
            </select>
            <select class="select">
                <option>Lọc: hiển thị tất cả</option>
                <option>hiển thị: Man Armor</option>
                <option>hiển thị: WomanArmor</option>
                <option>hiển thị: Trang bị</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm...">
                <button class="search-btn">&#9906; Tìm kiếm</button>                       
            </div>
        </div>
        <img src="img/no-products.png" class="no-product-image hide" alt="">
        <!-- card -->
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="tag">chỉnh sửa</span>
                    <img src="img/pro1.png" class="product-thumb" alt="">
                    <button class="amount-product">Số lượng: 20</button>
                    <button class="card-action-btn edit-btn" onclick="location.href='editProduct.html'"><img src="img/edit.png" alt=""></button>
                    <button class="card-action-btn open-btn" onclick="location.href='editProduct.html'"><img src="img/open.png" alt=""></button>
                    <button class="card-action-btn delete-popup-btn"><img src="img/delete.png" alt=""></button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Sister of Battle Power Armor</h2>
                    <p class="product-short-des">Power Armor</p>
                    <span class="price">280.000₫</span><span class="actual-price">350.000₫</span>
                    <p class="product-short-des">Ngày tạo: 22/11/2022</p>
                    <p class="product-short-des">Ngày cập nhật: 22/11/2022</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>