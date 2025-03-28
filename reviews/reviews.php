<link rel="stylesheet" href="css/Reviews.css">
<?php
    require "../reviews/Review.class.php";
    require "../templates/header.php";
    require "../templates/footer.php";

    try {
        require "../backend/DBconnect.php";

        $sql = "SELECT *
            FROM reviews
            JOIN products ON reviews.ProductID = products.ProductID";

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $reviewData = $stmt->fetchALL();
    }catch (PDOException $e){
        echo $e->getMessage();
    }


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
        foreach ($reviewData as $row) {
            echo "<div class='box'>";
            echo "<div class='thumbnail'>
                    <img src='../data/images/placeholders/PlaceHolderProduct.png".$row['ProductImage']."' alt='Placeholder product image'>
                    </div>";

            $averageRating = ($row['QualityRating'] + $row['PriceRating'])/2;

            echo "<div class='review'>";
            echo "<strong>Category:</strong>".$row['ProductType']."<br>";
            echo "<strong>Product Name:</strong>".$row['ProductName']."<br>";
            echo "<strong>Quality Rating:</strong>".$row['QualityRating']."/5<br>";
            echo "<strong>Price Rating:</strong> ".$row['PriceRating']."/5<br>";
            echo "<strong>Overall Rating:</strong> $averageRating/5<br>";
            echo "<a href='productReview.php?id='".$row['ReviewID'].">Read Full Review</a><br><br>";
            echo "</div>";
            echo "</div>";

        }
    }