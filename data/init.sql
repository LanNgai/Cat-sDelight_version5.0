
CREATE DATABASE catsdelight;


use catsdelight;
    CREATE TABLE user (
        UserID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(45) NOT NULL,
        Email VARCHAR(45) NOT NULL,
        Password VARCHAR(300) NOT NULL,
        Bio VARCHAR(300) DEFAULT 'Hello! I am a cat owner, I hope to find the best products for my kitties!',
        TotalLikes INT DEFAULT 0
    );

    CREATE TABLE administrator (
        UserID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (UserID) REFERENCES user(UserID)
    );

    CREATE TABLE regularUser (
        UserID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (UserID) REFERENCES user(UserID)
    );

    CREATE TABLE products(
        ProductID INT PRIMARY KEY AUTO_INCREMENT,
        Administrator_UserID INT,
        FOREIGN KEY (Administrator_UserID) REFERENCES administrator(UserID),
        ProductName VARCHAR(45) NOT NULL,
        ProductType VARCHAR(45),
        ProductDescription TEXT NOT NULL,
        ProductManufacturer VARCHAR(45) NOT NULL,
        ProductLink VARCHAR(45) NOT NULL
    );

    CREATE TABLE reviews(
        ReviewID INT AUTO_INCREMENT PRIMARY KEY,
        ProductID INT,
        FOREIGN KEY (ProductID) REFERENCES products(ProductID),
        Administrator_UserID INT,
        FOREIGN KEY (Administrator_UserID) REFERENCES administrator(UserID),
        QualityRating INT,
        PriceRating INT,
        ReviewText TEXT,
        DateTime DATETIME
    );

    CREATE TABLE comments(
        CommentID INT AUTO_INCREMENT PRIMARY KEY,
        ReviewID INT,
        FOREIGN KEY (ReviewID) REFERENCES reviews(ReviewID),
        RegularUser_UserID INT,
        FOREIGN KEY (RegularUser_UserID) references regularUser(UserID),
        CommentText TEXT NOT NULL,
        Likes INT DEFAULT 0,
        DateTime DATETIME
    );