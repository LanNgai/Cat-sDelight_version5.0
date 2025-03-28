<?php
require "../reviews/Review.class.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing review ID.");
}

$reviewId = (int)$_GET['id'];
$review = Review::loadOneReview($reviewId);

if (!$review) {
    die("Review not found.");
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $review->getProductName(); ?> - Review</title>
        <link rel="stylesheet" href="css/productReview.css">
    </head>
    <body>
    <nav>
        <div class="top-nav">
            <a href="../index.php">Home</a>
            <a href="reviews.php">Reviews</a>
            <a href="../products/products.php">Products</a>
            <a href="../login/login.php">Login</a>
        </div>
    </nav>

    <div class="box">
        <div class="thumbnail">
            <?php
            echo "<img src='../data/images/placeholders/PlaceHolderProduct.png' alt='Product image'>";
            ?>
        </div>

        <div class="review">
            <h2><?php echo $review->getProductName(); ?></h2>
            <p><strong>Category:</strong> <?php echo $review->getProductType(); ?></p>
            <p><strong>Product Name:</strong> <?php echo $review->getProductName(); ?></p>
            <p><strong>Quality Rating:</strong> <?php echo $review->getQtyRating(); ?>/5</p>
            <p><strong>Price Rating:</strong> <?php echo $review->getPriceRating(); ?>/5</p>
            <?php $averageRating = ($review->getQtyRating() + $review->getPriceRating()) / 2; ?>
            <p><strong>Overall Rating:</strong> <?php echo number_format($averageRating, 1); ?>/5</p>
            <p><strong>Review:</strong> <?php echo $review->getReviewText(); ?></p>
            <p><a href="reviews.php" id="back">Back to All Reviews</a></p>
        </div>
    </div>

<html>
<form method="post">
    <label for="comment">Write your comment here: </label>
    <br>
    <textarea id="comment" name="comment" rows="3" cols="50" required></textarea><br>
    <input type="submit" value="Submit Comment">
</form>
</html>
<?php
$commentsFile = 'comments.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment = $_POST['comment'];
    file_put_contents($commentsFile, "$reviewId|$comment\n", FILE_APPEND);
}

echo "<div class='comment-box'>";
echo "<strong>Comments:</strong><br>";
if (!file_exists($commentsFile) || filesize($commentsFile) === 0) {
    echo "<p class='no-comments'>There are no comments yet. Be the first to comment!</p>";
} else {
    $comments = file($commentsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($comments as $commentLine) {
        list($commentID, $comment) = explode('|', $commentLine);
        if ($commentID === $reviewId) {
            echo "<div class='individual'>
                    <p>$comment</p>
                  </div>";
        }
    }
}
echo "</div>";
?>
    <?php
$commentsFile = 'comments.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['comment'])) {
    $comment = trim($_POST['comment']);
    // Basic sanitization (expand as needed)
    $comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
    file_put_contents($commentsFile, "$reviewId|$comment\n", FILE_APPEND);
}
?>
