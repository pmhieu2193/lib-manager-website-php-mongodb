<?php
session_start();
echo'
    <div class="nav-space">
    <div class="nav-admin">
        <img src="img/user.png">
        <p class="add-product-title name-admin">'.$_SESSION['ten'].'</p>
        <button class="btn btn-new-product" id="new-product" onclick="location.href="';
    echo "'login.php'";
    echo '">Đăng xuất</button></div>';

    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'checkin.php'";
    echo '">Quản lý vào</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'checkin.php'";
    echo '">Quản lý sách</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'user.php'";
    echo '">Quản lý tài khoản</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'order.php'";
    echo '">Yêu cầu mượn</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'order.php'";
    echo '">Yêu cầu trả</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'orderdetail.php'";
    echo '">xem đơn chi tiết</p>';
    echo '<p class="add-product-title nav-link" onclick="location.href=';
    echo "'report.php'";
    echo '">báo cáo</p>';
    echo '</div>';
?>