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
        <p class="add-product-title nav-link" onclick="location.href='admin.html'">quản lý sản phẩm</p>
        <p class="add-product-title nav-link" onclick="location.href='user.html'">quản lý user</p>
        <p class="add-product-title nav-link" onclick="location.href='order.html'">quản lý đơn hàng</p>
        <p class="add-product-title nav-link" onclick="location.href='report.html'">báo cáo</p>
        <p class="add-product-title nav-link" onclick="location.href='orderdetail.html'">xem đơn chi tiết</p>
    </div>
    <!--products list-->
    <?php
    $collection = $database->selectCollection("sach");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
        // Lấy dữ liệu từ form
        $ten_sach = $_POST['name'];
        $so_luong = (int)$_POST['quantity'];
        $mo_ta = $_POST['description'];
        $tac_gia = $_POST['author'];
        $ngon_ngu = $_POST['language'];
        $nam_xuat_ban = $_POST['year'];
        $vi_tri = $_POST['location'];
        $trang_thai_sach = $_POST['status'];
        $ma_rank = $_POST['rank'];
        $ma_the_loai = $_POST['category'];
        $ma_nxb = $_POST['publisher'];
        $ngay_nhap = $_POST['date'];

        $anh_bia = "http://localhost/lib-manager-website-php-mongodb/img/" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "C:/xampp/htdocs/lib-manager-website-php-mongodb/img/" . $_FILES['image']['name']);


        $data = [
            'ten_sach' => $ten_sach,
            'so_luong' => $so_luong,
            'mo_ta' => $mo_ta,
            'tac_gia' => $tac_gia,
            'ngon_ngu' => $ngon_ngu,
            'nam_xuat_ban' => $nam_xuat_ban,
            'vi_tri' => $vi_tri,
            'trang_thai_sach' => $trang_thai_sach,
            'ma_rank' => $ma_rank,
            'ma_the_loai' => $ma_the_loai,
            'ma_nxb' => $ma_nxb,
            'ngay_nhap' => new MongoDB\BSON\UTCDateTime(strtotime($ngay_nhap) * 1000),
            'anh_bia' => $anh_bia,
        ];

        // Chèn dữ liệu vào collection
        if ($result = $collection->insertOne($data) > 0) {
            echo 'Thêm sách thành công!';
        } else {
            echo "Thêm sách thất bại";
        }

        header("Location: admin.php");
        exit;
    }
    ?>
    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">quản lý sản phẩm</p>
            <button class="btn btn-new-product" id="new-product" onclick="openForm()">&#43; Thêm sản phẩm</button>
            <!-- Thêm -->
            <div class="popup-form" id="popup-form">
                <h2>Thêm sản phẩm</h2>
                <button class="close-but" onclick="closeForm()">X</button>
                <form class="form-hero" method="post" enctype="multipart/form-data">
                    <div class="form-admin1">
                        <label for="name">Tên sách:</label>
                        <input class="text-form" type="text" id="name" name="name" required><br><br>

                        <label for="quantity">Số lượng:</label>
                        <input class="text-form" type="number" id="quantity" name="quantity" required><br><br>

                        <label for="description">Mô tả:</label>
                        <input class="text-form" type="text" id="description" name="description" required><br><br>

                        <label for="author">Tác giả:</label>
                        <input class="text-form" class="text-form" type="text" id="author" name="author" required><br><br>

                        <label for="language">Ngôn ngữ:</label>
                        <input class="text-form" type="text" id="language" name="language" required><br><br>

                        <label for="year">Năm xuất bản:</label>
                        <input class="text-form" type="text" id="year" name="year" required><br><br>
                    </div>
                    <div class="form-admin2">
                        <label for="location">Vị trí:</label>
                        <input class="text-form" type="text" id="location" name="location" required><br><br>

                        <label for="status">Trạng thái sách:</label>
                        <input class="text-form" type="text" id="status" name="status" required><br><br>

                        <label for="rank">Mã rank:</label>
                        <input class="text-form" type="text" id="rank" name="rank" required><br><br>

                        <label for="category">Mã thể loại:</label>
                        <input class="text-form" type="text" id="category" name="category" required><br><br>

                        <label for="publisher">Mã nhà xuất bản:</label>
                        <input class="text-form" type="text" id="publisher" name="publisher" required><br><br>

                        <label for="date">Ngày Nhập:</label>
                        <input type="date" id="date" name="date" required><br><br>

                        <label for="image">Ảnh:</label>
                        <input type="file" id="image" name="image" accept="image/*"><br><br>
                        <input type="hidden" name="form_submitted" value="1">
                        <input type="submit" value="Thêm">
                    </div>
                </form>
            </div>

        </div>
        <img src="img/no-products.png" class="no-product-image hide" alt="">
        <!-- card -->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Xử lý dữ liệu khi form được submit
            $updatedData = array(
                'ten_sach' => $_POST['name2'],
                'so_luong' => intval($_POST['quantity2']),
                'mo_ta' => $_POST['description2'],
                'tac_gia' => $_POST['author2'],
                'ngon_ngu' => $_POST['language2'],
                'nam_xuat_ban' => $_POST['year2'],
                'vi_tri' => $_POST['location2'],
                'trang_thai_sach' => intval($_POST['status2']),
                'ma_rank' => intval($_POST['rank2']),
                'ma_the_loai' => intval($_POST['category2']),
                'ma_nxb' => intval($_POST['publisher2']),
                'ngay_nhap' => new MongoDB\BSON\UTCDateTime(strtotime($_POST['date2']) * 1000),
            );
            
            if (!empty($_FILES['image2']['name'])) {
                $newImageName = $_FILES['image2']['name'];
                $newImagePath = "C:/xampp/htdocs/lib-manager-website-php-mongodb/img/" . $newImageName;
                move_uploaded_file($_FILES['image2']['tmp_name'], $newImagePath);
                $updatedData['anh_bia'] = "http://localhost/lib-manager-website-php-mongodb/img/" . $newImageName;
            }
            
            $filter = array('_id' => new MongoDB\BSON\ObjectId($_POST['document_id']));
            $updateResult = $collection->updateOne($filter, ['$set' => $updatedData]);

            
            if ($updateResult->getModifiedCount() > 0) {
                echo "Cập nhật thành công!";
            } else {
                echo "Không có sự thay đổi trong dữ liệu.";
            }
        }

        
        $collection = $database->selectCollection('sach');
        $result = $collection->find([]);
        echo '<div class="product-container">';
        foreach ($result as $document) {
            echo '<div class="product-card">';
            echo '<div class="product-image">';
            echo '<span class="tag">Chỉnh sửa</span>';
            echo '<img src="' . $document->anh_bia . '" class="product-thumb" alt="">';
            echo '<button class="amount-product">Số lượng: 20</button>';
            echo '<button class="card-action-btn edit-btn" onclick="openForm2(\'' . (string)$document->_id . '\')"><img src="img/edit.png" alt=""></button>';
            echo '<button class="card-action-btn open-btn"><img src="img/open.png" alt=""></button>';
            echo '<button class="card-action-btn delete-popup-btn" onclick="openForm3(\'' . (string)$document->_id . '\')"><img src="img/delete.png" alt=""></button>';
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
    <div class="popup-form" id="popup-form2">
        <h2>Sửa sản phẩm</h2>
        <button class="close-but" onclick="closeForm2()">X</button>
        <form class="form-hero" method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" id="document_id" name="document_id" value="">

            <div class="form-admin1">
                <label for="name">Tên sách:</label>
                <input class="text-form" type="text" id="name2" name="name2" required><br><br>

                <label for="quantity">Số lượng:</label>
                <input class="text-form" type="number" id="quantity2" name="quantity2" required><br><br>

                <label for="description">Mô tả:</label>
                <input class="text-form" type="text" id="description2" name="description2" required><br><br>

                <label for="author">Tác giả:</label>
                <input class="text-form" class="text-form" type="text" id="author2" name="author2" required><br><br>

                <label for="language">Ngôn ngữ:</label>
                <input class="text-form" type="text" id="language2" name="language2" required><br><br>

                <label for="year">Năm xuất bản:</label>
                <input class="text-form" type="text" id="year2" name="year2" required><br><br>
            </div>
            <div class="form-admin2">
                <label for="location">Vị trí:</label>
                <input class="text-form" type="text" id="location2" name="location2" required><br><br>

                <label for="status">Trạng thái sách:</label>
                <input class="text-form" type="text" id="status2" name="status2" required><br><br>

                <label for="rank">Mã rank:</label>
                <input class="text-form" type="text" id="rank2" name="rank2" required><br><br>

                <label for="category">Mã thể loại:</label>
                <input class="text-form" type="text" id="category2" name="category2" required><br><br>

                <label for="publisher">Mã nhà xuất bản:</label>
                <input class="text-form" type="text" id="publisher2" name="publisher2" required><br><br>

                <label for="date">Ngày Nhập:</label>
                <input type="date" id="date2" name="date2" required><br><br>

                <label for="image">Ảnh:</label>
                <input type="file" id="image2" name="image2" accept="image/*" required><br><br>

                <input type="submit" value="Update">
            </div>
        </form>
    </div>


<div class="popup-form" id="popup-form3">
    <h2>Ẩn/Hiện Sản Phẩm</h2>
    <button class="close-but" onclick="closeForm3()">X</button>
    <form class="form-hero" method="POST" action="admin.php">
        <input type="hidden" id="document_id" name="document_id" value="">
        <p>Bạn có muốn ẩn/hiện sách?</p>
        <input type="submit" name="hide_show_submit" value="Ẩn/Hiện">
    </form>
</div>


    <script src="js/admin.js"></script>
</body>

</html>