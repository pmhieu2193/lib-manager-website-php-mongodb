<!DOCTYPE html>
<html lang="vi">
<?php
include("connection.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa sản phẩm</title>
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/addProduct.css">
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <img src="img/loader.gif" class="loader" alt="">
    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <p class="alert-msg">Lỗi</p>
    </div>
    <img src="img/dark-logo.png" class="logo" alt="">

    <?php
    $collection = $database->selectCollection("sach");
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
        $ten_sach = $_POST['name'];
        $so_luong = (int)$_POST['quantity'];
        $mo_ta = $_POST['description'];
        $tac_gia = $_POST['author'];
        $ngon_ngu = $_POST['language'];
        $nam_xuat_ban = $_POST['year'];
        $vi_tri = $_POST['location'];
        $trang_thai_sach = (int)$_POST['status'];
        $ma_rank = (int)$_POST['rank'];
        $ma_the_loai = (int)$_POST['category'];
        $ma_nxb = (int)$_POST['publisher'];
        $ngay_nhap = $_POST['date'];
        $product_id = $_POST['product_id'];
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
        if (empty($product_id)) {
            //Tự động tăng
            $lastProduct = $collection->findOne([], ['sort' => ['ma_sach' => -1]]);
            $lastMaSach = $lastProduct ? $lastProduct['ma_sach'] : 0;
            $maSach = $lastMaSach + 1;
            $data['ma_sach'] = $maSach;
            $result = $collection->insertOne($data);
            if ($result->getInsertedCount() > 0) {
                echo 'Thêm sách thành công!';
            } else {
                echo 'Thêm sách thất bại';
            }
        } else {
            $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($product_id)], ['$set' => $data]);

            if ($result->getModifiedCount() > 0) {
                echo 'Cập nhật sách thành công!';
            } else {
                echo 'Không có sự thay đổi';
            }
        }
        header("Location: admin.php");
        exit;
    }
    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $result = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);
        if ($result) {
    ?>
            <form method="post" enctype="multipart/form-data">
                <input class="text-form" type="text" id="name" name="name" placeholder="Tên Sách" value="<?= $result['ten_sach'] ?>">
                <input class="text-form" type="number" id="quantity" name="quantity" placeholder="Số Lượng" value="<?= $result['so_luong'] ?>">
                <input class="text-form" type="text" id="author" name="author" placeholder="Tác Giả" value="<?= $result['tac_gia'] ?>">
                <input class="text-form" type="text" id="language" name="language" placeholder="Ngôn Ngữ" value="<?= $result['ngon_ngu'] ?>">
                <input class="text-form" type="text" id="year" name="year" placeholder="Năm xuất bản" value="<?= $result['nam_xuat_ban'] ?>">
                <input class="text-form" type="text" id="location" name="location" placeholder="Vị Trí" value="<?= $result['vi_tri'] ?>">
                <input class="text-form" type="text" id="status" name="status" placeholder="Trạng Thái Sách" value="<?= $result['trang_thai_sach'] ?>">
                <input class="text-form" type="text" id="rank" name="rank" placeholder="Mã Rank" value="<?= $result['ma_rank'] ?>">
                <input class="text-form" type="text" id="category" name="category" placeholder="Mã Thể Loại" value="<?= $result['ma_the_loai'] ?>">
                <input class="text-form" type="text" id="publisher" name="publisher" placeholder="Mã Nhà Xuất Bản" value="<?= $result['ma_nxb'] ?>">
                <input type="hidden" name="product_id" value="<?= $product_id ?>">
                <label for="date">Ngày Nhập:</label>
                <input type="date" id="date" name="date" value="<?= $result['ngay_nhap'] ?>" required><br><br>
                <label for="image">Ảnh:</label>
                <input type="file" id="image" name="image" accept="image/*" value="<?= $result['anh_bia'] ?>"><br><br>
                <input type="hidden" name="form_submitted" value="1">
                <input type="submit" value="Cập nhật">
            </form>
        <?php
        } else {
            echo "Không tìm thấy sản phẩm.";
        }
    } else {
        ?>
        <form method="post" enctype="multipart/form-data">
            <input class="text-form" type="text" id="name" name="name" placeholder="Tên Sách" value="">
            <input class="text-form" type="number" id="quantity" name="quantity" placeholder="Số Lượng" value="">
            <input class="text-form" type="text" id="description" name="description" placeholder="Mô Tả" value="">
            <input class="text-form" type="text" id="author" name="author" placeholder="Tác Giả" value="">
            <input class="text-form" type="text" id="language" name="language" placeholder="Ngôn Ngữ" value="">
            <input class="text-form" type="text" id="year" name="year" placeholder="Năm xuất bản" value="">
            <input class="text-form" type="text" id="location" name="location" placeholder="Vị Trí" value="">
            <input class="text-form" type="text" id="status" name="status" placeholder="Trạng Thái Sách" value="">
            <input class="text-form" type="text" id="rank" name="rank" placeholder="Mã Rank" value="">
            <input class="text-form" type="text" id="category" name="category" placeholder="Mã Thể Loại" value="">
            <input class="text-form" type="text" id="publisher" name="publisher" placeholder="Mã Nhà Xuất Bản" value="">
            <label for="date">Ngày Nhập:</label>
            <input type="date" id="date" name="date" required><br><br>
            <label for="image">Ảnh:</label>
            <input type="file" id="image" name="image" accept="image/*"><br><br>
            <input type="hidden" name="form_submitted" value="1">
            <input type="submit" value="Thêm">
        </form>
    <?php
    }
    ?>
    <script src="js/addProduct.js"></script>

</body>

</html>