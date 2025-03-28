<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Page</title>
    <link rel="stylesheet" href="css/Products.css">
</head>
<body>
<nav>
    <div class="topnav">
        <a href="../index.php">Home</a>
        <a href="../reviews/reviews.php">Reviews</a>
        <a class="active" href="products.php">Products</a>
    </div>
    <div>
        <a href="../login/login.php" style="float: right">Login</a>
    </div>
</nav>
<div>
    <?php
    require_once 'products.class.php';

    // Fetch all products
    $products = Product::loadAllProducts();

    if (empty($products)) {
        echo "<p>No products to show yet.</p>";
    } else {
        foreach ($products as $product) {
            ?>
            <div class='box'>
                <div class='thumbnail'>
                    <?php
                    $imagePath = $product->getProductImage() ?: '../data/images/placeholders/PlaceHolderProduct.png';
                    ?>
                    <img src='<?php echo htmlspecialchars($imagePath); ?>' alt='Product image'>
                </div>
                <div class='product'>
                    <strong>Category:</strong> <?php echo htmlspecialchars($product->getProductType()); ?><br>
                    <strong>Product Name:</strong> <?php echo htmlspecialchars($product->getProductName()); ?><br>
                    <strong>Manufacturer:</strong> <?php echo htmlspecialchars($product->getProductManufacturer()); ?><br>
                    <a href='productDetail.php?id=<?php echo $product->getProductID(); ?>' class='view-button'>View Details</a>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>