<!DOCTYPE html>
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Log In App</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<?php

$mysqli = new mysqli("localhost", "root", null, "login");
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
} else {
    ?>
<div id="header"><h1 class="headings" >Mandatory Handin MH2</h1></div>
<div id="login">
    <div id="login_form">
        <form method='post'>
            User Name: <br><input type="text" name='user'> <br>
            <?php
            if (isset($_POST['register'])) {
                ?>
                Email: <br><input type="email" name='email'> <br>
            <?php
            }
            ?>
            Password:<br> <input type="text" name='password'> <br>
            <?php
            if (!isset($_POST['register'])) {
                ?>
                <input type='SUBMIT' value='Log In' name='login' style="cursor: pointer"> <br><br>
                <input type="submit" value="Don't have  an account? Register" id="register" name="register">
            <?php
            } else {
                ?>
                <input type='SUBMIT' value='Register' name='register' style="cursor: pointer"> <br><br>
            <?php
            }
            ?>
    </div>


<?php
}

if (isset($_POST['login'])) {

    if ($_POST['user'] != null && $_POST['password'] != null) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE UserName=? and Password=?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $id;
        $stmt->bind_result($id);
        $stmt->fetch();
        if ($id != null) {



            $_SESSION['user'] = $user;


           header('Location: secret.php');

            exit;

        } else {
            echo "Incorect Log In inforation !!!";
        }
        $stmt->close();

    } else {
        echo "<br><br>Enter Log In information";
    }
}
if(isset($_POST['register'])){
    if ($_POST['user'] != null && $_POST['password'] != null &&  $_POST['email'] != null){
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $email = $_POST['email'];
        $stmt = $mysqli->prepare("INSERT INTO `users`(`UserName`, `Password`, `Email`) VALUES (?,?,?)");
        $stmt->bind_param("sss", $user, $pass,$email);
        if ($result = $stmt->execute()){
            $stmt->free_result();
            session_destroy();
            header('Location: index.php');
            exit;

        }
        else {
            echo "error";
        }



    }

}

?>
</div>
</body>
</html>

