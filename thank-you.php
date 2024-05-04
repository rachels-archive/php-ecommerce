<?php

session_start();

include('header.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $mailFrom = $_POST['mail'];
    $message = $_POST['message'];

    $validation = data_validation($name, "/^[a-zA-Z\s]{3,30}$/", "name");
    $validation .= data_validation($mailFrom, "/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", "email");
    $validation .= data_validation($subject, "/^.+$/", "subject");
    $validation .= data_validation($message, "/^.+$/", "message");

    if ($validation == "") {
        // Process the form data and send the email
        $mailTo = "";  // Add the recipient email address
        $headers = "From: " . $mailFrom;
        $txt = "You have received an e-mail from " . $name . ".\n\n" . $message;

        mail($mailTo, $subject, $txt, $headers);
        header("Location: thank-you.php"); // Redirect to homepage after successful form submission
        exit();
    } else {
        echo $validation;
    }
}

function data_validation($data, $data_pattern, $data_type)
{
    if (preg_match($data_pattern, $data)) {
        return "";
    } else {
        return " Invalid data for " .  $data_type . ";";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Homepage</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .column {
            width: 40%;
            padding: 3px;
        }

        .text-content {
            padding-right: 7px;
        }

        .image-content {
            overflow: hidden;
            margin: 20px;
        }

        .image-content img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .navbar {
            height: 80px;
        }

        .btn-outline-dark {
            padding: 10px 20px;
            font-weight: bold;
            border-width: 2px;
        }

        .btn-outline-dark:hover {
            background-color: #A6BB8D;
            color: green;
            border-color: green;
        }


        .container {
            text-align: center;
        }

        .contact-form {
            display: inline-block;
            text-align: left;
            background-color: white;
            padding: 70px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 60%;
            margin: auto;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .contact-form button {
            padding: 15px 30px;
            background-color: #3C6255;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #A6BB8D;
        }
    </style>
</head>

<body>


    <div style="text-align: center; padding: 20px; background-color: #F5F5DC">
        <h3 style="color:green;">Your message has been sent successfully. Thank you!</h3>
        <h3>Contact Us</h3>
    </div>


    <section class="hero section" style="background-color: #F5F5DC; padding-bottom: 40px;">
        <div class="container">
            <form class="contact-form text-center" action="contact.php" method="post">
                <input type="text" name="name" placeholder="Full Name">
                <br><br>
                <input type="text" name="mail" placeholder="Email">
                <br><br>
                <input type="text" name="subject" placeholder="Subject">
                <br><br>
                <textarea name="message" placeholder="Message"></textarea>
                <br><br>
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </section>

    <?php

    include('footer.php');

    ?>