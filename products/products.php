<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Products Page</title>
    <link rel="stylesheet" href="css/Products.css">
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
    <div class="add">
        <a href="AddProduct.php">Add a Product</a>
    </div>

    <h1>Products</h1>
    <form method="post">
        <label for="search">Search by Product Name</label>
        <input type="text" id="search" name="search" value="<?php echo isset($search) ? htmlspecialchars($search) : ''; ?>">

        <label for="category">Category</label>
        <select id="category" name="category">
            <option value="">All Categories</option>
            <option value="Toy">Toy</option>
            <option value="Food">Food</option>
            <option value="Litter">Litter</option>
            <option value="Misc">Miscellaneous</option>
        </select>

        <input type="submit" name="submit" value="View Results">
    </form>

        <div>
            <?php
            require_once "products.class.php";
            require_once "../backend/DBconnect.php";

            $search = '';
            $category = '';
            $whereClauses = [];
            $params = [];
            $products = [];

            // Fetch all products by default
            try {
                $sql = "SELECT *
                        FROM products";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
                echo $sql . "<br>" . $error->getMessage();
            }

            //search and filter
            if (isset($_POST['submit'])) {
                try {
                    //search
                    if (!empty($_POST['search'])) {
                        $search = trim($_POST['search']);
                        $whereClauses[] = "ProductName LIKE :search";
                        $params[':search'] = "%$search%";
                    }

                    //filter
                    if (!empty($_POST['category'])) {
                        $category = trim($_POST['category']);
                        $whereClauses[] = "ProductType = :category";
                        $params[':category'] = $category;
                    }

                    if (!empty($whereClauses)) {
                        $sql .= " WHERE " . implode(" AND ", $whereClauses);
                    }

                    $stmt = $conn->prepare($sql);
                    foreach ($params as $key => $value) {
                        $stmt->bindValue($key, $value, is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR);
                    }
                    $stmt->execute();
                    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $error) {
                    echo $sql . "<br>" . $error->getMessage();
                }
            }

            if (empty($products)) {
                echo "<p>No products to show yet.</p>";
            } else {
                foreach ($products as $row) {
                    $product = new Product(
                        $row['ProductName'],
                        $row['ProductType'],
                        $row['ProductDescription'],
                        $row['ProductManufacturer'],
                        $row['ProductImage'],
                        $row['ProductLink'],
                        $row['ProductID'],
                        $row['AdminLoginID']
                    );
                    ?>
                    <div class='box'>
                        <div class='thumbnail'>
                            <?php
                            $imagePath = $product->getProductImage() ? '../data/images/' . $product->getProductImage() : '../data/images/placeholders/PlaceHolderProduct.png';
                            ?>
                            <img src="<?php echo $imagePath; ?>" alt="<?php echo $product->getProductName(); ?>">
                        </div>
                        <div class='product'>
                            <strong>Category:</strong> <?php echo $product->getProductType(); ?><br>
                            <strong>Product Name:</strong> <?php echo $product->getProductName(); ?><br>
                            <strong>Manufacturer:</strong> <?php echo $product->getProductManufacturer(); ?><br>
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