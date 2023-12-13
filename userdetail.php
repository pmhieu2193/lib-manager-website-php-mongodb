<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/addProduct.css">
</head>
<body>
    <img src="img/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <p class="alert-msg">Lỗi</p>
    </div>

    <img src="img/dark-logo.png" class="logo" alt="">

    <div class="form">
    <?php
        if (!isset($_POST["getUser"])) {
        include("connection.php");
        session_start();

        $id=$_REQUEST["id"];
        $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
        $collection = $database -> selectCollection("user");
        try{
            $user = $collection -> findOne($filter);
            $date1 = $user->tao_luc;
            $datecreate = new DateTime($date1->toDateTime()->format('Y-m-d H:i:s'));
            $date2 = $user->check_in;
            $datecheckin = new DateTime($date1->toDateTime()->format('Y-m-d H:i:s'));
            //giờ làm trang chi tiết user nào
            //tên, ngày sinh,....
            echo '
                <a>Id user :<a><a>'.$id.'<br><br>
                <p>Tạo lúc: '.$datecreate->format('d-m-Y').'</p>
                <p>Check in gần nhất: '.$datecheckin->format('d-m-Y').'</p> <br><br>
                <h3>Thông tin cá nhân</h3><br><br>

                <a>Email</a><input type="text" name="email" placeholder="Email" value="'.$user->email.'">
                <a>Tên</a><input type="text" name="ten" placeholder="Tên" value="'.$user->ten.'">
                <a>CCCD</a><input type="text" name="cccd" placeholder="CCCD nếu rỗng tại login truyền vào none" value="'.$user->cccd.'">
                <a>Số điện thoại</a><input type="number" name="number" placeholder="Số điện thoại" value="'.(string)$user->sdt.'">
                <a>Địa chỉ<input type="text" name ="address" placeholder="Địa chỉ" value="'.$user->dia_chi.'"></textarea>
                <a>Mật khẩu</a><input type="text" name="pass" placeholder="Mật khẩu/ chỉ được xem không, được đổi nhé, br" value="'.$user->mat_khau.'">
                    
                <br><h3>Thông tin tài khoản</h3><br><br>
                <label for="status">Tuỳ chỉnh trạng thái tài khoản: </label>
                <select name="status" id="status" >';
                    $status = $user->trang_thai_tai_khoan;
                    if ($status==0) echo '<option value="0" selected="selected">Chờ xác nhận (Khách vãng lai)</option>';
                    else echo '<option value="0">Đặt tài khoản về tài khoản khách</option>';
                    if ($status==1) echo '<option value="1" selected="selected">Đã xác nhận</option>';
                    else echo '<option value="1">Đã xác nhận</option>';
                    if ($status==2) echo '<option value="2" selected="selected">Khoá tài khoản</option>';
                    else echo '<option value="2">Khoá tài khoản</option>';
                echo '
                </select>
                <label>
                    <br><br>
                    <a> Giới tính: </a>
                    <input type="checkbox" name="gender" value="1" onchange="uncheckOther(this)" class="checkbox"'; if($user->gioi_tinh==1) echo 'checked'; echo' ><a> Nam</a>
                    <input type="checkbox" name="gender" value="0" onchange="uncheckOther(this)" class="checkbox"'; if($user->gioi_tinh==0) echo 'checked'; echo' ><a> Nữ</a>
                </label>
                <br>
                <a>Ngày sinh</a><br><br><input type="date" autocomplete="off" name="date" placeholder="Ngày sinh">
                <br>
                <br><label for="rank">Cấp bậc: </label>
                <select name="rank" id="rank">
                    <option value="1">Sinh viên</option>
                    <option value="2">Học sinh</option>
                    <option value="3">Công chức</option>
                    <option value="4">Khách vãng lai</option>
                </select>
                <br><br>
                
            </div>
            <input type="checkbox" class="checkbox" id="tac" checked>
            <label for="tac">Tôi đã kiểm tra kĩ thông tin</label>

            <div class="buttons">
                <button class="btn" id="add-btn">Lưu chỉnh sửa</button>
                <button class="btn" id="add-btn" style="background-color: red;">Xoá tài khoản</button>
                <button class="btn" id="save-btn">Huỷ</button>
    </div>';
        }
        catch (Exception $e) {
            echo 'Không tìm thấy User!';
        }

}

?>
    <script src="js/addProduct.js"></script>
    <script>
        function uncheckOther(checkbox) {
            var checkboxes = document.getElementsByName("gender");
            checkboxes.forEach(function(currentCheckbox) {
            if (currentCheckbox !== checkbox) {
                currentCheckbox.checked = false;
            }
            });
        }
    </script>
    
</body>
</html>