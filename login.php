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
<div id="header"><h1 class="headings" >(MH2)Log In </h1></div>
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
            Password:<br> <input type="password" name='password'> <br>
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
// if log in button hit, handle log in
if (isset($_POST['login'])) {

    if ($_POST['user'] != null && $_POST['password'] != null) {
        $user = $_POST['user'];
        $pass = $_POST['password'];
        if(strlen($user)< 5){
            echo "<br><br>too short";
        }else if(strlen($user) >= 5){
            echo "<br><br>OK";
        }
        $email;
        $stmt = $mysqli->prepare("SELECT Email FROM users WHERE UserName=? and Password=?");
        $stmt->bind_param("ss", $user, $pass);
        $stmt->execute();
        $stmt->bind_result($mail);
        $stmt->fetch();
        if ($mail != null) {
            $_SESSION['user'] = $user;
            header('Location: secret.php');
            exit;

        } else {
            echo "<br><br>Incorect Log In inforation !!!";
        }
        $stmt->close();
    } else {
        echo "<br><br>Enter Log In information";
    }
}

// If register button hit, handle registration
if(isset($_POST['register'])){
    if ($_POST['user'] != null && $_POST['password'] != null &&  $_POST['email'] != null){
        $user = $_POST['user'];
        $pass = $_POST['password'];
        $email = $_POST['email'];

        $temp_user =  false;
        $temp_mail = false;
        $temp_pass = false;
        $temp_mail_used = false;

        // checking if user name is not shorter than 5 characters
        if(strlen($user)< 5){
            $temp_user = true;
            echo "<br><br>too short";
        }
        //checking if password contains minimum 5 characters
        if(strlen($pass)< 5){
            $temp_pass = true;
            echo "<br><br> pass too short";
        }
        //checking if email is written correctly
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $temp_mail == true;
            echo "E-mail is not valid";
        }
        // checking if email isn't registered
        $id;
        $stmt = $mysqli->prepare("SELECT id FROM users WHERE Email=?");
        $stmt->bind_param("s", $_POST['email']);
        $stmt->execute();
        $stmt->bind_result($id);
        if($id != null){
            $temp_mail_used = true;
            echo "<br><br>this email is registered.";
        }
        $stmt->close();

        //If data is valid, insert it into the database
        if(!$temp_user && !$temp_mail && !$temp_pass && !$temp_mail_used ){
            $result = $mysqli->query("INSERT INTO `users`(`UserName`, `Password`, `Email`) VALUES ( '".$user."','".$pass."','".$email."' )");
//            $result->bind_param("sss", $user, $pass, $email);
            if (!$result){
                echo $mysqli->error;
                exit;
            }else {
                session_destroy();
                header('Location: login.php');
                exit;
            }
        }
    }
}

?>
</div>
</body>
</html>

