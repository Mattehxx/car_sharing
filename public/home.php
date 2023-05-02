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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
            integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
            crossorigin=""/>
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

    <div class="row">
        <div id="map" class="col-10" style="height: 300px;"></div>
        <div id="txt-distance" class="col-2">
            <!-- Distance here -->
        </div>
    </div>
    <div class="row">
        <div id="filter" class="col-4"></div>
        <div id="cards_to_add" class="col-8">
            <!-- <div class="card" style="width: 18rem;"> <div class="card-header">Viaggio</div><ul class="list-group list-group-flush"><li class="list-group-item">Partenza: '+data['partenza']+'</li><li class="list-group-item">Destinazione: '+data['destinazione']+'</li><li class="list-group-item">Data: '+data['dt_viaggio']+'</li><li class="list-group-item">Durata: '+data['durata']+'<li class="list-group-item">Numero di posti: '+data['n_posti']+'<li class="list-group-item">Costo: '+data['importo']+' €</ul><div class="card-footer row"><div class="col"><input class="form-control" type="number" placeholder="Passeggeri" min="1" max="10" step="1"></div><div class="col"><button class="btn btn-primary">Prenota</button></div></div></div> -->
        </div>
   </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
    
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>

    <!-- JS FILES -->
    <script src="../viaggi/js/search.js"></script>
    <script src="../viaggi/js/locations.js"></script>
</body>
</html>