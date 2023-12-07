<?php
    include ("connection.php");
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<?php echo'
    <div class="nav">
        <img src="img/dark-logo.png" class="brand-logo" alt="">
        <div class="nav-items">
        <form action="search.php" method="GET" accept-charset="UTF-8">
            <input type="text"  name="timkiem" placeholder="Tìm tên thương hiệu, sản phẩm...">
            <input type="submit" value="Tìm kiếm" class="search-btn"> 
        </form>
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
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Thể loại
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'; ?>
        <?php 
            $collectionSach = $database->selectCollection('sach');
            $collectionTheLoai = $database->selectCollection('the_loai');
            $aggregateQuery = [
                [
                    '$lookup' => [
                        'from' => 'the_loai',
                        'localField' => 'ma_the_loai',
                        'foreignField' => 'ma_the_loai',
                        'as' => 'the_loai'
                    ]
                ],
                [
                    '$unwind' => '$the_loai'
                ],
                [
                    '$group' => [
                        '_id' => '$ma_the_loai',
                        'ten_the_loai' => ['$first' => '$the_loai.ten_the_loai']
                    ]
                ]
            ];
            
            $result = $collectionSach->aggregate($aggregateQuery);
            
            foreach ($result as $document) {
                $maTheLoai = $document->_id;
                $tenTheLoai = $document->ten_the_loai;
                echo '<a class="dropdown-item" href="search.php?ma_the_loai=' . $maTheLoai . '">' . $tenTheLoai . '</a>';
            }
        ?>

    <?php echo '</div> </div> </li> </ul>'; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
