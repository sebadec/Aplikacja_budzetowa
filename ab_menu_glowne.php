<?php
session_start();

if (isset($_SESSION['logged_id'])) {
	header('Location: ab_menu_glowne_uzytkownik.php');
	exit();
}

if (isset($_POST['email'])) {

    $correct_data = true;

    $imie = filter_input(INPUT_POST, 'imie');

        if((strlen($imie)<3) || (strlen($imie)>20))
        {
            $correct_data= false;
            $_SESSION['bad_imie'] = "Imie musi posiadać od 3 do 20 znaków!";
        }

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        if (empty($email)) {
            
            $correct_data= false;
            $_SESSION['bad_email'] = "E-mail jest nieprawidłowy!";
            
        }

    require_once 'database.php';

        $email_on_base = $db->query("SELECT email FROM users WHERE email='$email'")->fetch();

        if (empty($email_on_base)) {
            //$_SESSION['bad_email2'] = "E-mail poprawny!";
        }
        else {
            $correct_data= false;
            $_SESSION['bad_email2'] = "E-mail jest już w bazie!";
        }

    $password = filter_input(INPUT_POST, 'password');

        if((strlen($password)<5) || (strlen($password)>20))
        {
            $correct_data= false;
            $_SESSION['bad_password'] = "Hasło musi posiadać od 5 do 20 znaków";
        }

    if ($correct_data == true) {

        $query = $db->prepare('INSERT INTO users VALUES (NULL, :imie, :password, :email)');
        $query->bindValue(':imie', $imie, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->execute();

        $dane = $db->query("SELECT * FROM users WHERE email = '$email'");
        $wiersz = $dane->fetch(PDO::FETCH_ASSOC);
        $userId = $wiersz['id'];

        if(($db->query("INSERT INTO expenses_category_assigned_to_users SELECT 'NULL','$userId', name FROM expenses_category_default")) 
        &&($db->query("INSERT INTO payment_methods_assigned_to_users SELECT 'NULL','$userId', name FROM payment_methods_default"))
        &&($db->query("INSERT INTO incomes_category_assigned_to_users SELECT 'NULL','$userId', name FROM incomes_category_default")))
        {
            $_SESSION['udanarejestracja']="Dziękujemy za rejestrację, możesz się już zalogować!";
        }
    
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
                    <li><a class="dropdown-item active" href="#">Aplikacja budżetowa</a></li>
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


                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#logowanie" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Logowanie</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="rejestracja-tab" data-bs-toggle="tab"
                                data-bs-target="#rejestracja" type="button" role="tab" aria-controls="rejestracja"
                                aria-selected="false">Rejestracja</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade" id="logowanie" role="tabpanel"
                            aria-labelledby="home-tab">

                            <form method="post" action="ab_menu_glowne_uzytkownik.php">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label" id="text-budget">Adres
                                        email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="email"
                                    >
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label" id="text-budget">Hasło</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                    name="password"
                                    >
                                </div>
                                <button type="submit" class="btn btn-primary" id="text-budget">Zaloguj</button>


                                <div>
                                    <?php
                                    if (isset($_SESSION['bad_attempt'])) {
                                    echo '<p>Niepoprawne dane!</p>';
                                    unset($_SESSION['bad_attempt']);
                                    }
                                    ?>
                                </div>

                            </form>


                        </div>


                        <div class="tab-pane fade show active" id="rejestracja" role="tabpanel" aria-labelledby="rejestracja-tab">

                            <form method="post">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label" id="text-budget">Podaj imię

                                    </label>
                                    <input type="text" class="form-control" id="exampleInputText1" aria-describedby="TextHelp"
                                    name="imie"
                                    >
                                </div>

                                <div>
                                    <?php
                                    if (isset($_SESSION['bad_imie'])) {
                                    echo '<div class ="text-center mb-4 form-control">'.$_SESSION['bad_imie'].'</div>';
                                    unset($_SESSION['bad_imie']);
                                    }
                                    ?>
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label" id="text-budget">Adres
                                        email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                    name="email"
                                    >
                                </div>

                                <div>
                                    <?php
                                    if (isset($_SESSION['bad_email'])) {
                                    echo '<div class ="text-center mb-4 form-control">'.$_SESSION['bad_email'].'</div>';
                                    unset($_SESSION['bad_email']);
                                    }
                                    ?>
                                </div>
                                <div>
                                    <?php
                                    if (isset($_SESSION['bad_email2'])) {
                                    echo '<div class ="text-center mb-4 form-control">'.$_SESSION['bad_email2'].'</div>';
                                    unset($_SESSION['bad_email2']);
                                    }
                                    ?>
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label" id="text-budget">Hasło</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                    name="password"
                                    >
                                </div>

                                <div>
                                    <?php
                                    if (isset($_SESSION['bad_password'])) {
                                    echo '<div class ="text-center mb-4 form-control">'.$_SESSION['bad_password'].'</div>';
                                    unset($_SESSION['bad_password']);
                                    }
                                    ?>
                                </div>

                                <button type="submit" class="btn btn-primary" id="text-budget2">Zarejestruj</button>

                                <div>
                                    <?php
                                    if (isset($_SESSION['udanarejestracja'])) {
                                    echo '<div class ="text-center mb-4 form-control">'.$_SESSION['udanarejestracja'].'</div>';
                                    unset($_SESSION['udanarejestracja']);
                                    }
                                    ?>
                                </div>

                            </form>


                        </div>
                    </div>


                </div>

            </div>

            <div class="col-md-8">
                <main class="" id="border">

                    <div>
                        <img src="./images/budzet-domowy-poradnik.jpg" class="img-fluid" id="img-on-menu"
                            alt="Responsive image">



                    </div>


                    <h1>Budżet osobisty</h1>

                    <div id="text-budget">...to jedno z tych pojęć w finansach osobistych, wokół którego
                        jest
                        sporo nieporozumień. Wiele osób uważa, że chodzi tu o żmudne spisywanie wydatków, z którego
                        niewiele wynika. Tymczasem budżet to coś zupełnie innego. Gdy robi się
                        go dobrze – niesamowicie pomaga w zadbaniu o własne finanse. Gdy nie robi się go wcale – mnóstwo
                        pieniędzy przecieka nam
                        przez palce, a cele finansowe osiągamy wolniej. Gdy robi się go źle – łatwo jest się zniechęcić
                        i popełnić finansowe
                        błędy. Właśnie dlatego powstała ta aplikacja, aby pomóc każdemu zaplanować swoje finanse!</div>
                    <br>


                    <br>
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