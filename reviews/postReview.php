<?php
    $category = $_POST['category'];
    $pname = $_POST['pname'];
    $qualityRating = $_POST['quality'];
    $priceRating = $_POST['price'];
    $reviewText = $_POST['review'];
    $url = $_POST['url'];

    $averageRating = ($qualityRating + $priceRating) / 2;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $reviewData = "$category|$pname|$qualityRating|$priceRating|$averageRating|$reviewText|$url\n";
        file_put_contents('reviewData.txt', $reviewData, FILE_APPEND);

        header("Location: reviews.php");
    }
    else{
        header('Location: writeReview.php');
        exit;
}

