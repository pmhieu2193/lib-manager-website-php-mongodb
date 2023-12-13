<?php
    include ("connection.php");
    session_start(); 
?>

<?php echo'
    <div class="nav">
        <img src="img/dark-logo.png" class="brand-logo" alt="">
        <div class="nav-items">
                <div class="search">
                    <input type="text" class="search-box" placeholder="Tìm tên thương hiệu, sản phẩm...">
                    <button class="search-btn">Tìm kiếm</button>                       
                </div>
                <a>
                    <img src="img/user.png" id="user-img" alt="">
                    <div class="login-logout-popup hide">
                        <p class="account-info">';?>
                        <?php if(isset($_SESSION["email"])){
                            echo $_SESSION["email"];
                            echo '<form action="logout.php" type="post"><button type="submit" name="logout" class="btn" id="user-btn">đăng xuất</button></form>';
                        }
                        else{
                            echo "Chưa đăng nhập";
                            echo '<form action="login.php"><button type="submit" name="login" class="btn" id="user-btn">đăng nhập</button></form>';
                        }
                        ?><?php echo '</p>
                    </div>
                </a>
                <form action="cartlog.php" type="post"><a><input type="image" name="gotoCart" src="img/history.png"></a></form>
                <form action="cartlog.php" type="post"><a><input type="image" name="gotoCart" src="img/cart.png"></a></form>
        </div>
    </div>
    
    <ul class="links-container">
        <li class="link-item"><a href="index.php" class="link"><img src="img/home.png">Trang chủ</a></li>
        <li class="link-item"><a href="index.php" class="link">Nội quy</a></li> 
        <li class="link-item"><a href="order.php" class="link">Hướng dẫn sử dụng</a></li> 
        <li class="link-item"> 
            <div>
                <select name="mySelect" class="link">
                <option value="">Thể loại</option>'; ?>
                <?php $collection = $database->selectCollection('the_loai');
                $result = $collection->find([]);
                foreach ($result as $document) {
                    echo '<option value="index.php?';?><?php echo $document->ma_the_loai;?><?php echo'">';?> <?php echo $document->ten_the_loai;?> <?php echo'</option>'; ?>
            <?php } ?>
    <?php echo '</select> </div> </li> </ul>'; ?>
