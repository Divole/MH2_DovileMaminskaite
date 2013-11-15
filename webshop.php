<!DOCTYPE html>
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body style="text-align: center">
<div id="header"><h1 class="headings" >(MH2)Web Shop </h1></div>
<div style="margin-top: 20%; display: inline-block">

        <form method="POST">
            <div style="width: 300px; height: 160px; border: 1px solid; text-align: left; padding: 10px">
                <p>Item1:</p>
                <select name="item1">
                    <option value="none">Select...</option>
                    <option value="beer">Beer</option>
                    <option value="coke">Coca Cola</option>
                    <option value="watter">Bottle Watter</option>
                </select>
                <input type="text" name="amount_1"></br></br>

                <p>Item2:</p>
                <select name="item2">
                    <option value="none">Select...</option>
                    <option value="mars">Mars bar</option>
                    <option value="twix">Twix bar</option>
                    <option value="bounty">Bounty bar</option>
                </select>
                <input type="text" name="amount_2">
            </div>
            <div style="width: 300px; height: 150px; border: 1px solid; text-align: left; padding: 10px ">
                <p><label class="user_field" for="name">Name:</label> <input type="text" name="name" ></p>
                <p><label class="user_field" for="address">Address:</label> <input type="text" name="address"></p>
                <p><label class="user_field" for="city">City:</label> <input type="text" name="city"></p>
                <input type="submit" name="order" value="Order" >
            </div>
    </form>
</div>
<div style=" margin-top: 10px; font-size: 20px;">
<?php
$prices = Array();
$prices['mars'] = 20.00;
$prices['twix'] = 25.50;
$prices['bounty'] = 15.00;
$prices['beer'] = 40.00;
$prices['coke'] = 30.00;
$prices['watter'] = 25.00;

if(isset($_POST['order'])){

    if($_POST['item1']!=="none" && $_POST['item2']!== "none" && isset($_POST['amount_1'])&&isset($_POST['amount_2'])&&isset($_POST['name'])&&isset($_POST['address'])&&isset($_POST['city'])){
//        echo "<p style='color: lawngreen'>order OK</p>";
        $item1 = $_POST['item1'];
        $amount1 = $_POST['amount_1'];
        $item2 = $_POST['item2'];
        $amount2 = $_POST['amount_2'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
//        echo $prices[$_POST['item1']];
//        require "Order.php";
//        $order = new Order();
//        header("Location: Order.php");
        require("fpdf/fpdf.php");

        $pdf = new FPDF( );
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,0,'MH2 Webshop',0,0,'C');
        $pdf->Output();


    }else{
        echo "<p style='color: red'>Order failed </p>";
    }
}
?>
</div>
</body>
</html>

