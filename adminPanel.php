<?php
session_start();

require_once("database/ProductDb.php");
require_once("database/UserDb.php");
require_once('component.php');

$productDb = new ProductDb();
$userDb = new UserDb();

if (isset($_POST['saveUser'])) {
  $userdb->updateUser($_POST["username"], $_POST["email"], (int)$_POST["userid"]);
  header("location: adminPanel.php");
}


if (isset($_POST['deleteProduct'])) {
  $productDb->deleteProduct($_POST["productid"]);
  header("location: adminPanel.php");
}


if (isset($_POST['deleteUser'])) {
  $userdb->removeUser($_POST["userid"]);
  header("location: adminPanel.php");
}


if (isset($_POST['addProduct'])) {

  if (isset($_FILES['productImage'])) {
    $errors = array();
    $file_name = $_FILES['productImage']['name'];
    $file_size = $_FILES['productImage']['size'];
    $file_tmp = $_FILES['productImage']['tmp_name'];
    $file_type = $_FILES['productImage']['type'];

    if ($file_size > 2097152) {
      $errors[] = 'File size must be less than 2 MB';
    }

    if (empty($errors) == true) {
      move_uploaded_file($file_tmp, dirname(__FILE__) . "/assets/products/" . $file_name);
    } else {
      print_r($errors);
    }
  }
  $imagePath = "assets/products/" . $_FILES['productImage']['name'];

  $productDb->addProduct($_POST["prodName"], $_POST["prodCat"], (int)$_POST["prodPrice"], $imagePath);
  header("location: adminPanel.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--Bootstrap CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <title>Home</title>

</head>
<?php if ($_SESSION["username"] == "admin") : ?>

  <body style="min-height: calc(100vh - 57px);">
    <div class="card text-center h-100">
      <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User Details</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="adminPanel.php" method="post" id="editUserForm">
                <input id="userIdInput" type="hidden" name="userid"><br>
                Name: <input id="usernameInput" type="text" name="username"><br>
                E-mail: <input id="emailInput" type="text" name="email"><br>
            </div>
            <div class="modal-footer">
              <button type="submit" id="editUserSubmit" name="saveUser" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
        </div>
      </div>

      <div class="card-header  pt-3 pb-0">
        <nav>
          <div class="nav nav-tabs " id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Manage Users</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Manage Products</button>
            <button class="nav-link" id="nav-add-tab" data-bs-toggle="tab" data-bs-target="#nav-add" type="button" role="tab" aria-controls="nav-add" aria-selected="false">Add Product</button>
            <a href="logout.php" style="text-decoration: none;"><button class="nav-link" id="nav-contact-tab" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Log Out</button></a>
          </div>
        </nav>
      </div>

      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $userdb->getData();
                while ($row = mysqli_fetch_assoc($result)) {
                  displayUsers($row['user_id'], $row['username'], $row['email']);
                }
                ?>
              </tbody>
            </table>
          </div>

          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Image</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $productDb->getAllProducts();
                while ($row = mysqli_fetch_assoc($result)) {
                  displayProducts($row['product_name'], $row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
                }
                ?>
              </tbody>
            </table>
          </div>

          <div class="tab-pane fade" id="nav-add" role="tabpanel" aria-labelledby="nav-add-tab" tabindex="0">
            <h3>Add a New Product</h3>
            <form action="adminPanel.php" method="post" id="addProductForm" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="productName" class="form-label">Name</label>
                <input type="text" class="form-control" id="productName" name="prodName">
              </div>
              <div class="mb-3">
                <label for="productCategory" class="form-label">Category</label>
                <input type="text" class="form-control" id="productCategory" name="prodCat">
              </div>
              <div class="mb-3">
                <label for="productPrice" class="form-label">Price</label>
                <input type="number" class="form-control" id="productPrice" name="prodPrice">
              </div>
              <div class="mb-3 d-flex flex-column align-items-center">
                <label for="productImage" class="form-label">Image</label>
                <input type="file" name="productImage" accept="image/*">
              </div>
              <button type="submit" class="btn btn-primary mt-3" name="addProduct">Add Product</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  <footer class="container-fluid text-center py-3" style="background-color: #A6BB8D;">
    <p class="mb-0">EcoTribe, Designed by Rachel & Tim © 2023.</p>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Custom Javascript -->
  <script>
    $(document).ready(function() {
      $(".editUserBtn").click(function() {
        var userid = $(this).closest('tr').children('th').html();
        var name = $(this).closest('tr').children('td').html();
        var mail = $(this).closest('tr').children('td').eq(1).html();
        console.log(userid);
        $("#userIdInput").attr("value", userid);
        $("#usernameInput").attr("value", name);
        $("#emailInput").attr("value", mail);
      });

    });
  </script>

<?php else : ?>
  <h3 class="text-center text-danger">You do not have authorised access to the admin panel. Only the admin can access this page.</h3>
<?php endif; ?>

</html>