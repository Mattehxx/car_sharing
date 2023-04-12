<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">   
</head>
<body>
    <?php
        session_start();

        require_once('../config/db_connection.php');

        $sql="SELECT * FROM viaggi";
        $result=$conn->query($sql);

        while($row=$result->fetch_assoc()) {
            echo "<br/>";
            echo "Partenza: ".$row['partenza']."<br/>";
            echo "Destinazione: ".$row['destinazione']."<br/>";
            echo "Data e ora del viaggio: ".$row['dt_viaggio']."<br/>";
            echo "Durata del viaggio: ".$row['durata']."<br/>";
            echo "Numero dei posti auto: ".$row['n_posti']."<br/>";
            echo "Costo del viaggio: ".$row['importo']."<br/>";
        }
    ?>
</body>
</html>