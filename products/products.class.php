<?php
class Product
{
    private $productID;
    private $adminLoginID;
    private $productName;
    private $productType;
    private $productDescription;
    private $productManufacturer;
    private $productImage;
    private $productLink;

    public function __construct($productName, $productType, $productDescription, $productManufacturer, $productImage, $productLink, $productID = null, $adminLoginID = null)
    {
        $this->productName = $productName;
        $this->productType = $productType;
        $this->productDescription = $productDescription;
        $this->productManufacturer = $productManufacturer;
        $this->productImage = $productImage;
        $this->productLink = $productLink;
    }

    // show singular
    public static function loadOneProduct($id)
    {
        try {
            require "../backend/DBconnect.php";

            $sql = "SELECT ProductName, ProductType, ProductDescription, ProductManufacturer, ProductImage, ProductLink 
                    FROM products 
                    WHERE ProductID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return new self(
                    $result['ProductName'],
                    $result['ProductType'],
                    $result['ProductDescription'],
                    $result['ProductManufacturer'],
                    $result['ProductImage'],
                    $result['ProductLink']
                );
            }
            return null;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    //show all
    public static function loadAllProducts()
    {
        try {
            require "../backend/DBconnect.php";

            $sql = "SELECT ProductID, ProductName, ProductType, ProductManufacturer, ProductImage, ProductLink
                    FROM products";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $products = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $product = new self(
                    $row['ProductName'],
                    $row['ProductType'],
                    '',
                    $row['ProductManufacturer'],
                    $row['ProductImage'],
                    $row['ProductLink']
                );
                $product->productID = $row['ProductID'];
                $products[] = $product;
            }
            return $products;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return [];
        }
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getAdminLoginID()
    {
        return $this->adminLoginID;
    }

    public function getProductName()
    {
        return $this->productName;
    }
    public function getProductType(){
        return $this->productType;
    }
    public function getProductDescription()
    {
        return $this->productDescription;
    }

    public function getProductManufacturer()
    {
        return $this->productManufacturer;
    }

    public function getProductImage()
    {
        return $this->productImage;
    }

    public function getProductLink()
    {
        return $this->productLink;
    }
}