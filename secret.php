<!DOCTYPE html>
<html>
<head>
    <title>Log In App</title>
    <link rel="stylesheet" href="index.css">
</head>
<!--<div id="header"><h1 style="margin: 0">Mandatory Handin MH2</h1 ><h5 style="margin: 0">Secret page</h5></div>-->
<?php

if(isset($_SESSION['user'])){
    echo "logged in";
}else{
    echo "NOT";
}