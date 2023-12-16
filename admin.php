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
    <?php
    include("navadmin.php");
    ?>
    <div class="box">
        <div class="search">
            <form class="form-search" action="admin.php" method="GET" accept-charset="UTF-8">
                <input class="search-input" type="text" name="timkiem" placeholder="Tìm sách">
                <input type="submit" value="Tìm kiếm" class="search-btn">
            </form>
        </div>
    </div>

    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">Quảng lý Sách</p>
            <a href="editProduct.php"><button class="btn btn-new-product" id="new-product">&#43; Thêm Sách </button></a>
        </div>
        <img src="img/no-products.png" class="no-product-image hide" alt="">

        <?php
        $collection = $database->selectCollection('sach');
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
            $product_id = $_POST['product_id'];
            $status = (int)$_POST['status'];

            $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($product_id)], ['$set' => ['trang_thai_sach' => $status]]);

            if ($result->getModifiedCount() > 0) {
                echo 'Cập nhật trạng thái sách thành công!';
            } else {
                echo 'Không có sự thay đổi hoặc không tìm thấy sản phẩm.';
            }
            exit;
        }
        $searchTerm = '';
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['timkiem'])) {
            $timKiem = $_GET['timkiem'];
            $searchTerm = $timKiem;
            if (!empty($timKiem)) {
                $escapedTerm = preg_quote($timKiem, '/');
                $regexPattern = new \MongoDB\BSON\Regex($escapedTerm, 'i');
                $result = $collection->find(['ten_sach' => ['$regex' => $regexPattern->getPattern(), '$options' => $regexPattern->getFlags()]]);
            } else {
                echo 'Vui lòng nhập từ khóa tìm kiếm.';
                $result = $collection->find([]);
            }
        } else {
            $result = $collection->find([]);
        }
        if (!empty($searchTerm)) {
            echo '<p class="search-tearm">Kết quả tìm kiếm: ' . htmlspecialchars($searchTerm) . '</p>';
        }
        echo '<div class="product-container2">';
        foreach ($result as $document) {
            echo '<div class="product-card2">';
            echo '<div class="product-image">';
            $status_text = ($document->trang_thai_sach == 0) ? 'Ẩn' : 'Hiển Thị';
            echo '<span class="tag">' . $status_text . '</span>';

            echo '<img src="' . $document->anh_bia . '" class="product-thumb" alt="">';
            echo '<button class="amount-product">Số Lượng: ' . $document->so_luong . '</button>';
            echo '<a href="editProduct.php?id=' . $document['_id'] . '" class="card-action-btn edit-btn"><img class="img-edit" src="img/edit.png" alt=""></a>';
            echo '<button class="card-action-btn open-btn" onclick="showPopup(\'' . $document['_id'] . '\')"><img src="img/open.png" alt=""></button>';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h2 class="book-brand">' . $document->ten_sach . '</h2>';
            echo '<p class="product-short-des2">Tác giả: ' . $document->tac_gia . '</p>';
            echo '<p class="product-short-des2">Ngôn ngữ: ' . $document->ngon_ngu . '</p>';
            echo '<p class="product-short-des2">Nhà Xuất Bản: ' . $document->ma_nxb . '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        ?>
        


    </div>
    <div id="overlay" class="overlay">
        <div id="popup" class="popup">
            <!-- Nội dung popup ở đây -->
            <h3 style="margin-bottom: 20px;">Bạn có muốn Ẩn/Hiện Sách?</h3>
            <div class="hero-popup">
                <div class="item-popup">
                    <button id="hideButton" class="close-btn2">Ẩn</button>
                    <button id="showButton" class="close-btn">Hiện</button>
                </div>
                <div>
                    <button id="closePopup" class="close-btn3">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/admin.js"></script>
</body>

</html>