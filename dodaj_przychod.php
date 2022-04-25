<?php

	session_start();
	
	if (!isset($_SESSION['logged_id']))
	{
		header('Location: ab_menu_glowne.php');
		exit();
	}
	
	if(isset($_POST['amount']))
	{
		$correct_data=true;
		$amount = $_POST['amount'];
		$date = $_POST['date_of_income'];
		$category = $_POST['income_category_assigned_to_user_id'];
		$comment = $_POST['income_comment'];
		
		if ($amount <=0)
		{
			$correct_data=false;
			$_SESSION['bad_amount']="Wpisz pozytywną wartość";
		}
		$comment = htmlentities($comment, ENT_QUOTES, "UTF-8");
		
		require_once 'database.php';
		
		if($correct_data == true)
		{
			$query = $db->prepare('INSERT INTO incomes VALUES (NULL, :userId, :income_category_assigned_to_user_id, :amount, :date_of_income, :income_comment)');
			$query->bindValue(':userId', $_SESSION['logged_id'], PDO::PARAM_INT);
            $query->bindValue(':income_category_assigned_to_user_id', $category, PDO::PARAM_STR);
			$query->bindValue(':amount', $amount, PDO::PARAM_STR);
			$query->bindValue(':date_of_income', $date, PDO::PARAM_STR);
			$query->bindValue(':income_comment', $comment, PDO::PARAM_STR);
			$query->execute();
		}
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
                    <h1>Dodaj przychód</h1>

                    <a>Podaj kwotę, datę, wybierz kategorię i opcjonalnie możesz dodać komentarz.</a>

                    <form method="post">
                        <p>
                            <label for="kwota">Podaj kwotę: </label>
                            <input type="number" placeholder="kwota" id="kwota" name="amount" required>
                        </p>

                        <?php
							if (isset($_SESSION['bad_amount']))
							{
								echo '<div class ="text-center mb-4 form-control">'.$_SESSION['bad_amount'].'</div>';
								unset($_SESSION['bad_amount']);
							}
					    ?>

                        <p>
                            <label for="data">Wybierz datę: </label>
                            <input type="date" id="data" value="<?php echo date('Y-m-d');?>" name="date_of_income" required>
                        </p>

                        <label for="Kategoria">Kategoria:</label>
                        <select name="income_category_assigned_to_user_id" id="Kategoria">
                        <?php

                            require_once 'database.php';
                            
                            $userId = $_SESSION['logged_id'];

                            $stmt = $db->query("SELECT name, id FROM incomes_category_assigned_to_users WHERE user_id = '$userId'");

                            while ($row = $stmt->fetch()) {
                                echo $row['name']."<br />\n";
                                echo '<option value='.$row['id'].'>'.$row['name'].'</option>';
                            }

					    ?>

                        </select>

                        <p>
                            <label for="komentarz">Komentarz</label>
                            <br>
                            <textarea id="komentarz" rows="5" cols="50" name="income_comment"
                                placeholder="opcjonalnie"></textarea>
                        </p>

                        <button type="submit" id="button_menu">Dodaj</button>

                        <button onclick="window.location.href='ab_menu_glowne_uzytkownik.php'"
                            id="button_menu">Anuluj</button>

                    </form>
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