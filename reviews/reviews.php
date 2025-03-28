<?php
require "../reviews/Review.class.php";
require "../templates/header.php";
require "../templates/footer.php";

$reviews = Review::loadAllReviews();
?>

    <link rel="stylesheet" href="css/Reviews.css">

    <nav>
        <div class="topnav">
            <a class="active" href="../index.php">Home</a>
            <a href="../reviews/reviews.php">Reviews</a>
            <a href="../products/products.php">Products</a>
        </div>
        <div>
            <a href="../login/login.php" style="float: right">Login</a>
        </div>
    </nav>
    <div class="add">
        <a href='WriteReview.php'>Write a Review</a>
    </div>

    <h1>Product Reviews</h1>

<?php
if (empty($reviews)) {
    echo "There are no reviews yet.";
} else {
    foreach ($reviews as $review) {
        echo "<div class='box'>";
        echo "<div class='thumbnail'>";
        echo "<img src='../data/images/placeholders/PlaceHolderProduct.png' alt='Product image'>";
        echo "</div>";

        $averageRating = ($review->getQtyRating() + $review->getPriceRating()) / 2;

        echo "<div class='review'>";
        echo "<strong>Category:</strong> " . $review->getProductType() . "<br>";
        echo "<strong>Product Name:</strong> " . $review->getProductName() . "<br>";
        echo "<strong>Quality Rating:</strong> " . $review->getQtyRating() . "/5<br>";
        echo "<strong>Price Rating:</strong> " . $review->getPriceRating() . "/5<br>";
        echo "<strong>Overall Rating:</strong> " . number_format($averageRating, 1) . "/5<br>";
        echo "<a href='productReview.php?id=" . $review->getReviewID() . "'>Read Full Review</a><br><br>";
        echo "</div>";
        echo "</div>";
    }
}
?>