<!DOCTYPE html>
<?php session_start();
?>
<html style="position: relative; height: 100%;">
<head>
    <title>Log In App</title>
    <link rel="stylesheet" href="index.css">
</head>
<body style="height: 100%">
<div id="header"><h1 class="headings" >Mandatory Handin MH2</h1 ><h5 class="headings" >Secret page</h5></div>
<div id="secret_content">
    <form METHOD="POST">
<?php

if(isset($_SESSION['user'])){
?>
        <input type="submit" value="Log out " id="logout" name="back">

<?php
}else{
?>
        <input type="submit" value="Error Occurred. Click this link to log in." id="back" name="back">
<?php
}

if(isset($_POST['back'])){
    session_destroy();
    header('Location: index.php');
    exit;

}
?>
    </form>
</div>
</body>
</html>