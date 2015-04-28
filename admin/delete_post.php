<?php
session_start();
require "../config/config.php";

$sql = $bdd->exec("DELETE FROM posts WHERE id = {$_GET['id']}");
header ("Location:admin.php");
?>