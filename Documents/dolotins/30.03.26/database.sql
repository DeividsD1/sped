-- Create database
CREATE DATABASE IF NOT EXISTS sped_db;
USE sped_db;

-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vards VARCHAR(100) NOT NULL,
    uzvards VARCHAR(100) NOT NULL,
    epasts VARCHAR(255) NOT NULL UNIQUE,
    telefons VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
