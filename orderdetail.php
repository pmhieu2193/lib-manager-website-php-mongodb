<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/cart.css">
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
    <?php
    include("navadmin.php");
    ?>

    <div class="list-orderdetail">
        <div class="add-product">
            <p class="add-product-title">Chi tiết đơn hàng #99</p>
            <button class="btn btn1 btn-new-product"><img src="img/print.png"></button>
        </div>
        <div class="info-ordered">
            <div class="info-order">
                <h3>Thông tin yêu cầu mượn</h3>
                <p>Mã yêu cầu: #99</p>
                <p>Thời gian tạo: 12/12/2022 15:04:59</p>
                <p>Trạng thái yêu cầu: đã được duyệt</p>
                <p>Trạng thái trả:<span style="color: green"> Đã trả hết</span></p>
            </div>
            <div class="info-order">
                <h3>Thông tin người mượn</h3>
                <p>Mai An Tiêm</p>
                <p>Số điện thoại: 233380774</p>
                <p>cccd: 56133</p>
                <p>Địa chỉ:</p>
                <p>01, An Dương Vương, p, Quận 8, Hồ Chí Minh</p>
                <p>level: gà</p>
            </div>
            <div class="info-order">
                <h3>Hành động</h3>
                <p>BẠN: Chào Mừng Hiếu <span class="link-text">Role: ADMIN</span></p>
                <p>Ghi chú: không có</p>
                <p>Vui lòng xác nhận yêu cầu mượn: <button class="confirmed-btn">Đã Xác nhận</button></p> <button class="confirmed-btn">Đã từ chối, demo</button></p>
            </div>
        </div>
        <div class="info-ship">
            <p>&#8226; Tất cả sách đã được kiểm tra</p>
            <p>&#8226; Đã mượn thành công</p>
        </div>
        <div class="small-container cart-page">
            <table>
                <tr>
                    <th>Sản phẩm</th>
                    <th class="number-pro">Tình trạng</th>
                    <th class="cost">Hạn trả</th>
                    <th class="cost">Trạng thái</th>
                </tr>
                <tr>
                    <td>
                        <div class="cart-info">
                            <img src="img/card1.png">
                            <div>
                                <h3>Tên sản phẩm</h3>
                                <small>mô tả sp</small>
                            </div>
                        </div>
                    <td><input type="text"></td>
                    <td>11-12-2023</td>
                    <td>Đã trễ hạn</td>
                </tr>
            </div>
        </table>
    </div>
</body>
</html>