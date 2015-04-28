<?php
require 'config/config.php';
extract($_POST);
$author = nl2br(addslashes(htmlspecialchars($author)));
$content = nl2br(addslashes(htmlspecialchars($content)));
$sql=$bdd->exec("INSERT INTO comments(author,content,post_id) VALUES ('$author','$content','$post_id')");
header("Location: comments.php?id={$_POST['post_id']}");
?>