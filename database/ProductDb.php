<?php

require_once 'CreateDb.php';

class ProductDb extends CreateDb
{
    public $tablename;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "ecotribe", $tablename = "product")
    {
        parent::__construct($servername, $username, $password);
        $this->selectDatabase($dbname);
        $this->tablename = $tablename;
    }

    public function getAllProducts()
    {
        $sql = "SELECT * FROM $this->tablename";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function addProduct($productName, $productCategory, $productPrice, $productImage)
    {
        $sql = "INSERT INTO product (product_name, product_category, product_price, product_image) VALUES ('$productName', '$productCategory', $productPrice, '$productImage') ";
        mysqli_query($this->con, $sql);
    }

    public function deleteProduct($productId)
    {
        $sql = "DELETE FROM product WHERE product_id=$productId";
        mysqli_query($this->con, $sql);
    }
}
