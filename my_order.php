<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử mua hàng</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">

</head>
<body>
    
    <?php 
    include("nav.php");
    include("connection.php");
    $collectionYCM = $database ->selectCollection("yeu_cau_muon");
    $filter = ['_id' => new MongoDB\BSON\ObjectId($_SESSION["_id"])];
    $id_user=(string)$_SESSION["_id"];
    $ycm = $collectionYCM -> find(["ma_user"=>$id_user]);
    ?>

    <div class="info-user">
        <div class="title-user">
            <h2>THÔNG TIN CÁ NHÂN</h2>
            <a class="link-text">sửa hồ sơ</a>
        </div>
        <a><img src="img/person.png"> Phan Minh Hiếu</a><br>
        <a><img src="img/phonenum.png"> 033331412</a><br>
        <a> Email: </a><br>
        <a> Ngày sinh: </a><br>
        <a> Giới tính: </a><br>
        <a> Rank: </a><br>
        <a> Thời gian tạo: </a><br>
        <a> Check-in lần cuối: </a><br>
        <a> .......... </a><br>    
        <div class="line"></div>
        <div class="title-user">
        <h2 class="title-history-cart">Sách đang mượn</h2>  
        <div class="search go-right">
            <input type="text" class="search-box" placeholder="">
            <button class="search-btn">&#9906; Tìm kiếm</button>                       
        </div>
        </div>
    </div>

    <div class="small-container cart-page">
        <?php 
        foreach ($ycm as $documentYCM) {
            $idYCM= (string)$documentYCM->_id;
            echo '<h3>Mã yêu cầu mượn: '.$idYCM.'</h3>';
    
            $collectionCTSM = $database->selectCollection('chi_tiet_sach_muon');
            $ctsm= $collectionCTSM->find(["ma_yeu_cau_muon"=>$idYCM]);
            if($ctsm) {echo 'ctsm thành công';}
            if(!$ctsm) {echo 'như cc';}
            foreach ($ctsm as $documentCTSM) {
                echo '<table>
                <tr>
                    <th>Số thứ tự</th>
                    <th>Sách</th>
                    <th>Ngày mượn</th>
                    <th>Thời gian phải trả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>';
            }
        }?>
            <tr>
                <td>#1</td>
                <td>
                    <div class="cart-info">
                        <img src="img/card1.png">
                        <div>
                            <h3>BloodAngels Primaris</h3>
                            <h3>id: sádasdasd</h3>
                            <small>Mark X Tacticus Power Armor</small>
                            <br>
                            <a class="link-text" onclick="location.href='product.html'">Xem chi tiết</a>
                        </div>
                    </div>
                </td>
                <td><a>12/12/2022</a></td>
                <td>17/12/2023</td>
                <td>Đang mượn</td>
                <td><button type="submit" name="tao_YCM" class="btn-cart" style="background: white; color: black">Gia hạn</button><button type="submit" name="tao_YCM" class="btn-cart">Trả sách</button></td></td>
            </tr>
        </table>
        
    </div>
    <script src="js/nav.js"></script>
</body>
</html>