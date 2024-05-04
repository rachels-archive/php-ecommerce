<?php

function component($productname, $productcategory, $productprice, $productimg, $productid)
{
  $element = "
    <div class=\"col-md-3 col-sm-6 my-3 md-0\">
      <form id=\"submitform\" action=\"shop.php\" method=\"post\">
        <div class=\"card shadow\">
          <img src=\"$productimg\" alt=\"image1\" class=\"img-fluid\">
          <div class=\"card-body\">
            <h5 class=\"card-title\">$productname</h5>
            <p class=\"card-text\">
              $productcategory
            </p>
            <h5><span class=\"price\">RM $productprice</span></h5>
            <button type=\"submit\" name=\"add\" class=\"btn btn-success my-3\">Add to Cart</button>
            <input type=\"hidden\" name=\"product_id\" value=\"$productid\">
          </div>
        </div>
      </form>
    </div>
    ";
  echo $element;
}


function componentDisabled($productname, $productcategory, $productprice, $productimg, $productid)
{
  $element = "
  <div class=\"col-md-3 col-sm-6 my-3 md-0\">
    <form action=\"shop.php\" method=\"post\">
      <div class=\"card shadow\">
        <img src=\"$productimg\" alt=\"image1\" class=\"img-fluid\">
        <div class=\"card-body\">
          <h5 class=\"card-title\">$productname</h5>
          <p class=\"card-text\">
            $productcategory
          </p>
          <h5><span class=\"price\">RM $productprice</span></h5>
          <button type=\"submit\" name=\"add\" class=\"btn btn-success my-3\" disabled>Add to Cart</button>
          <div><small class=\"text-danger\">Log in to add to cart</small></div>
          
          <input type=\"hidden\" name=\"product_id\" value=\"$productid\" id=\"prod\">
        </div>
      </div>
    </form>
  </div>
  ";
  echo $element;
}


function cartElement($productname, $productcategory, $productprice, $productimg, $productid)
{
  $element = "
  <form action=\"cart.php?action=remove&id=$productid\" method=\"post\" class=\"cart-items\">
    <div class=\"border border-2 rounded mb-4\">
        <div class=\"row\">
            <div class=\"col-md-3 pl-0\">
                <img src=\"$productimg\" class=\"img-fluid\">
            </div>
            <div class=\"col-md-9\">
                <h5 class=\"pt-2\">$productname</h5>
                <small class=\"text-secondary\">$productcategory</small>
                <h5 class=\"pt-2\">RM $productprice</h5>
                <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
            </div>
        </div>
    </div>
   </form>                      
";

  echo $element;
}


function displayUsers($userid, $username, $email)
{
  $element = "
  <form id=\"deleteUserForm\" action=\"adminPanel.php\" method=\"post\">
  <tr>
    <th scope=\"row\">$userid</th>
    <td>$username</td>
    <td>$email</td>
    <td class=\"align-middle\">
    <input type=\"hidden\" name=\"userid\" value=\"$userid\" />
    <button type=\"button\" class=\"btn btn-warning editUserBtn\" data-bs-toggle=\"modal\" data-bs-target=\"#editUserModal\">Edit</button>
    <button type=\"submit\" class=\"btn btn-danger deleteUserBtn\" name=\"deleteUser\">Delete</button>
    </td>
  </tr>
  </form>
";
  echo $element;
}


function displayProducts($productname, $productcategory, $productprice, $productimg, $productid)
{
  $element = "
  <form id=\"deleteProductForm\" action=\"adminPanel.php\" method=\"post\">
    <tr>
      <th scope=\"row\">$productid</th>
      <td>$productname</td>
      <td>$productcategory</td>
      <td>$productprice</td>
      <td style=\"width:20%\"><img class=\"img-thumbnail\" src=\"$productimg\"></td>
      <td class=\"align-middle\">
      <input type=\"hidden\" name=\"productid\" value=\"$productid\" />
      <button type=\"submit\" class=\"btn btn-danger deleteProductButton\" name=\"deleteProduct\">Delete</button>
      </td>
    </tr>
    </form>
  ";
  echo $element;
}


?>