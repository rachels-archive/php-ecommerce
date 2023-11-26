<?php 
require_once 'connection.php';

try{
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST["login"]))  {

        $is_invalid = false;

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (empty($username) || empty($password)) {
            $message = "All fields are required";
        } else {

            $stmt = $conn->prepare("SELECT * FROM user WHERE BINARY username=:username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if($username == $row['username']) {
                    if(password_verify($password, $row['password_hash'])) {
                        // Store data in session variables
                        session_start();
                        session_regenerate_id();
                        $_SESSION["loggedin"] = true; 
                        $_SESSION["user_id"] = $row['user_id'];
                        $_SESSION["username"] = $_POST["username"];  
                        header("location: index.php");  
                        exit;
                    } else {
                        $message = "Invalid password";
                    }
                } 
            } else {
                $message = "Invalid username";
            }
        }
        $is_invalid = true;
    
    }
    $conn = null;
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            width: 300px;
        }
     
    </style>
</head>
<body>
<form class="text-center mx-auto" style="border: 1px solid #000; border-radius: 20px; padding: 30px;" action="login.php" method="post">
    <div><h1>LOGIN</h1></div>
    <br>
    <?php if ($is_invalid): ?>
        <?php echo "<p>$message</p>" ?>
    <?php endif; ?>
   
    <input type="text" id="name" name="username" class="form-control" placeholder="Username">
    <br>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <br>
    <button type="submit" name="login" class="btn btn-primary btn-default mx-auto">Login</button>
    <br><br>
    <a href="signup.php">Create an account</a>

</form>
</body>
</html>
