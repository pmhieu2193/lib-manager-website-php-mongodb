<!DOCTYPE html>
<html lang="vi">
<?php include("connection.php"); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm cho MENARMOR</title>

    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/sigup.css">
    <link rel="stylesheet" href="css/admin.css">

</head>

<body>
    <img src="img/dark-logo.png" class="logo" alt="">
    <?php include("navadmin.php"); ?>

    <?php
    $searchTerm = '';

    if (isset($_GET['timkiem'])) {
        $timKiem = $_GET['timkiem'];
        if (!empty($timKiem)) {
            $searchTerm = $timKiem; // Store the search term for later use
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
                    echo '<img src="' . $result->anh_bia . '" class="product-thumb" alt="" onclick="location.href=\'book.php?_id=' . $result->_id . '\'">';
                    echo '</div>';
                    echo '<div class="product-info">';
                    echo '<h2 class="product-brand">' . $result->ten_sach . '</h2>';
                    echo '<p class="product-short-des">' . $result->tac_gia . '</p>';
                    echo '<p class="product-short-des">' . $result->vi_tri . '</p>';
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
    <p class="search-tearm">Kết quả tìm kiếm: <?php echo htmlspecialchars($searchTerm); ?></p>

    <footer></footer>

    <script src="js/nav.js"></script>
    <script src="js/footer.js"></script>
    <script src="js/search.js"></script>
</body>

</html>