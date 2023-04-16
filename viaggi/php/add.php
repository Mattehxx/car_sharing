<?php
    session_start();

    require_once('../functions/sanitize_string.php');
    require_once('../functions/response.php');
    require_once('../functions/redirect.php');
    require_once('../config/db_connection.php');

    //prende i valori dal form e li assegna alle variabili
    $partenza=sanitize_string($_POST['partenza']);
    $destinazione=sanitize_string($_POST['arrivo']); //sanitizzazione del nominativo
    $dt_viaggio=$_POST['dt_viaggio'];
    $durata=$_POST['durata'];
    $n_posti=$_POST['n_posti'];
    $importo=$_POST['importo'];

    $email=$_SESSION['email_autista'];

    $sql="SELECT id FROM autisti WHERE email LIKE '$email'";
    $result=$conn->query($sql);
    $row=$result->fetch_assoc();
    $id_autista=$row['id'];

    $prpstm=$conn->prepare("INSERT INTO viaggi (partenza, destinazione, dt_viaggio, durata, n_posti, importo, id_autista) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $prpstm->bind_param('sssiidi', $partenza, $destinazione, $dt_viaggio, $durata, $n_posti, $importo, $id_autista);

    //se la query fallisce
    if (!$prpstm->execute()) {
        bad();
    }

    //se tutte le operazioni vanno a buon fine
    ok();
?>