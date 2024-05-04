<?php
session_start();

require_once('database/ProductDb.php');
require_once('database/CartDb.php');
require_once('component.php');

$productDb = new ProductDb();
$cartDb = new CartDb();

if (isset($_POST['add'])) {
  if (isset($_SESSION['cart'])) {

    $item_array_id = array_column($_SESSION['cart'], "product_id");

    if (in_array($_POST['product_id'], $item_array_id)) {
      echo "<script>alert('Product already added to cart.')</script>";
      echo "<script>window.location = 'shop.php'</script>";
    } else {

      $count = count($_SESSION['cart']);
      $item_array = array(
        'product_id' => $_POST['product_id']
      );
      $_SESSION['cart'][$count] = $item_array;
      $cartDb->addToCart($_SESSION['user_id'], $_POST['product_id']);
      echo "<script>alert('Product successfully added to cart.')</script>";
      echo "<script>window.location = 'shop.php'</script>";
    }
  } else {

    $item_array = array(
      'product_id' => $_POST['product_id']
    );

    // Create new session variable
    $_SESSION['cart'][0] = $item_array;

    $cartDb->addToCart($_SESSION['user_id'], $_POST['product_id']);
  }
}

include('header.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Home</title>

  <style>
    img {
      max-width: 100%;
      height: auto;
      background: lightblue;
      background: radial-gradient(white 30%, lightblue 70%);
    }
  </style>
</head>

<div class="container">
  <div class="row text-center py-5">
    <?php
    $result = $productDb->getAllProducts();

    while ($row = mysqli_fetch_assoc($result)) {
      if (isset($_SESSION['loggedin'])) {
        component($row['product_name'], $row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
      } else {
        componentDisabled($row['product_name'], $row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
      }
    }
    ?>
  </div>
</div>

<?php

include('footer.php');

?>