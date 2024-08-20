<?php


use App\Core\BaseMigration;
use database\DBConnection;

require "App\Core\BaseMigration.php";

class ProductMigration extends BaseMigration {
    public function up() {
        $sql = "CREATE TABLE products (
                      id INT AUTO_INCREMENT PRIMARY KEY,
                    sku VARCHAR(255) NOT NULL UNIQUE,
                    name VARCHAR(255) NOT NULL,
                    price DECIMAL(10, 2) NOT NULL,
                    type VARCHAR(50) NOT NULL,
                    size INT,
                    weight DECIMAL(10, 2),
                    height DECIMAL(10, 2),
                    width DECIMAL(10, 2),
                    length DECIMAL(10, 2),
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )";
        DBConnection::getInstance()->exec($sql);
    }

    public function down() {
        $sql = "DROP TABLE IF EXISTS products";
        DBConnection::getInstance()->exec($sql);
    }
}