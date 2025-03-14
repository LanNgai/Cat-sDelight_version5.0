
CREATE DATABASE catsdelight;


use catsdelight;
    CREATE TABLE login (
        LoginID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(45) NOT NULL,
        Email VARCHAR(45) NOT NULL,
        Password VARCHAR(300) NOT NULL
    );

    CREATE TABLE administrator (
        AdminLoginID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (AdminLoginID) REFERENCES login(LoginID)
    );

    CREATE TABLE user (
        UserLoginID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        FOREIGN KEY (UserLoginID) REFERENCES login(LoginID)
    );
    
    CREATE TABLE profile (
		ProfileID INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        UserLoginID INT,
        FOREIGN KEY (UserLoginID) REFERENCES user(UserLoginID),
        Bio VARCHAR(300) DEFAULT 'Hello! I am a cat owner, I hope to find the best products for my kitties!',
        ProfileImage VARCHAR(45),
        TotalLikes INT DEFAULT 0
    );

    CREATE TABLE products(
        ProductID INT PRIMARY KEY AUTO_INCREMENT,
        AdminLoginID INT UNSIGNED,
        FOREIGN KEY (AdminLoginID) REFERENCES administrator(AdminLoginID),
        ProductName VARCHAR(45) NOT NULL,
        ProductType VARCHAR(45),
        ProductDescription TEXT NOT NULL,
        ProductManufacturer VARCHAR(45) NOT NULL,
        ProductImage VARCHAR(45) DEFAULT NULL,
        ProductLink VARCHAR(45) NOT NULL
    );

    CREATE TABLE reviews(
        ReviewID INT AUTO_INCREMENT PRIMARY KEY,
        ProductID INT,
        FOREIGN KEY (ProductID) REFERENCES products(ProductID),
        AdminLoginID INT UNSIGNED,
        FOREIGN KEY (AdminLoginID) REFERENCES administrator(AdminLoginID),
        QualityRating INT,
        PriceRating INT,
        ReviewText TEXT,
        DateAndTime DATETIME
    );

    CREATE TABLE comments(
        CommentID INT AUTO_INCREMENT PRIMARY KEY,
        ReviewID INT,
        FOREIGN KEY (ReviewID) REFERENCES reviews(ReviewID),
        UserLoginID INT UNSIGNED,
        FOREIGN KEY (UserLoginID) references user(UserLoginID),
        CommentText TEXT NOT NULL,
        Likes INT DEFAULT 0,
        DateAndTime DATETIME
    );

INSERT INTO catsdelight.user (UserID, Username, Email, Password, Bio, TotalLikes) VALUES (1, 'Lan', 'lanngai79@gmail.com', '123', 'Hello! I am a cat owner, I hope to find the best products for my kitties!', 0);
INSERT INTO catsdelight.user (UserID, Username, Email, Password, Bio, TotalLikes) VALUES (2, 'Fausta', 'f@gmail.com', '456', 'Hello! I am a cat owner, I hope to find the best products for my kitties!', 0);
INSERT INTO catsdelight.user (UserID, Username, Email, Password, Bio, TotalLikes) VALUES (3, 'Kevin', 'k@gmail.com', '789', 'Hello! I am a cat owner, I hope to find the best products for my kitties!', 0);
INSERT INTO catsdelight.user (UserID, Username, Email, Password, Bio, TotalLikes) VALUES (4, 'RobertS', 'rsmith@hotmail.com', 'qwe', 'Hello! I am a cat owner, I hope to find the best products for my kitties!', 0);
INSERT INTO catsdelight.user (UserID, Username, Email, Password, Bio, TotalLikes) VALUES (5, 'Nathan', 'johnbarry21@hotmail.com', 'applejohn52', 'Hello! I am a cat owner, I hope to find the best products for my kitties!', 0);
