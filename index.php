<?php
require "model/User.php";
require "DatabaseBroker.php";

session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $results = User::login($username, $password, $conn);

    if($results->num_rows == 1) {
        $_SESSION['id'] = $results->fetch_assoc()['id'];
        header('Location: home.php');
    }
    else
    {
        echo '<script>alert("Ne postoji korisnik sa ovim username-om i password-om.")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="resources/favicon.ico">
        <link rel="stylesheet" href="login.css">
        <title>GPU prodavnica login</title>
    </head>
    <body>
        <div class="login-div">
            <form method="POST" action="#">
                <div class="login-image">
                    <img class="login-image" src="resources/login-image.png" alt="Logo">
                </div>
                <div class="container">
                    <input type="text" placeholder="Username" name="username" required>
                    <br>
                    <input type="password" placeholder="Password" name="password" required>
                    <br>
                    <button class="button" type="submit">Prijavi se</button>
                </div>
            </form>
        </div>
    </body>
</html>