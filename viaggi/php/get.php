<?php
    require_once('../../config/db_connection.php');

    $partenza=$_POST['partenza'];
    $destinazione=$_POST['destinazione'];
    $dt_viaggio=$_POST['dt_viaggio'];
    $n_posti=$_POST['n_posti'];

    $sql="SELECT * 
            FROM viaggi 
            WHERE partenza LIKE '%Legnano%' AND destinazione LIKE '%Milano%' AND dt_viaggio LIKE '%$dt_viaggio%' AND n_posti>=1";

    $result=$conn->query($sql);
    $data=array();

    while($row=$result->fetch_assoc()) {
        $data['partenza']=$row['partenza'];
        $data['destinazione']=$row['destinazione'];
        $data['dt_viaggio']=$row['dt_viaggio'];
        $data['durata']=$row['durata'];
        $data['n_posti']=$row['n_posti'];
        $data['importo']=$row['importo'];

        /* echo "<br/>";
        echo "Partenza: ".$row['partenza']."<br/>";
        echo "Destinazione: ".$row['destinazione']."<br/>";
        echo "Data e ora del viaggio: ".$row['dt_viaggio']."<br/>";
        echo "Durata del viaggio: ".$row['durata']."<br/>";
        echo "Numero dei posti auto: ".$row['n_posti']."<br/>";
        echo "Costo del viaggio: ".$row['importo']."<br/>"; */
    }

    echo json_encode($data);
?>