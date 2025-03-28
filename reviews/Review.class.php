<?php

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

    public function getReviewID($reviewID)
    {
        return $this->reviewID;
    }

    public function getProductID($productID)
    {
        return $this->productID;
    }

    public function getAdminLoginID($adminLoginID)
    {
        return $this->adminLoginID;
    }

    public function getQtyRating($qtyRating)
    {
        return $this->qualityRating;
    }

    public function getPriceRating($priceRating)
    {
        return $this->priceRating;
    }

    public function getReviewText($reviewText)
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