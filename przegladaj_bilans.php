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
                                        id="customRange1">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Zamknij</button>
                                    <button type="button" class="btn btn-primary">Akceptuj</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <form action="strona_startowa.php">

                        <p>
                            <label for="Kategoria">Kategoria:</label>
                            <select name="Kategoria" id="Kategoria">
                                <option value="bieżący miesiąc" selected>Bieżący miesiąc</option>
                                <option value="poprzedni miesiąc">Poprzedni miesiąc</option>
                                <option value="bieżący rok">Bieżący rok</option>
                                <option value="niestandardowy">Niestandardowy</option>
                            </select>
                        </p>

                        <p>
                            <button type="submit" id="button_menu">Generuj raport</button>
                            <button onclick="window.location.href='ab_menu_glowne_uzytkownik.php'"
                                id="button_menu">Anuluj</button>
                        </p>

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