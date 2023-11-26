<?php
session_start();
require_once 'connection.php';

try{
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

if(isset($_POST["signup"]))  {

    $err = NULL;

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // check if any field is empty
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $err = "All fields are required.<br>"; 
    } else {
    
    // check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err = "Please enter a valid email.<br>";
    }

    // check password length
    if (strlen($password) < 8) {
        $err = "Password must have at least 8 characters.<br>";
    }

    // validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$number) {
        $err = "Password must contain at least one uppercase letter and a number.<br>";
    }
    
    // validate password confirmation
    if ($password !== $confirm_password) {
        $err = "Passwords must match.";
    }

    // check if username exits
    $stmt1 = $conn->prepare("SELECT username FROM user WHERE BINARY username= BINARY :username");
    $stmt1->bindParam(':username', $username);
    $stmt1->execute();
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

    // check if email is already registered
    $stmt2 = $conn->prepare("SELECT email FROM user WHERE email = :email");
    $stmt2->bindParam(':email', $email);
    $stmt2->execute();
    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($row1) {
        $err = "Username already taken";
    } else if ($row2){
        $err = "Email already registered";
    }
    
    if (!isset($err)) {
        // hash password to make it more secure
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO user (username, email, password_hash) values (:username, :email, :password_hash)";
        $stmt3 = $conn->prepare($query); 

        $stmt3->bindParam(':username', $username);
        $stmt3->bindParam(':email', $email);
        $stmt3->bindParam(':password_hash', $password_hash);

        $stmt3->execute();
        $sucess_msg = "Account created successfully<br>";
       // echo "<a href='login.php'>Click to Login</a>";
        //header("Location: index.html");
       // exit;
    }

    }

    $conn = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script>
    <title>Sign Up</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 400px;
            border: 1px solid #000;
            border-radius: 20px; 
            padding: 30px;
        }
     
    </style>
</head>
<body>
<form class="text-center mx-auto" id="signup" action="signup.php" method="post" novalidate>
    <div><h1>Sign Up</h1></div>
    <br>

    <?php if (isset($err)): ?>
        <?php echo "<p style='color:red;'>$err</p>" ?>
    <?php endif; ?>
   
    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
    <br>
    <input type="text" id="email" name="email" class="form-control" placeholder="Email">
    <br>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <br>
    <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password">
    <br>

    <?php if (isset($sucess_msg)): ?>
        <?php echo "<p style='color:green;'>$sucess_msg</p>" ?>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary btn-default mx-auto"  name="signup">Sign Up</button>
    <br><br>
    <a href='login.php'>Click to Login</a>
</form>
</body>
</html>

