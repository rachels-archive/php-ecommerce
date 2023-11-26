<?php

session_start();


require_once('component.php');


require_once ('database/CreateDb.php');
require_once ('component.php');

$database = new CreateDb("ecotribe", "product");

if (isset($_POST['add'])){
  /// print_r($_POST['product_id']);
  if(isset($_SESSION['cart'])){

      $item_array_id = array_column($_SESSION['cart'], "product_id");
      

      if(in_array($_POST['product_id'], $item_array_id)){
          echo "<script>alert('Product is already added into the cart.')</script>";
         //print_r( $item_array_id);
          echo "<script>window.location = 'shop.php'</script>";
      }else{

          $count = count($_SESSION['cart']);
          $item_array = array(
              'product_id' => $_POST['product_id'],
              'user_id' => $_SESSION["user_id"]
          );

          $_SESSION['cart'][$count] = $item_array;
          print_r($_SESSION['cart']);
      }

  }else{

      $item_array = array(
              'product_id' => $_POST['product_id'],
              'user_id' => $_SESSION["user_id"]
      );

      // Create new session variable
      $_SESSION['cart'][0] = $item_array;
      print_r($_SESSION['cart']);
  }
}


?>

<?php

include ('header.php');

?>


<div class="container">
  <div class="row text-center py-5">
    <?php 
      $result = $database->getData();
      
      while ($row = mysqli_fetch_assoc($result)){
        if (isset($_SESSION['loggedin'])) {
          component($row['product_name'],$row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
        } else {
          componentDisabled($row['product_name'],$row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
          //echo "<script>alert('Log in to make a purchase.')</script>";
        }
        
    }
    ?>
  </div>
</div>


<?php

include('footer.php')

?>