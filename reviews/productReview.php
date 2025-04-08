<?php


session_start();
require "../reviews/Comment.class.php";
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
            <img src='../data/images/<?=$review->getProductImage();?>' alt='Product image'>
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
// Handle comment submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['comment'])) {
    if (!isset($_SESSION['userLoginID'])) {
        die("You must be logged in to post a comment.");
    }

    $commentText = trim($_POST['comment']);
    $userLoginID = $_SESSION['userLoginID'];

    if (!empty($commentText)) {
        // Sanitize input
        $commentText = htmlspecialchars($commentText, ENT_QUOTES, 'UTF-8');

        // Create and save comment
        try {
            $comment = new Comment(
                null, // commentID will be auto-generated
                $commentText,
                date('Y-m-d H:i:s'), // Current datetime
                $reviewId,
                $userLoginID,
                0
            );

            Comment::save($comment);
        } catch (Exception $e) {
            die("Error saving comment: " . $e->getMessage());
        }
    }
}

// Display comment form only if logged in
if (isset($_SESSION['userLoginID'])) : ?>
    <html>
    <form method="post">
        <label for="comment">Write your comment here: </label>
        <br>
        <textarea id="comment" name="comment" rows="3" cols="50" required></textarea><br>
        <input type="submit" value="Submit Comment">
    </form>
    </html>
<?php else: ?>
    <p>Please <a href="../login/login.php">login</a> to post a comment.</p>
<?php endif; ?>

<?php
// Display comments
echo "<div class='comment-box'>";
echo "<strong>Comments:</strong><br>";

try {
    $comments = Comment::loadByReviewId($reviewId);

    if (empty($comments)) {
        echo "<p class='no-comments'>There are no comments yet. Be the first to comment!</p>";
    } else {
        foreach ($comments as $comment) {
            echo "<div class='individual'>";
            echo "<p><strong>" . htmlspecialchars($comment->getUserLoginID()) . "</strong> ";
            echo "<small>" . htmlspecialchars($comment->getCommentDateAndTime()) . "</small></p>";
            echo "<p>" . htmlspecialchars($comment->getCommentText()) . "</p>";
            echo "</div>";
        }
    }
} catch (Exception $e) {
    echo "<p>Error loading comments: " . $e->getMessage() . "</p>";
}

echo "</div>";
?>