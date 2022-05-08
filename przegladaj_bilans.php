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
                        <?php
                        /*

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Zakres
                        </button>

                        <!-- Modal -->
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <label for="customRange1" class="form-label" style="color: black;">Zakres od 0 do
                                            1000 zł</label>
                
                                        <input type="range" class="form-range" min="0" max="1000" step="1"
                                            id="range_weight" name="amount_min" value="0" oninput="range_weight_disp.value = range_weight.value">
                                        <br>
                                        <output style="color:black;" id="range_weight_disp"></output>
                                        <br>

                                        

                                        <input type="range" class="form-range" min="0" max="1000" step="1"
                                            id="range_weight2" name="amount_max" value="0" oninput="range_weight_disp2.value = range_weight2.value">
                                        <br>
                                        <output style="color:black;" id="range_weight_disp2"></output>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" name="range_unset" data-bs-dismiss="modal">Zamknij </button>
                                        <button type="button" class="btn btn-primary" name="range_set" data-bs-dismiss="modal">Akceptuj</button>
                                    </div>


                                    
                                            if (isset($_POST["range_set"])){
                                                echo '<div class ="text-center mb-4 form-control">'.$_SESSION['range_set'].'</div>';
                                            } else if (isset($_POST["range_unset"])){
                                            // "Delete" clicked
                                            }
                                    

                                    




                                </div>
                            </div>
                        </div>
                        */
                        ?>


                        <p>
                            <label for="Kategoria">Kategoria:</label>
                            <select name="Kategoria" id="Kategoria">
                                <option value="biezacymiesiac" selected>Bieżący miesiąc</option>
                                <option value="poprzednimiesiac">Poprzedni miesiąc</option>
                                <option value="biezacyrok">Bieżący rok</option>
                                <?php
                                //<option value="niestandardowy">Niestandardowy</option>
                                ?>
                                
                            </select>
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
                        //$amount_min = $_POST['amount_min'];
                        //$amount_max = $_POST['amount_min'];
                        $amount_min = 0;
                        $amount_max = 1000;
                        $date = "2022-04-24";

                            
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

                        if($category=='poprzednimiesiac')
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

                        if($category=='biezacyrok')
                        {
                            $biezacyrok = date('Y');
                            $dateFrom = "$biezacyrok".'-01-01';
                            $dateTo = "$biezacyrok".'-12-31';
                            
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
                                echo "<table class ='table table-bordered'  border=1 style='color: white; background-color: #a72896;'>";
                                echo "<thead>";
                                echo "<th colspan='2'>"."PRZYCHODY"."</th>";
                                echo "</thead>";
                                echo "<thead>";
                                echo "<th>"."Kategoria"."</th>";
                                echo "<th class ='text-center'>"."Kwota"."</th>";
                                echo "</thead>";
                                
                                while ($row_income = $query_income->fetch())
                                {
                                    echo "<tr>";
                                    echo "<td style='width:33%;' >".$row_income['kategoria']."</td>";
                                    echo "<td class='text-center'>".$row_income['suma']."</td>";
                                    echo "</tr>";
                                }
                                $query_income_sum = $db->query("SELECT SUM(amount) AS suma FROM incomes,incomes_category_assigned_to_users WHERE incomes.user_id = $userId AND incomes_category_assigned_to_users.id = incomes.income_category_assigned_to_user_id  AND date_of_income BETWEEN '$dateFrom' AND '$dateTo'");
                                $sum_income = $query_income_sum->fetch();
                                echo "<tr>";
                                echo "<td style='width:33%;'><h4>"."SUMA"."</h4></td>";
                                echo "<td class='text-center'><h4>".$sum_income['suma']."</h4></td>";
                                echo "</tr>";	
                                echo"</table>";
                            }

                            $query_expanse = $db->query("SELECT name AS kategoria, SUM(amount) AS suma FROM expenses, expenses_category_assigned_to_users AS cat WHERE expenses.user_id = '$userId' AND cat.id = expenses.expense_category_assigned_to_user_id AND date_of_expense BETWEEN '$dateFrom' AND '$dateTo' GROUP BY name DESC");
                            //if($wynik->fetchColumn() > 0) //błąd muszę poprawić
                            if (1==1)
                            {
                                echo "<table class ='table table-bordered'  border=1 style='color: white; background-color: #a72896;'>";
                                echo "<thead>";
                                echo "<th colspan='2'>"."WYDATKI"."</th>";
                                echo "</thead>";
                                echo "<thead>";
                                echo "<th>"."Kategoria"."</th>";
                                echo "<th class ='text-center'>"."Kwota"."</th>";
                                echo "</thead>";
                                
                                while ($row_expanse = $query_expanse->fetch())
                                {
                                    echo "<tr>";
                                    echo "<td style='width:33%;' >".$row_expanse['kategoria']."</td>";
                                    echo "<td class='text-center'>"."-".$row_expanse['suma']."</td>";
                                    echo "</tr>";
                                }
                                $query_expanse_sum = $db->query("SELECT SUM(amount) AS suma FROM expenses,expenses_category_assigned_to_users WHERE expenses.user_id = $userId AND expenses_category_assigned_to_users.id = expenses.expense_category_assigned_to_user_id  AND date_of_expense BETWEEN '$dateFrom' AND '$dateTo'");
                                $sum_expanse = $query_expanse_sum->fetch();
                                echo "<tr>";
                                echo "<td style='width:33%;'><h4>"."SUMA"."</h4></td>";
                                echo "<td class='text-center'><h4>"."-".$sum_expanse['suma']."</h4></td>";
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
                            echo "<th style='width:33%;'>"."Twój bilans wynosi:"."</th>";
                            echo "<th class ='text-center'>".$bilans."</th>";
                            echo "<thead>";
                            if ($bilans > 0)
                            {
                                echo "<th colspan='2'>"."Gratuluję, jesteś na plusie :) "."</th>";
                            }
                            else if ($bilans < 0)
                            {
                                echo "<th colspan='2'>"."Nie jest aż tak źle! Głowa do góry :) "."</th>";
                            }
                            else
                            {
                                echo "<th colspan='2'>"."Zawsze mogło być gorzej..."."</th>";
                            }
                            
                            echo "</thead>";
                            echo "</thead>";

                        }
                    }

					?>
                        
                                        
                    </div>



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