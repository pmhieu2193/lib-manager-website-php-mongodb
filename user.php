<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/admin.css">

</head>
<body>
    <img src="img/loader.gif" class="loader" alt="">

    <div class="alert-box">
        <img src="img/error.png" class="alert-img" alt="">
        <p class="alert-msg">Thông báo lỗi</p>
    </div>
    <img src="img/dark-logo.png" class="logo" alt="">
    <?php   
            include("navadmin.php");
            include("connection.php");
    ?>
    <!--products list-->
    <div class="product-listing">
        <div class="add-product">
            <p class="add-product-title">quản lý user</p>
            <button class="btn btn-new-product" id="new-user" onclick="location.href='sigup.php'">	&#43; thêm user</button>
        </div>
        <div class="box">
            <select class="select">
                <option>hiển thị: 10 user</option>
                <option>hiển thị: 20 user</option>
                <option>hiển thị: 30 user</option>
                <option>hiển thị tất cả</option>
            </select>
            <select class="select">
                <option>Phân loại: Tất cả user</option>
                <option>Staff</option>
                <option>Administrator</option>
                <option>Encoder</option>
                <option>Uploader</option>
                <option>Mới thêm gần đây</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Tìm kiếm bằng email...">
                <button class="search-btn">&#9906; Tìm kiếm</button>                       
            </div>
        </div>
        <div class="small-container oder-page">
        <?php if (isset($_GET['error'])) { 
            echo '<h3>'.$_GET['error'].'</h3>'; }?>
            <table>
                <tr>
                    <th>Email</th>
                    <th>Tên người dùng</th>
                    <th>Trạng thái tài khoản</th>
                    <th>Quyền hạn</th>
                    <th>Ngày tạo</th>
                    <th class="table-btn-zone">Hành động</th>
                </tr>
                <?php
                //những cái sort, tìm kiếm sẽ xử lý collection này
                $collection = $database -> selectCollection("user") ;
                $user = $collection -> find() ;
                //$user = $collection -> find(["trang_thai_tai_khoan" => 1]) ;
                foreach ($user as $document) {
                    //mã yêu cầu mượn
                    //$id= (string)$document->_id;
                    echo '<tr>
                    <td><a>'.$document->email.'</a>
                    <td><a>'.$document->ten.'</a>';
                    if($document->trang_thai_tai_khoan==0){
                        echo '<td><p style="color: red">Chưa được duyệt</p></td>';
                    }
                    if($document->trang_thai_tai_khoan==1){
                        echo '<td><p style="color: green">Đã được duyệt</p></td>';
                    }
                    if($document->trang_thai_tai_khoan==2){
                        echo '<td><p style="color: red">Tài khoản đã bị khoá</p></td>';
                    }
                    if($document->trang_thai_tai_khoan==-1){
                        echo '<td><p style="color: red">Đã từ chối</p></td>';
                    }
                    
                    $collection2 = $database -> selectCollection("rank") ;
                    $rank = $collection2 -> findOne(["ma_rank" => $document->ma_rank]);
                    if($document->ma_rank==0){
                        echo '<td><p style="color: red">'.$rank->ten_rank.'</p></td>';
                    }
                    else{
                        echo '<td><p style="color: blue">'.$rank->ten_rank.'</p></td>';
                    }
                    $date1 = $document->tao_luc;
                    $date = new DateTime($date1->toDateTime()->format('Y-m-d H:i:s'));
                    $id = (string)  $document->_id;
                    echo '<td>'.$date->format('d-m-Y').'</td><td>';
                    if($document->trang_thai_tai_khoan==0){
                        echo '<form action="action_user.php" type="post"><input type="hidden" name="id" value="'.$id.'"><button type="submit" name="user_action" value="accept" class="confirm-btn">Duyệt</button><button type="submit" name="user_action" value="cancel" class="cancel-btn">Từ chối</button></form>';
                    }
                    echo '<form action="userDetail.php" type="post"><input type="hidden" name="id" value="'.$id.'"><button type="submit" name="getUser" class="confirm-btn" style="background-color: green;">Chi tiết</button></form></td>
                </tr>';
                }
                
                ?>
        </table>
        </div>
        <div class="box">
            <a>Đang hiển thị trang 1 trên 999</a>
            <div class="pre-next-btn">
                <a class="btn">Trang trước</a>
                <a class="btn">1</a>
                <a class="btn">Trang sau</a>
            </div>
        </div>
    </div>

    <script src="js/admin.js"></script>
</body>
</html>