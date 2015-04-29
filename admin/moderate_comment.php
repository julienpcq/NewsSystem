<?php
session_start();
require "../config/config.php";


$content = "Ce commentaire a été modéré.";
$bdd->exec("UPDATE comments SET content='$content' WHERE id = {$_GET['id']}");
header('Location:admin.php');


?>