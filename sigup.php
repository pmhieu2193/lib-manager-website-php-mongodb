<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing : Create Account</title>

    <link rel="stylesheet" href="css/sigup.css">
</head>
<body>
    
    <img src="img/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <p class="alert-msg">Error message</p>
    </div>

    <div class="container">
        <img src="img/dark-logo.png" class="logo "alt="">
        <form action="sigup1.php" method="post">
            <input type="text" autocomplete="off" name="email" placeholder="Email">
            <input type="password" autocomplete="off" name="password" placeholder="Mật khẩu">
            <input type="text" autocomplete="off" name="name" placeholder="Họ tên">
            <input type="text" autocomplete="off" name="number" placeholder="Số điện thoại">
            <input type="text" autocomplete="off" name="cccd" placeholder="Căn cước công dân nếu trên 16 tuổi">
            <input type="text" autocomplete="off" name="address" placeholder="Địa chỉ">
            <label>
                <a> Giới tính: </a>
                <input type="checkbox" name="gender" value="1" onchange="uncheckOther(this)" class="checkbox" ><a> Nam</a>
                <input type="checkbox" name="gender" value="0" onchange="uncheckOther(this)" class="checkbox" ><a> Nữ</a>
            </label>
            <br>
            <label><a>Ngày sinh</a></label>
            <input type="date" autocomplete="off" id="date" placeholder="Ngày sinh">
            <br>
            <label for="fruit">Bạn là: </label>
            <select name="rank" id="rank">
                <option value="1">Sinh viên</option>
                <option value="2">Học sinh</option>
                <option value="3">Công chức</option>
                <option value="4">Khách vãng lai</option>
            </select>
            <br>
            <input type="checkbox" checked class="checkbox" id="term-and-cond">
            <label for="term-and-cond">đồng ý <a href="">điều khoản và chính sách bảo mật</a></label>
            <button type="submit" class="submit-btn">Tạo Tài Khoản</button>
        </form>
        <a href="login.html" class="link">Đã có tài khoản? Nhấn để đăng nhập</a>
	<a href="index.html" class="link">Quay lại trang chủ</a>
    </div>

    <!-- Tại sao chỗ này lại ko thể liên kết đến file js? -->
    <script src="js/form.js"></script>
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