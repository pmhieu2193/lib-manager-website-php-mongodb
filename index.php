<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARMOR-SHOP</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <?php include("nav.php"); ?>
    <!--hero section-->
    <header class="hero-section">
        <div class="content">
            <img src="img/light-logo.png" class="logo" alt="">
            <p class="sub-heading">Biến chiến trường thành sân khấu của bạn</p>
        </div>
    </header>


    <!--cards-container-->
    <section class="product">
        <h2 class="product-category">Sách mới <img src="img/new.png"></h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">
        <?php 
            $collection = $database->selectCollection('sach');
            $result = $collection->find([]);
            foreach ($result as $document) {
                echo '<div class="product-card">
                    <div class="product-image">
                        <span class="discount-tag">đang giảm 20%</span>
                        <img src="';?><?php echo  $document->anh_bia;?><?php echo'" class="product-thumb" alt="" onclick="location.href=';?><?php echo"'book.php?_id="?><?php echo $document->ma_sach;?><?php echo "'"?>
                        <?php echo'"><button class="card-btn">thêm vào giỏ hàng</button>
                    </div>
                    <div class="product-info">
                        <h2 class="product-brand">'?> <?php echo $document->ten_sach; ?> <?php echo'</h2>
                        <p class="product-short-des">'?><?php echo  $document->mo_ta; ?> <?php echo'</p>
                        <span class="price">280.000₫</span><span class="actual-price">350.000₫</span>
                    </div>
                </div>'; ?>
        <?php } ?>
            </div>
    </section>

    <section class="product">
        <h2 class="product-category">Sản phẩm bán chạy  <img src="img/bestsell.png"></h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 50%</span>
                    <img src="img/card1.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">BloodAngels Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">230.000₫</span><span class="actual-price">460.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 50%</span>
                    <img src="img/pro2.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Nun sister of battle</h2>
                    <p class="product-short-des">Power Armor</p>
                    <span class="price">230.000₫</span><span class="actual-price">460.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 30%</span>
                    <img src="img/card3.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Blood Ravens Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">280.000₫</span><span class="actual-price">400.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 30%</span>
                    <img src="img/card4.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Exorcists Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">266.000₫</span><span class="actual-price">380.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 25%</span>
                    <img src="img/card5.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Fire Lords Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">337.500₫</span><span class="actual-price">450.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 25%</span>
                    <img src="img/card6.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Iron Hands Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">270.000₫</span><span class="actual-price">360.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 10%</span>
                    <img src="img/pro4.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Flak Armor</h2>
                    <p class="product-short-des">Armor of Imperial Guard</p>
                    <span class="price">360.000₫</span><span class="actual-price">400.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 15%</span>
                    <img src="img/card8.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Rift Stalkers Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">297.500₫</span><span class="actual-price">350.000₫</span>
                </div>
            </div>
        </div>
    </section>

    <section class="product">
        <h2 class="product-category">Đang giảm giá sốc <img src="img/hotsell.png"></h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 30%</span>
                    <img src="img/card3.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Blood Ravens Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">280.000₫</span><span class="actual-price">400.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 30%</span>
                    <img src="img/card4.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Exorcists Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">266.000₫</span><span class="actual-price">380.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 25%</span>
                    <img src="img/card5.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Fire Lords Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">337.500₫</span><span class="actual-price">450.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 25%</span>
                    <img src="img/card6.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Iron Hands Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">270.000₫</span><span class="actual-price">360.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 15%</span>
                    <img src="img/card7.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Knights of the Chalice Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">306.000₫</span><span class="actual-price">360.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 15%</span>
                    <img src="img/card8.png" class="product-thumb" alt="" onclick="location.href='product.html'">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Rift Stalkers Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">297.500₫</span><span class="actual-price">350.000₫</span>
                </div>
            </div>
        </div>
    </section>


    <!--collections-->
    <h2 class="title-colection">Mục đáng chú ý</h2>
    <section class="collection-container">
        <a href="womenarmor.html" class="collection">
            <img src="img/women-collection.png" alt="">
            <p class="collection-title">women <br> armor</p>
        </a>
        <a href="menarmor.html" class="collection">
            <img src="img/men-collection.png" alt="">
            <p class="collection-title">Man <br> armor</p>
        </a>
        <a href="accessories.html" class="collection">
            <img src="img/accessories-collection.png" alt="">
            <p class="collection-title">phụ kiện</p>
        </a>
    </section>
            </div>
        </div>
    </section>

    <footer></footer>

    <script src="js/home.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/footer.js"></script>
</body>
</html>