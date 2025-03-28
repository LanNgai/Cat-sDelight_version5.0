<?php
require "products.class.php";
require "../templates/header.php";
require "../templates/footer.php";

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("Invalid or missing product ID.");
}

$productID = (int)$_GET['id'];
$product = Product::loadOneProduct($productID);

if (!$product) {
    die("Product not found.");
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($product->getProductName()); ?> - Product Details</title>
        <link rel="stylesheet" href="css/productDetail.css">
    </head>
    <body>
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

        <div class="box">
            <div class='thumbnail'>
                <?php if ($product->getProductImage()): ?>
                    <img src="../data/images/<?php echo htmlspecialchars($product->getProductImage()); ?>" alt="<?php echo htmlspecialchars($product->getProductName()); ?>">
                <?php else: ?>
                    <img src="../data/images/placeholders/PlaceHolderProduct.png" alt="Placeholder product image">
                <?php endif; ?>
            </div>

            <div class="product-info">
                <h2><?php echo htmlspecialchars($product->getProductName()); ?></h2>
                <p><strong>Category:</strong> <?php echo htmlspecialchars($product->getProductType()); ?></p>
                <p><strong>Description:</strong> <?php echo htmlspecialchars($product->getProductDescription() ?: 'No description available.'); ?></p>
                <p><strong>Manufacturer:</strong> <?php echo htmlspecialchars($product->getProductManufacturer()); ?></p>
                <?php if ($product->getProductLink()): ?>
                    <p><strong>More Info:</strong> <a href="<?php echo htmlspecialchars($product->getProductLink()); ?>" target="_blank">Visit Manufacturer Site</a></p>
                <?php endif; ?>
                <p><a href="../products/products.php" id="back">Back to All Products</a></p>
            </div>
        </div>
    </body>
    </html>