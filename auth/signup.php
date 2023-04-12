<?php
    session_start();

    require_once('../functions/sanitize_string.php');
    require_once('../functions/response.php');
    require_once('../functions/redirect.php');
    require_once('../config/db_connection.php');

    //prende i valori dal form e li assegna alle variabili
    $nominativo=sanitize_string($_POST['nominativo']); //sanitizzazione del nominativo
    $numero_patente=$_POST['n_patente'];
    $scadenza_patente=$_POST['scadenza_patente'];
    $email=$_POST['email'];
    $telefono=$_POST['telefono'];

    $prpstm=$conn->prepare("INSERT INTO autisti (nominativo, numero_patente, scadenza_patente, email, telefono) VALUES (?, ?, ?, ?, ?)");
    $prpstm->bind_param('sssss', $nominativo, $numero_patente, $scadenza_patente, $email, $telefono);

    //se la query fallisce
    if (!$prpstm->execute()) {
        bad();
    }

    //se tutte le operazioni vanno a buon fine
    $id_autista=$conn->insert_id;
    $_SESSION['id_autista']=$id_autista;
    ok();
?>