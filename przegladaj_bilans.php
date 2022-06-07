<?php

	session_start();

    if (!isset($_SESSION['logged_id']))
	{
		header('Location: ab_menu_glowne.php');
		exit();
	}
	
	

?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budżet Osobisty</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="app.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark shadow p-3 mb-5" aria-label="Menu">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sebastian Dec</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
                aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample03">
                <ul class="navbar-nav me-auto mb-2 mb-sm-0">

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">Kontakt</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">O Mnie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="dropdown03"
                            data-bs-toggle="dropdown" aria-expanded="false"">Projekty</a>
                        <ul class=" dropdown-menu" aria-labelledby="dropdown03">
                    <li><a class="dropdown-item active" href="ab_menu_glowne.php">Aplikacja budżetowa</a></li>
                    <li><a class="dropdown-item" href="#">Gra ping-pong</a></li>
                    <li><a class="dropdown-item" href="#">Książka adresowa</a></li>
                </ul>
                </li>

                </ul>
                <blockquote class="blockquote text-right">
                    <p class="mb-0">Większość z Was zna zalety programisty. Oczywiście są trzy: lenistwo,
                        niecierpliwość i pycha.</p>
                    <footer class="blockquote-footer text-right">Larry Wall<cite title="Losowy
                            cytat"></cite>
                    </footer>
                </blockquote>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="" id="floating-menu">


                    <ul>
                        <li>
                            <a href="dodaj_przychod.php">Dodaj przychód</a>
                        </li>
                        <li>
                            <a href="dodaj_wydatek.php">Dodaj wydatek</a>
                        </li>
                        <li>
                            <a href="przegladaj_bilans.php">Przeglądaj bilans</a>
                        </li>
                        <li>
                            <a href="ustawienia.php">Ustawienia</a>
                        </li>
                        <li>
                            <a href="ab_menu_glowne.php">Wyloguj się</a>
                        </li>
                    </ul>

                </div>

            </div>

            <div class="col-md-8">

                <main id="border">

                    <h1>Bilans</h1>

                    <a>Przejżyj bilans swoich zysków i strat.</a>
                    <br>


                    <form method="post">

                        <p>
                            <label for="Kategoria">Kategoria:</label>
                            <select name="Kategoria" id="Kategoria" onchange="myFunction()">
                                <option value="biezacymiesiac" selected>Bieżący miesiąc</option>
                                <option value="poprzednimiesiac">Poprzedni miesiąc</option>
                                <option value="biezacyrok">Bieżący rok</option>
                                <option value="niestandardowy">Niestandardowy</option>
                                
                            </select>
                        </p>
                        </script>

                        <p id="data_start">
                            <label for="data">Wybierz datę początkową: </label>
                            <input type="date" id="data" value="<?php echo date('Y-m-d');?>" name="date_start" required>
                        </p>

                        <p id="data_start">
                            <label for="data">Wybierz datę końcową: </label>
                            <input type="date" id="data" value="<?php echo date('Y-m-d');?>" name="date_end" required>
                        </p>

                        <p>
                            <button type="submit" id="button_menu">Generuj raport</button>
                        </p>

                        <?php
							if (isset($_SESSION['range_set']))
							{
								echo '<div class ="text-center mb-4 form-control">'."Blasasa".'</div>';
								unset($_SESSION['range_set']);
							}
					    ?>

                    </form>

                    <div class="">

                    <?php

                    if(isset($_POST['Kategoria']))
                    {
                        echo "Gotowy raport:"."<br />\n";

                        $correct_data=true;
                            
                        $category = $_POST['Kategoria'];
                        //echo "Kategoria to ".$category." ".$_SESSION['dataod']."<br />\n";

                        if($category=='biezacymiesiac')
                        {
                            $biezacymiesiac = date('m');
                            $biezacyrok = date('Y');
                            $iloscdni = date('t');
                            
                            $dateFrom = "$biezacyrok".'-'."$biezacymiesiac".'-01';
                            $dateTo = "$biezacyrok".'-'."$biezacymiesiac".'-'."$iloscdni";
                        }
                        else if($category=='poprzednimiesiac')
                        {
                            $poprzednimiesiac = date('m') -1;
                            if($poprzednimiesiac < 10)
                            {
                                $poprzednimiesiac = '0'."$poprzednimiesiac";
                            }
                            $iloscdnipoprzmies = date('t', strtotime("-1 MONTH"));
                            if($poprzednimiesiac == 12)
                            {
                            $rok = date('Y') -1;
                            }
                            else $rok = date('Y');
                            
                            $dateFrom =  "$rok".'-'."$poprzednimiesiac".'-01';
                            $dateTo =  "$rok".'-'."$poprzednimiesiac".'-'."$iloscdnipoprzmies";
                        }
                        else if($category=='biezacyrok')
                        {
                            $biezacyrok = date('Y');
                            $dateFrom = "$biezacyrok".'-01-01';
                            $dateTo = "$biezacyrok".'-12-31';
                            
                        }
                        else if($category=='niestandardowy')
                        {
                            $dateFrom = $_POST['date_start'];
                            $dateTo = $_POST['date_end'];
                        }

                        echo "Wybrano zakres od ".$dateFrom." do ".$dateTo."<br />\n";
                        
                        
                        require_once 'database.php';
                        
                        if($correct_data == true)
                        {

                            $userId = $_SESSION['logged_id'];

                            $query_income = $db->query("SELECT name AS kategoria, SUM(amount) AS suma FROM incomes, incomes_category_assigned_to_users AS cat WHERE incomes.user_id = '$userId' AND cat.id = incomes.income_category_assigned_to_user_id AND date_of_income BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name DESC");
                            //if($wynik->fetchColumn() > 0) //błąd muszę poprawić
                            if (1==1)
                            {
                                echo "<table class ='table table-bordered' border=1 style='color: white; background-color: #a72896; font-size: 15px; color:white;'>";
                                echo "<thead>";
                                echo "<th colspan='2' style='font-size: 15px; color:white;'>"."PRZYCHODY"."</th>";
                                echo "</thead>";
                                echo "<thead>";
                                echo "<th style='font-size: 15px; color:white;'>"."Kategoria"."</th>";
                                echo "<th class ='text-center' style='font-size: 15px; color:white;'>"."Kwota"."</th>";
                                echo "</thead>";
                                
                                while ($row_income = $query_income->fetch())
                                {
                                    echo "<tr>";
                                    echo "<td style='width:33%; font-size: 15px; color:white;' >".$row_income['kategoria']."</td>";
                                    echo "<td class='text-center' style='font-size: 15px; color:white;'>".$row_income['suma']."</td>";
                                    echo "</tr>";
                                }
                                $query_income_sum = $db->query("SELECT SUM(amount) AS suma FROM incomes,incomes_category_assigned_to_users WHERE incomes.user_id = $userId AND incomes_category_assigned_to_users.id = incomes.income_category_assigned_to_user_id  AND date_of_income BETWEEN '$dateFrom' AND '$dateTo'");
                                $sum_income = $query_income_sum->fetch();
                                echo "<tr>";
                                echo "<td style='width:33%; font-size: 15px; color:white;'><h4>"."SUMA"."</h4></td>";
                                echo "<td class='text-center' style='font-size: 15px; color:white;'><h4>".$sum_income['suma']."</h4></td>";
                                echo "</tr>";	
                                echo"</table>";
                            }

                            $query_expanse = $db->query("SELECT name AS kategoria, SUM(amount) AS suma FROM expenses, expenses_category_assigned_to_users AS cat WHERE expenses.user_id = '$userId' AND cat.id = expenses.expense_category_assigned_to_user_id AND date_of_expense BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name DESC");
                            //if($wynik->fetchColumn() > 0) //błąd muszę poprawić
                            if (1==1)
                            {
                                echo "<table class ='table table-bordered'  border=1 style='color: white; background-color: #a72896; font-size: 15px; color:white;'>";
                                echo "<thead>";
                                echo "<th colspan='2' style='font-size: 15px; color:white;'>"."WYDATKI"."</th>";
                                echo "</thead>";
                                echo "<thead>";
                                echo "<th style='font-size: 15px; color:white;'>"."Kategoria"."</th>";
                                echo "<th class ='text-center' style='font-size: 15px; color:white;'>"."Kwota"."</th>";
                                echo "</thead>";
                                
                                while ($row_expanse = $query_expanse->fetch())
                                {
                                    echo "<tr>";
                                    echo "<td style='width:33%; font-size: 15px; color:white;' >".$row_expanse['kategoria']."</td>";
                                    echo "<td class='text-center' style='font-size: 15px; color:white;'>"."-".$row_expanse['suma']."</td>";
                                    echo "</tr>";
                                }
                                $query_expanse_sum = $db->query("SELECT SUM(amount) AS suma FROM expenses,expenses_category_assigned_to_users WHERE expenses.user_id = $userId AND expenses_category_assigned_to_users.id = expenses.expense_category_assigned_to_user_id  AND date_of_expense BETWEEN '$dateFrom' AND '$dateTo'");
                                $sum_expanse = $query_expanse_sum->fetch();
                                echo "<tr>";
                                echo "<td style='width:33%; style='font-size: 15px; color:white;'><h4>"."SUMA"."</h4></td>";
                                echo "<td class='text-center' style='font-size: 15px; color:white;'><h4>"."-".$sum_expanse['suma']."</h4></td>";
                                echo "</tr>";	
                                echo"</table>";
                            }

                            $sum_income_int = 0;
                            $stuff_income = $sum_income;
                            foreach ($stuff_income as $value) {
                                $sum_income_int = $value;
                            }

                            $sum_expanse_int = 0;
                            $stuff_expanse = $sum_expanse;
                            foreach ($stuff_expanse as $value) {
                                $sum_expanse_int = $value;
                            }

                            $bilans = $sum_income_int - $sum_expanse_int;

                            echo "<table class ='table table-bordered'  border=1 style='color: white; background-color: #a72896;'>";
                            echo "<thead>";
                            echo "<th style='width:33%; font-size: 15px; color:white;'>"."Twój bilans wynosi:"."</th>";
                            echo "<th class ='text-center' style='font-size: 15px; color:white;'>".$bilans."</th>";
                            echo "<thead>";
                            if ($bilans > 0)
                            {
                                echo "<th colspan='2' style='font-size: 15px; color:white;'>"."Gratuluję, jesteś na plusie :) "."</th>";
                            }
                            else if ($bilans < 0)
                            {
                                echo "<th colspan='2' style='font-size: 15px; color:white;'>"."Nie jest aż tak źle! Głowa do góry :) "."</th>";
                            }
                            else
                            {
                                echo "<th colspan='2 style='font-size: 15px; color:white;'>"."Zawsze mogło być gorzej..."."</th>";
                            }
                            
                            echo "</thead>";
                            echo "</thead>";

                        }
                    }

					?>

                    <!--Load the AJAX API-->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">

                    // Load the Visualization API and the corechart package.
                    google.charts.load('current', {'packages':['corechart']});

                    // Set a callback to run when the Google Visualization API is loaded.
                    google.charts.setOnLoadCallback(drawChart);

                    // Callback that creates and populates a data table,
                    // instantiates the pie chart, passes in the data and
                    // draws it.
                    function drawChart() {

                        // Create the data table.
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Topping');
                        data.addColumn('number', 'Slices');
                        data.addRows([
                        [
                        <?php
                        //"DSADAS",
                        echo "\"Test_01\",";  
                        echo $bilans*-1;
                        //echo $row_income['suma'];
                        
                        /*
                        $query_income = $db->query("SELECT name AS kategoria, SUM(amount) AS suma FROM incomes, incomes_category_assigned_to_users AS cat WHERE incomes.user_id = '$userId' AND cat.id = incomes.income_category_assigned_to_user_id AND date_of_income BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name DESC");

                        while ($row_expanse = $query_expanse->fetch())
                        {
                            //echo $row_expanse['kategoria'].$row_expanse['suma'];
                            echo $row_expanse['suma'];
                        }
                        
                        
                        $query_income = $db->query("SELECT name AS kategoria, SUM(amount) AS suma FROM incomes, incomes_category_assigned_to_users AS cat WHERE incomes.user_id = '$userId' AND cat.id = incomes.income_category_assigned_to_user_id AND date_of_income BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name DESC");
                        
                        while ($row_income = $query_income->fetch())
                        {
                            //echo $row_income['kategoria'].$row_income['suma'];
                            //echo $row_income['suma'];
                            //echo $row_expanse['suma'];
                        }
                        */
                        

                        ?>
                        ],
                        [<?php echo "\"Test_02\",".$bilans*-1;?>],

                        <?php //echo "[".\"Test_02\",".$bilans*-1."],";?>
                        <?php echo "["."\"Test_03\",".$bilans*-1;
                        echo "],";
                        
                        ?>

                        <?php echo "["."\"Test_04\","."$bilans*-1"."],";
                        
                        ?>

                        ['Onionssws', 100]
                        ]);

                        // Set chart options
                        var options = {'title':'How Much Pizza I Ate Last Night',
                                    'width':400,
                                    'height':300};

                        // Instantiate and draw our chart, passing in some options.
                        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                    </script>


                    
                    <!--Div that will hold the pie chart-->
                    <div id="chart_div"></div>
                                            



                </main>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>

    <script src="js/bootstrap.js"></script>

</body>

</html>