<!DOCTYPE html>
<html lang="vi">
<?php
include("connection.php");
?>

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

    <div class="nav-space">
        <div class="nav-admin">
            <img src="img/user.png">
            <p class="add-product-title name-admin">Chào mừng Hiếu</p>
            <button class="btn btn-new-product" id="new-product" onclick="location.href='login.html'">Đăng xuất</button>
        </div>
        <p class="add-product-title nav-link" href="publisher.php">quản lý user</p>
    </div>
    <!--products list-->
    <?php
    $collection = $database->selectCollection('sach');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $product_id = $_POST['product_id'];
        $status = $_POST['status'];

        $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($product_id)], ['$set' => ['trang_thai_sach' => $status]]);

        if ($result->getModifiedCount() > 0) {
            echo 'Cập nhật trạng thái thành công!';
        } else {
            echo 'Không có sự thay đổi hoặc không tìm thấy sản phẩm.';
        }
    }
    ?>

    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">quản lý sản phẩm</p>
            <a href="editProduct.php"><button class="btn btn-new-product" id="new-product">&#43; Thêm sản phẩm</button></a>
        </div>
        <img src="img/no-products.png" class="no-product-image hide" alt="">

        <?php
        $collection = $database->selectCollection('sach');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
            $product_id = $_POST['product_id'];
            $status = (int)$_POST['status'];

            // Thực hiện cập nhật trạng thái sách trong collection
            $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($product_id)], ['$set' => ['trang_thai_sach' => $status]]);

            if ($result->getModifiedCount() > 0) {
                echo 'Cập nhật trạng thái sách thành công!';
            } else {
                echo 'Không có sự thay đổi hoặc không tìm thấy sản phẩm.';
            }

            exit;
        }
        $result = $collection->find([]);
        echo '<div class="product-container">';
        foreach ($result as $document) {
            echo '<div class="product-card">';
            echo '<div class="product-image">';
            echo '<span class="tag">Chỉnh sửa</span>';
            echo '<img src="' . $document->anh_bia . '" class="product-thumb" alt="">';
            echo '<button class="amount-product">Số lượng: 20</button>';
            echo '<a href="editProduct.php?id=' . $document['_id'] . '" class="card-action-btn edit-btn"><img src="img/edit.png" alt=""></a>';
            echo '<button type="button" class="card-action-btn delete-popup-btn" onclick="showPopup(\'' . $document['_id'] . '\')"><img src="img/delete.png" alt=""></button>            ';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h2 class="product-brand">' . $document->ten_sach . '</h2>';
            echo '<p class="product-short-des">' . $document->so_luong . '</p>';
            echo '<p class="product-short-des">' . $document->ngay_nhap . '</p>';
            echo '<p class="product-short-des">' . $document->tac_gia . '</p>';
            echo '<p class="product-short-des">' . $document->ngon_ngu . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <!-- Nội dung popup ở đây -->
            <button id="hideButton" class="close-btn">Ẩn</button>
            <button id="showButton" class="close-btn">Hiển thị</button>
            <button id="closePopup" class="close-btn">Đóng</button>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>