<link rel="stylesheet" href="css/Reviews.css">
<?php
    $reviewData = file('reviewData.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    echo "<nav>
            <div class='top-nav'>
                <a href='../index.php'>Home</a>
                <a class='active' href='reviews.php'>Reviews</a>
                <a href='../products/products.php'>Products</a>
                <a href='../login/login.php'>Login</a>
            </div>
        </nav>";

    echo "<h1>Product Reviews</h1>";

    if (empty($reviewData)) {
        echo "There are no reviews yet.";
    } else {
        foreach ($reviewData as $index => $review) {
            list($category, $pname, $qualityRating, $priceRating, $averageRating, $reviewText, $url) = explode('|', $review);
            echo "<div class='box'>";
            echo "<div class='thumbnail'>
                    <img src='PlaceHolder.png' alt='Placeholder product image'>
                    </div>";

            echo "<div class='review'>";
            echo "<strong>Category:</strong> $category<br>";
            echo "<strong>Product Name:</strong> $pname<br>";
            echo "<strong>Quality Rating:</strong> $qualityRating/5<br>";
            echo "<strong>Price Rating:</strong> $priceRating/5<br>";
            echo "<strong>Overall Rating:</strong> $averageRating/5<br>";
            echo "<a href='productReview.php?id=$index'>Read Full Review</a><br><br>";
            echo "</div>";
            echo "</div>";

        }
    }