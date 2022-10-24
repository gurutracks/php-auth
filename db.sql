CREATE DATABASE auth_db;

USE auth_db;

CREATE TABLE auth_table (
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(50) NOT NULL,
    password varchar(255) NOT NULL,
    email VARCHAR(100),
	create_date DATETIME DEFAULT CURRENT_TIMESTAMP
);