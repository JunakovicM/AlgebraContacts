CREATE DATABASE IF NOT EXISTS algebra_contacts DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE algebra_contacts;

CREATE TABLE IF NOT EXISTS users(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(64) NOT NULL,
    salt VARCHAR(32) NOT NULL,
    name VARCHAR(50) NULL,
    joined TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    role_id INT UNSIGNED NOT NULL
)ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS roles(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(20) NOT NULL,
    permissions TEXT NOT NULL,
    created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS sessions(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    hash VARCHAR(64) NOT NULL,
    user_id INT UNSIGNED NOT NULL
   
)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS persons(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(128) NOT NULL,
    user_id INT UNSIGNED NOT NULL

)ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS contacts(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    contact_type VARCHAR(255) NOT NULL,
    contact_data TEXT NOT NULL,
    person_id INT UNSIGNED NOT NULL

)ENGINE = InnoDB;