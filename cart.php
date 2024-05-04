<?php
session_start();
require_once("database/CartDb.php");
require_once("component.php");

$cartDb = new CartDb();

if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
        $cartDb->removeFromCart($_GET['id'], $_SESSION['user_id']);
        echo "<script>alert('Product removed from cart.')</script>";
        echo "<script>window.location = 'cart.php'</script>";
    }
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

<body>
    <header>
        <nav class="navbar navbar-expand-lg " style="background-color: #A6BB8D;">
            <div class="container-fluid" style="background-color: #A6BB8D;">
                <a class="navbar-brand" href="#">EcoTribe</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link mx-2 active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="#">Get Involved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-2" href="contact.php">Contact</a>
                        </li>

                        <?php if (isset($_SESSION["user_id"])) : ?>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="logout.php">Log Out</a>
                            </li>
                        <?php else : ?>
                            <li class="nav-item">
                                <a class="nav-link mx-2" href="login.php">Login</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container-fluid py-3" style="min-height: calc(100vh - 110px );">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h3> Shopping Cart</i></h3>
                    <hr>
                    <?php
                    $total = 0;

                    if (isset($_SESSION['loggedin'])) {
                        $result = $cartDb->getCart($_SESSION['user_id']);
                        if (!$result) {
                            echo "<h5>Cart is empty</h5>";
                        } else {
                            //print_r($result);
                            while ($row = mysqli_fetch_assoc($result)) {
                                cartElement($row['product_name'], $row['product_category'], $row['product_price'], $row['product_image'], $row['product_id']);
                                $total = $total + (int)$row['product_price'];
                            }
                        }
                    } else {
                        echo "<h5>Cart is empty</h5>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                            if (isset($_SESSION['cart'])) {
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            } else {
                                echo "<h6>Price (0 items)</h6>";
                            }
                            ?>
                            <h6>Delivery Charges</h6>
                            <hr>
                            <h6>Amount Payable</h6>
                        </div>
                        <div class="col-md-6">
                            <h6>$<?php echo $total; ?></h6>
                            <h6 class="text-success">FREE</h6>
                            <hr>
                            <h6>$<?php echo $total; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include('footer.php'); ?>