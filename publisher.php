<!DOCTYPE html>
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
    <div class="nav-space">
        <div class="nav-admin">
            <img src="img/user.png">
            <p class="add-product-title name-admin">Chào mừng Hiếu</p>
            <button class="btn btn-new-product" id="new-product" onclick="location.href='login.html'">Đăng xuất</button>
        </div>
        <p class="add-product-title nav-link" onclick="location.href='admin.php'">quản lý sản phẩm</p>
        <p class="add-product-title nav-link" onclick="location.href='user.html'">quản lý user</p>
        <p class="add-product-title nav-link" onclick="location.href='order.html'">quản lý đơn hàng</p>
        <p class="add-product-title nav-link" onclick="location.href='report.html'">báo cáo</p>
        <p class="add-product-title nav-link" onclick="location.href='orderdetail.html'">xem đơn chi tiết</p>
    </div>
    <!--products list-->
    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">quản lý user</p>
            <button class="btn btn-new-product" id="new-user" onclick="location.href='addProduct.html'">	&#43; thêm user</button>
        </div>
        <div class="box">
            <select class="select">
                <option>hiển thị: 10 user</option>
                <option>hiển thị: 20 user</option>
                <option>hiển thị: 30 user</option>
                <option>hiển thị tất cả</option>
            </select>
            <select class="select">
                <option>Phân loại: Tất cả user</option>
                <option>Staff</option>
                <option>Administrator</option>
                <option>Encoder</option>
                <option>Uploader</option>
                <option>Mới thêm gần đây</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm...">
                <button class="search-btn">&#9906; Tìm kiếm</button>                       
            </div>
        </div>
        <div class="small-container oder-page">
            <table>
                <tr>
                    <th>Tên tài khoản</th>
                    <th>Tên người dùng</th>
                    <th>Quyền hạn</th>
                    <th class="table-btn-zone">Hành động</th>
                </tr>
                <tr>
                    <td><a>happynewyear2023</a>
                    <td><a>Trần Dần</a>
                    <td><p style="color: red">Administrator</p></td>
                    <td><button class="confirm-btn">chỉnh sửa</button><button class="canceled-btn">xoá</button></td>
                </tr>
            </div>
        </table>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>