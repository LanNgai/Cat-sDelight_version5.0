
CREATE DATABASE catsdelight;


use catsdelight;
    CREATE TABLE user (
        UserID INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Username VARCHAR(45) NOT NULL,
        Email VARCHAR(45) NOT NULL,
        Password VARCHAR(300) NOT NULL,
        Bio VARCHAR(45),
        TotalLikes INT
    );