<?php
require_once "../products/products.class.php";
class Review
{
    private $reviewID;
    private $productID;
    private $adminLoginID;
    private $qualityRating;
    private $priceRating;
    private $reviewText;
    private $dateCreated;
    private $product;

    public function __construct($reviewID, $productID, $adminLoginID, $qualityRating, $priceRating, $reviewText, $dateCreated, $product)
    {
        $this->reviewID = $reviewID;
        $this->productID = $productID;
        $this->adminLoginID = $adminLoginID;
        $this->qualityRating = $qualityRating;
        $this->priceRating = $priceRating;
        $this->reviewText = $reviewText;
        $this->dateCreated = $dateCreated;
        $this->product = $product;
    }

    public static function loadAllReviews() {
        try {
            require "../backend/DBconnect.php";
            $sql = "SELECT r.ReviewID, r.ProductID, r.AdminLoginID, r.QualityRating, r.PriceRating, r.ReviewText, r.DateAndTime,
                           p.ProductID AS ProdID, p.ProductName, p.ProductType, p.ProductDescription, p.ProductManufacturer, p.ProductImage, p.ProductLink
                    FROM reviews r
                    JOIN products p ON r.ProductID = p.ProductID";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $reviews = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $product = new Product(
                    $row['ProductName'],
                    $row['ProductType'],
                    $row['ProductDescription'],
                    $row['ProductManufacturer'],
                    $row['ProductImage'],
                    $row['ProductLink'],
                    $row['ProdID'],
                    $row['AdminLoginID']
                );
                $reviews[] = new self(
                    $row['ReviewID'],
                    $row['ProductID'],
                    $row['AdminLoginID'],
                    $row['QualityRating'],
                    $row['PriceRating'],
                    $row['ReviewText'],
                    $row['DateAndTime'],
                    $product
                );
            }
            return $reviews;
        } catch (PDOException $e) {
            error_log("Error loading reviews: " . $e->getMessage());
            return [];
        }
    }

    public static function loadOneReview($id) {
        try {
            require "../backend/DBconnect.php";
            $sql = "SELECT r.ReviewID, r.ProductID, r.AdminLoginID, r.QualityRating, r.PriceRating, r.ReviewText, r.DateAndTime,
                           p.ProductID AS ProdID, p.ProductName, p.ProductType, p.ProductDescription, p.ProductManufacturer, p.ProductImage, p.ProductLink
                    FROM reviews r
                    JOIN products p ON r.ProductID = p.ProductID
                    WHERE r.ReviewID = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $product = new Product(
                    $result['ProductName'],
                    $result['ProductType'],
                    $result['ProductDescription'],
                    $result['ProductManufacturer'],
                    $result['ProductImage'],
                    $result['ProductLink'],
                    $result['ProdID'],
                    $result['AdminLoginID']
                );
                return new self(
                    $result['ReviewID'],
                    $result['ProductID'],
                    $result['AdminLoginID'],
                    $result['QualityRating'],
                    $result['PriceRating'],
                    $result['ReviewText'],
                    $result['DateAndTime'],
                    $product
                );
            }
            return null;
        } catch (PDOException $e) {
            error_log("Error loading review: " . $e->getMessage());
            return null;
        }
    }
    public function getReviewID()
    {
        return $this->reviewID;
    }

    public function getProductID()
    {
        return $this->productID;
    }

    public function getAdminLoginID()
    {
        return $this->adminLoginID;
    }

    public function getQtyRating()
    {
        return $this->qualityRating;
    }

    public function getPriceRating()
    {
        return $this->priceRating;
    }

    public function getReviewText()
    {
        return $this->reviewText;
    }

    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    public function getProductName()
    {
        return $this->product->getProductName();
    }

    public function getProductType()
    {
        return $this->product->getProductType();
    }
}