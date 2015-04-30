<?php
session_start();
// Insert new post in database
require 'config/config.php';
extract($_POST);
$name = addslashes($name);
$content = addslashes($content);
$sql = $bdd->exec("INSERT INTO posts(name,image,content,author) VALUES ('$name','$image','$content','$author')");
$id = $bdd->lastInsertId();

$target_file = "images/articles/" . $id . "/";
$target_thumb = "images/articles/" . $id . "/thumb/";
mkdir($target_file);
mkdir($target_thumb);

$valid_formats = array("jpg", "png", "gif", "zip", "bmp");
$max_file_size = 1024000*100; // 10 Mo maximum par fichier
$count = 0;

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){
  // Loop $_FILES to exeicute all files
  foreach ($_FILES['files']['name'] as $f => $name) {
      if ($_FILES['files']['error'][$f] == 4) {
          continue; // Skip file if any error found
      }
      if ($_FILES['files']['error'][$f] == 0) {
          if ($_FILES['files']['size'][$f] > $max_file_size) {
              $message[] = "$name is too large!.";
              continue; // Skip large files
          }
      elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $valid_formats) ){
        $message[] = "$name is not a valid format";
        continue; // Skip invalid file formats
      }
          else{ // No error found! Move uploaded files
              if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $target_file.$name))
              $count++; // Number of successfully uploaded file

          }
      }
  }
}

header('Location:index.php');