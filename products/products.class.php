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

    public function __construct($productName, $productType, $productDescription, $productManufacturer, $productImage, $productLink)
    {
        $this->productName = $productName;
        $this->productDescription = $productDescription;
        $this->productManufacturer = $productManufacturer;
        $this->productImage = $productImage;
        $this->productLink = $productLink;
    }

    // show singular
    public function __loadOneProduct($id)
    {
        try {
            require "../backend/config.php";

            $sql = "SELECT ProductName, ProductType, ProductDescription, ProductManufacturer, ProductImage, ProductLink 
                    FROM products 
                    WHERE ProductID=:id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->__construct($result['ProductName'], $result['ProductType'], $result['ProductDescription'], $result['ProductManufacturer'], $result['ProductImage'], $result['ProductLink']);
        } catch (PDOException $e) {
            echo $e->getMessage();
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