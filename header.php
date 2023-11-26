<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <!--Bootstrap CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Home</title>

</head>


<body>
    <header>
	<div class="d-flex justify-content-between bg-dark">
		<p class="mx-2 my-0">
		<?php if (isset($_SESSION["user_id"])) echo "Logged in as ". $_SESSION["username"] ?>       
		</p>

		<?php 
		if (isset($_SESSION['cart']) && isset($_SESSION['loggedin'])) {
			$count = count($_SESSION['cart']);
		} else {
			$count=0;
		}
		$output =  "
		<a href=\"cart.php\" class=\"nav-item nav-link active\">
			<h5 class=\"px-5 cart text-light\">
				<i class=\"fa-solid fa-shopping-cart\" style=\"color:#fff;\"></i>Cart
					<span id=\"cart_count\" class=\"text-dark bg-light\" style=\"border-radius:15px; padding:0 15px;\">$count</span>
			</h5>
		</a>
	";
		echo $output;
		?>


	</div>
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
                <?php else: ?>
                    <li class="nav-item">
	                    <a class="nav-link mx-2" href="login.php">Login</a>
	                </li>
                <?php endif; ?>
	        </ul>
	      </div>
	    </div>
	    </nav>
        </header>