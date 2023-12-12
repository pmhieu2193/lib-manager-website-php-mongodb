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
    $collection = $database->selectCollection("nha_xuat_ban");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
        $ten_nxb = $_POST['name'];
        $dia_chi_nxb = $_POST['address'];
        $sdt_nxb = $_POST['phone'];

        $data = [
            'ten_nxb' => $ten_nxb,
            'dia_chi_nxb' => $dia_chi_nxb,
            'sdt_nxb' => $sdt_nxb,
        ];

        $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : null;

        if (empty($product_id)) {
            //tự động tăng
            $lastPublisher = $collection->findOne([], ['sort' => ['ma_nxb' => -1]]);
            $lastMaNXB = $lastPublisher ? $lastPublisher['ma_nxb'] : 0;
            $maNXB = $lastMaNXB + 1;
            $data['ma_nxb'] = $maNXB;
            $result = $collection->insertOne($data);
            if ($result->getInsertedCount() > 0) {
                echo 'Thêm nhà xuất bản thành công!';
            } else {
                echo 'Thêm nhà xuất bản thất bại';
            }
        } else {
            $result = $collection->updateOne(['_id' => new MongoDB\BSON\ObjectID($product_id)], ['$set' => $data]);

            if ($result->getModifiedCount() > 0) {
                echo 'Cập nhật nhà xuất bản thành công!';
            } else {
                echo 'Không có sự thay đổi.';
            }
        }
        // Điều hướng sau khi xử lý form
        header("Location: publisher.php");
        exit;
    }

    if (isset($_GET['id'])) {
        $product_id = $_GET['id'];
        $result = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($product_id)]);
        if ($result) {
    ?>
            <form method="post" enctype="multipart/form-data">
                <h3>Chỉnh sửa Nhà Xuất Bản</h3>
                <input class="text-form" type="text" id="name" name="name" placeholder="Tên Nhà Xuất Bản" value="<?= $result['ten_nxb'] ?>">
                <input class="text-form" type="text" id="address" name="address" placeholder="Địa Chỉ Nhà Xuất Bản" value="<?= $result['dia_chi_nxb'] ?>">
                <input class="text-form" type="number" id="phone" name="phone" placeholder="Số Điện Thoại" value="<?= $result['sdt_nxb'] ?>">
                <input type="hidden" name="product_id" value="<?= $product_id ?>">
                <input type="hidden" name="form_submitted" value="1">
                <input type="submit" value="Cập nhật">
            </form>
        <?php
        } else {
            echo "Không tìm thấy nhà xuất bản.";
        }
    } else {
        ?>
        <form method="post" enctype="multipart/form-data">
            <h3>Thêm Nhà Xuất Bản</h3>
            <input class="text-form" type="text" id="name" name="name" placeholder="Tên Nhà Xuất Bản" value="">
            <input class="text-form" type="text" id="address" name="address" placeholder="Địa Chỉ Nhà Xuất Bản" value="">
            <input class="text-form" type="number" id="phone" name="phone" placeholder="Số Điện Thoại" value="">
            <input type="hidden" name="form_submitted" value="1">
            <input type="submit" value="Thêm">
        </form>
    <?php
    }
    ?>

    <script src="js/addProduct.js"></script>

</body>

</html>