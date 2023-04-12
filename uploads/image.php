<?php
  session_start();

  require_once ('../config/db_connection.php');
  require_once ('../functions/response.php');

  $id_autista=$_SESSION['id_autista'];

  $target_dir = "img/";
  $target_file = $target_dir . basename($_FILES["img"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $_FILES['img']['name']=$id_autista.'.'.$imageFileType;
  $target_file = $target_dir . basename($_FILES["img"]["name"]);

  // Check if image file is a actual image or fake image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["img"]["size"] > 10000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {

    if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
      $sql="UPDATE autisti SET imageURL='$target_file' WHERE id=$id_autista";
      if($conn->query($sql)) echo 'Query eseguita con successo, target file: '.$target_file;
      else echo 'Query fallita, target file: '.$target_file;

      echo "<br/>The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
?>