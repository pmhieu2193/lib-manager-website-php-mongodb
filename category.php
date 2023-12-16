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
            <p class="add-product-title">Quản lý Thể Loại Sách</p>
            <a href="editCategory.php"><button class="btn btn-new-product" id="new-user">&#43;Thêm Thể Loại</button></a>
        </div>
        <div class="box">
            <div class="search">
                <input type="text" placeholder="Tìm kiếm...">
                <button class="search-btn">&#9906; Tìm kiếm</button>
            </div>
        </div>
        <div class="small-container oder-page">
            <table>
                <tr>
                    <th>Mã Thể Loại</th>
                    <th>Thể Loại Sách</th>
                    <th class="table-btn-zone">Hành động</th>
                </tr>
                <?php
                $collection = $database->selectCollection('the_loai');
                $result = $collection->find([]);

                foreach ($result as $document) {
                    echo '<tr>';
                    echo '<td><a>' . $document->ma_the_loai . '</a></td>';
                    echo '<td><a>' . $document->ten_the_loai . '</a></td>';
                    echo '<td><a href="editCategory.php?id=' . $document->_id . '" class="confirm-btn">chỉnh sửa</a>';
                ?>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="delete_id" value="<?= $document->_id ?>">
                        <button type="submit" class="canceled-btn" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">xoá</button>
                    </form>
                <?php
                    echo '</td>';
                    echo '</tr>';
                }
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
                    $delete_id = $_POST['delete_id'];
                    $result = $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($delete_id)]);

                    if ($result->getDeletedCount() > 0) {
                        echo 'Xóa thể loại';
                    } else {
                        echo 'error';
                    }
                    header("Location: category.php");
                    exit;
                }
                ?>

        </div>
        </table>
    </div>

    <script src="js/admin.js"></script>
</body>

</html>