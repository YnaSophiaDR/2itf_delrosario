<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator</title>
    <link rel="icon" type="image/x-icon" href="https://cdn.icon-icons.com/icons2/1451/PNG/512/moneyfolder_99354.png">

    <style type="text/css">

    .taxcalculator{
            position: absolute;
            height: 104px;
            left: 696px;
            top: 100px;

            font-family: 'Tahoma';
            font-style: normal;
            font-weight: 800;
            font-size: 75px;
            line-height: 104px;
            color: #135178;
            text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        body{
            background-image: url("https://images.designtrends.com/wp-content/uploads/2016/03/29115235/Abstract-Plain-White-Wallpaper-.jpg");
        }
        form {
            position: absolute;
            height: 104px;
            left: 815px;
            top: 300px;

            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        input[type="submit"] {
            background-color: #7a84c3;
            color: #white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
            text-align: center;
            position:absolute;
            bottom: 5px;
            right:90px;
        }
        #compute {
            margin-top: 500px;
            text-align: center;
        }
        
    </style>
</head>
<body>
    <p class = "taxcalculator"> Tax Calculator </p>
    <form method="post">
        <p>Salary: <input type="number" id="salary" name="salary"></p>
        <label for="type">Type:</label>
        <label><input type="radio" id="monthly" name="type" value="Monthly">Monthly</label>
        <label><input type="radio" id="bi-monthly" name="type" value="Bi-Monthly">Bi-Monthly</label>
        <input type="submit" name="submit" value="Compute">
    </form>

<?php
    if (isset($_POST['submit'])) {
        $salary = $_POST['salary'];
        $type = $_POST['type'];

            if ($_POST['type'] == "Bi-Monthly") {
                $bisalary = $salary  * 2;
                $annualsalary  = $bisalary *12;
                if ($annualsalary <= 250000){
                    $bisalary = 0;
                    $bimontax = 0;
                }
                else if ($annualsalary<= 400000 && $annualsalary > 250000) {
                    $biannualtax = ($annualsalary-250000)*.2;
                    $bimontax = $biannualtax/12;
                }
                else if ($annualsalary <= 800000 && $annualsalary > 400000) {
                    $biannualtax = 30000+($annualsalary-400000)*.25;
                    $bimontax = $biannualtax/12;
                }
                else if ($annualsalary <= 2000000 && $annualsalary > 800000) {
                    $biannualtax = 130000+($annualsalary-800000)*.3;
                    $bimontax = $biannualtax/12;
                }
                else if ($annualsalary <= 8000000 && $annualsalary > 2000000) {
                    $biannualtax = 490000+($annualsalary-2000000)*.32;
                    $bimontax = $biannualtax/12;
                }
                else if ($annualsalary > 8000000) {
                    $biannualtax = 2410000+($annualsalary-8000000)*.35;
                    $bimontax = $biannualtax/12;
                }  
                echo "<div id='compute'>";
                echo "<p>Monthly Salary: $salary</p>";
                echo "<p>Annual Salary: $annualsalary</p>";
                echo "<p>Annual Tax: $biannualtax</p>";
                echo "<p>Monthly Tax: $bimontax</p>";"</div>";

            } else if ($_POST['type'] == "Monthly") {
                $monannual = $salary *12;
                if ($monannual <= 250000){
                    $salary = 0;
                    $montax = 0;
                }
                else if ($monannual<= 400000 && $monannual > 250000) {
                    $annualtax = ($monannual-250000)*.2;
                    $montax = $annualtax/12;
                }
                else if ($monannual <= 800000 && $monannual > 400000) {
                    $annualtax = 30000+($monannual-400000)*.25;
                    $montax = $annualtax/12;
                }
                else if ($monannual <= 2000000 && $monannual > 800000) {
                    $annualtax = 130000+($monannual-800000)*.3;
                    $montax = $annualtax/12;
                }
                else if ($monannual <= 8000000 && $monannual > 2000000) {
                    $annualtax = 490000+($monannual-2000000)*.32;
                    $montax = $annualtax/12;
                }
                else if ($monannual > 8000000) {
                    $annualtax = 2410000+($monannual-8000000)*.35;
                    $montax = $annualtax/12;
                }  
                echo "<div id='compute'>";
                echo "<p>Monthly Salary: $salary</p>";
                echo "<p>Annual Salary: $monannual</p>";
                echo "<p>Annual Tax: $annualtax</p>";
                echo "<p>Monthly Tax: $montax</p>"; "</div>";
            
        }
        
    }     
?>
</body>
</html>
