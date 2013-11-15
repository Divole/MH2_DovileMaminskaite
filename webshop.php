<!DOCTYPE html>
<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body style="text-align: center">
<div id="header"><h1 class="headings" >(MH2)Web Shop </h1></div>
<div class="bg" style="margin-top: 20%; display: inline-block">

        <form method="POST">
            <div style="width: 300px; height: 160px; border: 1px solid; text-align: left; padding: 10px">
                <p>Item1:</p>
                <select name="item1">
                    <option value="none">Select...</option>
                    <option value="Beer">Beer</option>
                    <option value="Coke">Coca Cola</option>
                    <option value="Watter">Bottle Watter</option>
                </select>
                <input type="text" name="amount_1"></br></br>

                <p>Item2:</p>
                <select name="item2">
                    <option value="none">Select...</option>
                    <option value="Mars">Mars bar</option>
                    <option value="Twix">Twix bar</option>
                    <option value="Bounty">Bounty bar</option>
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
$prices['Mars'] = 20.00;
$prices['Twix'] = 25.50;
$prices['Bounty'] = 15.00;
$prices['Beer'] = 40.00;
$prices['Coke'] = 30.00;
$prices['Watter'] = 25.00;

if(isset($_POST['order'])){

    if($_POST['item1']!=="none" && $_POST['item2']!== "none" && isset($_POST['amount_1'])&&isset($_POST['amount_2'])&&isset($_POST['name'])&&isset($_POST['address'])&&isset($_POST['city'])){
        $item1 = $_POST['item1'];
        $amount1 = $_POST['amount_1'];
        $item2 = $_POST['item2'];
        $amount2 = $_POST['amount_2'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $date = date("Y-m-d");
        $invoice = 123456789;

        require("fpdf/fpdf.php");

        $pdf = new FPDF( );
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(0,0,'MH2 Webshop',0,0,'C');
        $pdf->SetFont('Arial','',15);
        $pdf->Ln(30);
        $pdf->Cell(0,0,$name,0,0,L);
        $pdf->Cell(0,0,$date,0,0,R);

        $pdf->Ln(8);
        $pdf->Cell(0,0,$address,0,0,L);
        $pdf->Cell(0,0,$invoice,0,0,R);
        $pdf->Ln(8);
        $pdf->Cell(0,0,$city);
        $pdf->Ln(20);
        $pdf->Cell(0,0,"Invoice");

        $pdf->SetDrawColor(188,188,188);
        $pdf->Ln(30);
        $pdf->Line(10,80,200,80);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(63,0,"Item");
        $pdf->Cell(63,0,"Quantity",0,0,C);
        $pdf->Cell(63,0,"Price",0,0,R);
        $pdf->Line(10,110,200,110);
        $pdf->Ln(10);
        $pdf->Cell(63,0,$item1);
        $pdf->Cell(63,0,$amount1,0,0,C);
        $pdf->Cell(63,0,$prices[$item1]*$amount1." DKK",0,0,R);
        $pdf->Ln(10);
        $pdf->Cell(63,0,$item2);
        $pdf->Cell(63,0,$amount2,0,0,C);
        $pdf->Cell(63,0,$prices[$item2]*$amount2." DKK",0,0,R);
        $pdf->Ln(10);
        $pdf->Line(10,130,200,130);
        $pdf->Cell(95,0,"Total");
        $pdf->Cell(95,0,$prices[$item1]*$amount1+$prices[$item2]*$amount2." DKK",0,0,R);


        $pdf->Output();


    }else{
        echo "<p style='color: red'>Order failed </p>";
    }
}
?>
</div>
</body>
</html>

