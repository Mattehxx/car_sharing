<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand">CAR SHARING</a>
            <div class="d-flex" role="search">
                <input id="partenza" class="form-control me-2" type="search" placeholder="Partenza da" aria-label="Search">
                <input id="destinazione" class="form-control me-2" type="search" placeholder="Arrivo a" aria-label="Search">
                <input id="dt_viaggio" class="form-control me-2" type="date" aria-label="Search">
                <input id="n_posti" class="form-control me-2" type="number" placeholder="Numero di passeggeri" aria-label="Search" min="1" max="10" step="1">
                <button id="button_navbar" class="btn btn-outline-success" type="submit">Cerca</button>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <div id="cards_to_add">

    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

    <!-- JS FILES -->
    <script src="../viaggi/js/search.js"></script>
</body>
</html>