<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/WriteReview.css">
        <nav>
            <div class='top-nav'>
                <a href='../index.php'>Home</a>
                <a href='reviews.php'>Reviews</a>
                <a href='../products/products.php'>Products</a>
                <a href='../login/login.php'>Login</a>
            </div>
        </nav>

        <title>Write a Review</title>
    </head>
    <body>
        <form method="post" action="postReview.php" enctype="multipart/form-data">
            <div class="review">
                <h1 id="title">Write a review</h1>
                <label for="category"> Choose a category</label>
                <br>
                <select id="category" name="category" required>
                    <option value="Toy">Toy</option>
                    <option value="Food">Food</option>
                    <option value="Litter">Litter</option>
                    <option value="Misc">Miscellaneous</option>
                </select>

                <br><br>

                <label for="pname">Product name</label>
                <br>
                <input type="text" id="pname" name="pname" required>

                <br><br>

                <label for="rating">Ratings (between 1 and 5):</label>
                <br>
                <div class="rating-container">
                    <div>
                        <label for="quality">Quality: </label>
                        <input type="number" id="quality" name="quality" min="1" max="5" required>
                    </div>
                    <div>
                        <label for="price">Price: </label>
                        <input type="number" id="price" name="price" min="1" max="5" required>
                    </div>
                </div>

                <br>
                <label for="photo">Upload a photo of the product:</label>
                <br>
                <input type="file" id="photo" name="photo" accept="image/*">

                <br><br>

                <label>Write review of product</label>
                <br>
                <textarea id="review" name="review" rows="10" cols="50" required></textarea>

                <br><br>

                <label>Link to Product</label>
                <br>
                <input type="url" id="url" name="url" required>

                <br><br>

                <input type="submit" value="Submit" id="submit">
            </div>
        </form>
    </body>
</html>


