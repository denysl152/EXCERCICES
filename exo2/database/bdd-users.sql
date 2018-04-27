CREATE DATABASE user;

use user;

CREATE TABLE books (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(60) NOT NULL , 
description VARCHAR(60) NOT NULL,
image VARCHAR(60) NOT NULL , 
);
CREATE TABLE sign (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(60) NOT NULL , 
username VARCHAR(60) NOT NULL,
confirmation_token VARCHAR(60) NOT NULL , 
);