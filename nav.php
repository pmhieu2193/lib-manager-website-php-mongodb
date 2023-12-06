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
                        }
                        else{
                            echo "Chưa đăng nhập";
                        }
                        ?><?php echo '</p>
                        <button class="btn" id="user-btn">đăng xuất</button>
                    </div>
                </a>
                <a href="historycart.html"><img src="img/history.png"></a>
                <a href="cart.html"><img src="img/cart.png"></a>
        </div>
    </div>
    
    <ul class="links-container">
        <li class="link-item"><a href="index.html" class="link"></a><img src="img/home.png">Trang chủ</li>
        <li class="link-item"><a href="index.html" class="link"></a>Nội quy</li> 
        <li class="link-item"><a href="order.html" class="link"></a>Hướng dẫn sử dụng</li> 
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
