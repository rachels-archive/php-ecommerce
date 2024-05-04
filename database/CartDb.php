<?php

require_once 'CreateDb.php';

class CartDb extends CreateDb
{
    public $tablename;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "ecotribe", $tablename = "cart")
    {
        parent::__construct($servername, $username, $password);
        $this->selectDatabase($dbname);
        $this->tablename = $tablename;
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
}
