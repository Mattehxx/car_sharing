<?php
    session_start();

    require_once('../functions/sanitize_string.php');
    require_once('../functions/response.php');
    require_once('../functions/redirect.php');
    require_once('../config/db_connection.php');

    //prende i valori dal form e li assegna alle variabili
    $nome=sanitize_string($_POST['nome']);
    $cognome=sanitize_string($_POST['cognome']);
    $nominativo=$nome.' '.$cognome;
    $tipo_documento=$_POST['tipo_documento'];
    $n_documento=$_POST['n_documento'];
    $email=$_POST['email'];
    $telefono=$_POST['tel'];

    $prpstm=$conn->prepare("INSERT INTO passeggeri (nominativo, tipo_documento, n_documento, email, telefono) VALUES (?, ?, ?, ?, ?)");
    $prpstm->bind_param('sssss', $nominativo, $tipo_documento, $n_documento, $email, $telefono);

    //se la query fallisce
    if (!$prpstm->execute()) {
        bad();
    }

    //se tutte le operazioni vanno a buon fine
    $_SESSION['email_passeggero']=$email;
    ok();
    redirect('../public/home.html')
?>