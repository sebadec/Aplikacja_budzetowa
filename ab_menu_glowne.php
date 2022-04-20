<?php
session_start();

if (isset($_SESSION['logged_id'])) {
	header('Location: ab_menu_glowne_uzytkownik.php');
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
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#logowanie" type="button" role="tab" aria-controls="home"
                                aria-selected="true">Logowanie</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="rejestracja-tab" data-bs-toggle="tab"
                                data-bs-target="#rejestracja" type="button" role="tab" aria-controls="rejestracja"
                                aria-selected="false">Rejestracja</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="logowanie" role="tabpanel"
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

                                <?php
					            if (isset($_SESSION['bad_attempt'])) {
					        	echo '<p>Niepoprawny login lub hasło!</p>';
					        	unset($_SESSION['bad_attempt']);
					            }
					            ?>

                            </form>


                        </div>


                        <div class="tab-pane fade" id="rejestracja" role="tabpanel" aria-labelledby="rejestracja-tab">

                            <form method="post" action="ab_menu_glowne_uzytkownik.php">
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label" id="text-budget">Adres
                                        email</label>
                                    <input type="text" class="form-control" id="exampleInputtext1"
                                        aria-describedby="textHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputEmail1" class="form-label" id="text-budget">Adres
                                        email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label" id="text-budget">Hasło</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1">
                                </div>
                                <button type="submit" class="btn btn-primary" id="text-budget">Zarejestruj</button>
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