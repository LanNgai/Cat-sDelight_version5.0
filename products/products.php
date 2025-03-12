<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Page</title>
    <link rel="stylesheet" href="css/products.css">
</head>
<body>
<nav>
    <div class="topnav">
        <a  href="../index.php">Home</a>
        <a href="../reviews/reviews.php">Reviews</a>
        <a class="active" href="products.php">Products</a>
    </div>
    <div>
        <a href="../login/login.php" style="float: right">Login</a>
    </div>
</nav>
<div>
    <?php
        $productArray = [
            'category' => 'cat food',
            'pname' => 'Organic cat food',
            'description' => 'Every cat may be different, but all of them love a tasty meal such as this Yarrah Organic Chunks wet cat food! It is suitable for all ages and breeds of cat, with plenty of organic meat and beneficial ingredients such as organic nettle and organic tomato. The recipe of Yarrah Organic Chunks is made exclusively with ingredients from controlled organic sources. This makes it ideal for protecting those with food allergies or digestive issues.
Cats love to eat chunks of meat, especially when they are swimming in sauce. The small pieces in this Yarrah Organic Chunks are easy for your cat to eat. The scent of the meat combined with the sauce provides the ultimate taste experience. Organic nettle helps to support the kidneys and can keep the urinary tract healthy, whilst organic tomatoes are full of vitamins and help to strengthen the immune system. The recipe is free from sugar, artificial additives, pesticides and GMOs. Natural, flavour-rich enjoyment for your cat!',
            'price' => '21.49',
            'link' => 'https://www.zooplus.ie/shop/cats/canned_cat_food_pouches/yarrah/cans/127179?activeVariant=127179.1'
        ];
        if(empty($productArray)) {
            echo "No products to show ... yet.";
        }
        else{
            ?>
            <?php
            echo "<div class='box'>
                    <div class='thumbnail'>
                        <img src='../reviews/PlaceHolder.png' alt='Placeholder product image'>
                    </div>
                    <div class='product'>
                        <strong>Category:</strong>" .$productArray['category']."<br>
                        <strong>Product Name:</strong>" .$productArray['pname']. "<br>
                        <strong>Description:</strong>" .$productArray['description']. "<br>
                        <strong>Price:</strong>" .$productArray['price']. "<br>
                        <strong>Link to purchase:</strong>" .$productArray['link']. "<br>
                    </div>
                  </div>
                  <div class='box'>
                    <div class='thumbnail'>
                        <img src='../reviews/PlaceHolder.png' alt='Placeholder product image'>
                    </div>
                    <div class='product'>
                        <strong>Category:</strong>" .$productArray['category']."<br>
                        <strong>Product Name:</strong>" .$productArray['pname']. "<br>
                        <strong>Description:</strong>" .$productArray['description']. "<br>
                        <strong>Price:</strong>" .$productArray['price']. "<br>
                        <strong>Link to purchase:</strong>" .$productArray['link']. "<br>
                    </div>
                  </div>
                  <div class='box'>
                    <div class='thumbnail'>
                        <img src='../reviews/PlaceHolder.png' alt='Placeholder product image'>
                    </div>
                    <div class='product'>
                        <strong>Category:</strong>" .$productArray['category']."<br>
                        <strong>Product Name:</strong>" .$productArray['pname']. "<br>
                        <strong>Description:</strong>" .$productArray['description']. "<br>
                        <strong>Price:</strong>" .$productArray['price']. "<br>
                        <strong>Link to purchase:</strong>" .$productArray['link']. "<br>
                    </div>
                  </div>";
            ?>
       <?php }
    ?>
</body>
</html>