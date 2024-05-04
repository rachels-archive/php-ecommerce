<?php

class CreateDb
{
    public $servername;
    public $username;
    public $password;
    //public $dbname;
    //public $tablename;
    public $con;


    // class constructor
    public function __construct(
        // $dbname = "ecotribe",
        // $tablename = "product",
        $servername = "localhost",
        $username = "root",
        $password = ""
    ) {

        //  $this->dbname = $dbname;
        // $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->con = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }
    }
    // query
    //$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    public function selectDatabase($dbname)
    {
        // Query to create database if not exists
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        // Execute query
        if (mysqli_query($this->con, $sql)) {
            // Connect to the specified database
            $this->con = mysqli_connect($this->servername, $this->username, $this->password, $dbname);
        } else {
            return false;
        }
    }

    public function closeConnection()
    {
        // Close connection
        mysqli_close($this->con);
    }

    /*
        // execute query
        if (mysqli_query($this->con, $sql)) {

            $this->con = mysqli_connect($servername, $username, $password, $dbname);


            // sql to initialise product table table
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (product_id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             product_name VARCHAR (25) NOT NULL,
                             product_category VARCHAR (25) NOT NULL,
                             product_price FLOAT,
                             product_image VARCHAR (100)
                            );
                    ";

            if (!mysqli_query($this->con, $sql)) {
                echo "Error creating table : " . mysqli_error($this->con);
            }
        } else {
            return false;
        }
    }

    // get entry from the database
    public function getData()
    {
        $sql = "SELECT * FROM $this->tablename ";

        $result = mysqli_query($this->con, $sql);

        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function addToCart($userid, $productid)
    {
        $sql = "INSERT INTO cart (user_id,item_id) VALUES ($userid, $productid) ";
        mysqli_query($this->con, $sql);
    }

    public function getCart($userid)
    {
        $sql = "SELECT * FROM cart INNER JOIN product ON cart.item_id = product.product_id WHERE user_id = $userid;";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function removeFromCart($productid, $userid)
    {
        $sql = "DELETE FROM cart WHERE user_id=$userid AND item_id=$productid;";
        mysqli_query($this->con, $sql);
    }

    public function getCartCount($userid)
    {
        $sql = "SELECT COUNT(*) as count FROM cart WHERE user_id=$userid;";

        $result = mysqli_query($this->con, $sql);

        $val = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0) {
            echo $val['count'];
        }
    }

    public function updateUser($newName, $newEmail, $userid)
    {
        $sql = "UPDATE user SET username = '$newName', email = '$newEmail' WHERE user_id = $userid";
        mysqli_query($this->con, $sql);
    }

    public function removeUser($userid)
    {
        $sql = "DELETE FROM user WHERE user_id=$userid";
        mysqli_query($this->con, $sql);
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
    }*/
}
