<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm cho MENARMOR</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/search.css">

</head>
<body>
    
<?php include("nav.php"); ?>


    <?php
if (isset($_GET['timkiem'])) {
    $timKiem = $_GET['timkiem'];
    if (!empty($timKiem)) {
        $collection = $database->selectCollection('sach');
        $escapedTerm = preg_quote($timKiem, '/');
        $regexPattern = new \MongoDB\BSON\Regex($escapedTerm, 'i');
        $cursor = $collection->find(['ten_sach' => ['$regex' => $regexPattern->getPattern(), '$options' => $regexPattern->getFlags()]]);

        $results = iterator_to_array($cursor);

        $count = count($results);

        if ($count > 0) {
            echo '<section class="search-results">';
            echo '<div class="product-container">';

            foreach ($results as $result) {
                echo '<div class="product-card">';
                echo '<div class="product-image">';
                echo '<img src="'. $result->anh_bia .'" class="product-thumb" alt="" onclick="location.href=\'product.html\'">';
                echo '<button class="card-btn">thêm vào giỏ hàng</button>';
                echo '</div>';
                echo '<div class="product-info">';
                echo '<h2 class="product-brand">' . $result->ten_sach . '</h2>';
                echo '<p class="product-short-des">' . $result->tac_gia . '</p>';
                echo '<p class="product-short-des">' . $result->vi_tri. '</p>';
                echo '</div>';
                echo '</div>';
            }

            echo '</div>';
            echo '</section>';
        } else {
            echo 'Không tìm thấy sản phẩm.';
        }
    } else {
        echo 'Vui lòng nhập từ khóa tìm kiếm.';
    }
}
?>     

<?php
$collectionSach = $database->selectCollection('sach');
$maTheLoai = isset($_GET['ma_the_loai']) ? filter_var($_GET['ma_the_loai'], FILTER_SANITIZE_NUMBER_INT) : ''; 

if ($maTheLoai !== '') {
    $result = $collectionSach->find(['ma_the_loai' => (int) $maTheLoai]);
    $documentCount = 0;
    foreach ($result as $document) {
        $documentCount++;
    }

    if ($documentCount > 0) {
        echo '<section class="search-results">';
        echo '<div class="product-container">';
        $result = $collectionSach->find(['ma_the_loai' => (int) $maTheLoai]);
        foreach ($result as $document) {
            echo '<div class="product-card">';
            echo '<div class="product-image">';
            echo '<img src="'. $document->anh_bia .'" class="product-thumb" alt="" onclick="location.href=\'product.html\'">';
            echo '<button class="card-btn">thêm vào giỏ hàng</button>';
            echo '</div>';
            echo '<div class="product-info">';
            echo '<h2 class="product-brand">' . $document->ten_sach . '</h2>';
            echo '<p class="product-short-des">' . $document->tac_gia . '</p>';
            echo '<p class="product-short-des">' . $document->vi_tri. '</p>';
            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
        echo '</section>';
    } else {
        echo 'Không tìm thấy sản phẩm.';
    }
} 
?>
    <footer></footer>

    <script src="js/nav.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/search.js"></script>
</body>
</html>