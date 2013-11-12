
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<body style="text-align: center">
    <div style="border: 1px solid black; width: 50%; height: 350px; display: inline-block; margin-top: 20%">
        <form method="POST" style="text-align: left;margin: 10px">
              <?php
              $buildings_array = array('Red Building', 'Tree House', 'Fraternity Crib', 'Utility Baracks', 'Oak Complex');
              foreach($buildings_array as $building){
                  echo "<div style='display: block'><input type='checkbox' name='check_list[]' value = '".$building."' >".$building."</div>";
              }
              echo "<input type='submit' name='submit' value='Submit'>";

              ?>
        </form>
        <h5>Your order: </h5>
        <div style=" border: 1px solid black; margin: 10px; height: 150px">
            <?php
            $price = 0;
            if(isset($_POST['submit'])){
                if(!empty($_POST['check_list'])) {
                    foreach($_POST['check_list'] as $check) {
                        echo $check." - 10$</br>";
                        $price = $price+10;
                    }
                }
            }
            echo "<p>Total: ".$price."$</p>";
            ?>
        </div>
    </div>


</body>
</html>
