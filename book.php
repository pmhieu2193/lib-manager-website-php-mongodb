<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product - </title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/product.css">
</head>
<body>
    <?php include("nav.php");?>

    <?php 
    if(isset($_GET["_id"])){
        $id=$_GET["_id"];
        $collection = $database->selectCollection('sach');
        try {
            $filter = ['_id' => new MongoDB\BSON\ObjectId($id)];
            if($filter){
                $book= $collection->findOne($filter);
                if($book){
                    $collection2 = $database->selectCollection('the_loai');
                    $matl=$book->ma_the_loai;
                    $tentheloai= $collection2->findOne(['ma_the_loai'=> $matl]);
                    $collection3 = $database->selectCollection('nha_xuat_ban');
                    $manxb=$book->ma_nxb;
                    $tennxb= $collection3->findOne(['ma_nxb'=> $manxb]);
                    
                    echo '<section class="product-details">';
                    echo '<img src='.$book->anh_bia.' class="image-slider">';
                    echo '<div><h2 class="product-brand">'.$book->ten_sach.'</h2>';
                    echo '<p class="product-short-des">'.$book->mo_ta.'</p>';
                    echo '<p>Vị trí: '.$book->vi_tri.'</p>';
                    echo '<p> Tác giả: '.$book->tac_gia.'</p>';
                    echo '<p> Ngôn ngữ:' .$book->ngon_ngu.'</p>';
                    echo '<p> Năm xuất bản: '.$book->nam_xuat_ban.'</p>';
                    echo '<p> Thể loại: '. $tentheloai->ten_the_loai.'</p>';
                    echo '<p> rank: '.$book->ma_rank.'</p>';
                    echo '<p> Nhà xuất bản: '.$tennxb->ten_nxb.'</p>';
                    echo '<br>';
                    if($book->so_luong>0){
                        echo '<h3 style ="color : green"> Trạng thái: Còn sách </h3>';
                        if(isset ($_SESSION['ma_rank'])){
                            $ma_rank=$_SESSION['ma_rank'];
                            if($ma_rank!=-1&&isset($_SESSION['_id'])){
                                echo '<form action="xu_ly_sach.php" type="post">';
                                echo '<div><input name="id_book" type="hidden" value="'.$book->_id.'"><button type="submit" name="addToCart" class="btn cart-btn">Thêm vào giỏ sách</button></form>';
                                echo '<form action="xyz.php" type="post"><input name="id_book" type="hidden" value="'.$book->_id.'"><button type="submit" name="addToWishList" class="btn cart-btn">Danh sách yêu thích &#x2764;</button></form></div>';
                            }
                            else{
                                echo 'Bạn chưa thể mượn sách này, hãy kích hoạt tài khoản trước';
                            }
                        }
                    }
                    else{
                        echo '<h3 style ="color : red"> Trạng thái: Sách đã bị mượn hết </h3>';
                    }
                    echo '</section> </form>';
                }
            }

            } catch (Exception $e) {
                header("Location: 404.php");
                exit();
            }
        
        }else{
            echo 'không tìm thấy sách';
        }

    ?>
        <section class="product">
        <h2 class="product-category">Sách cùng nhà xuất bản</h2>
        <button class="pre-btn"><img src="img/arrow.png" alt=""></button>
        <button class="nxt-btn"><img src="img/arrow.png" alt=""></button>
        <div class="product-container">
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 50%</span>
                    <img src="img/card1.png" class="product-thumb" alt="">
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
                    <img src="img/card2.png" class="product-thumb" alt="">
                    <button class="card-btn">thêm vào giỏ hàng</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Black Dragons Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">230.000₫</span><span class="actual-price">460.000₫</span>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <span class="discount-tag">đang giảm 30%</span>
                    <img src="img/card3.png" class="product-thumb" alt="">
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
                    <img src="img/card4.png" class="product-thumb" alt="">
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
                    <img src="img/card5.png" class="product-thumb" alt="">
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
                    <img src="img/card6.png" class="product-thumb" alt="">
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
                    <img src="img/card7.png" class="product-thumb" alt="">
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
                    <img src="img/card8.png" class="product-thumb" alt="">
                    <button class="card-btn">thêm vào giỏ sách</button>
                </div>
                <div class="product-info">
                    <h2 class="product-brand">Rift Stalkers Primaris</h2>
                    <p class="product-short-des">Mark X Tacticus Power Armor</p>
                    <span class="price">297.500₫</span><span class="actual-price">350.000₫</span>
                </div>
            </div>


        </div>
        </section>
    <footer></footer>

    <script src="js/nav.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/home.js"></script>
    <script src="js/product.js"></script>
</body>
</html>
