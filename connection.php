<?php
    require 'vendor/autoload.php';
    use MongoDB\Client;     
    $mongoUri = "mongodb://localhost:27017";
    $client = new Client($mongoUri);
    $database = $client ->selectDatabase('thu_vien');
?>