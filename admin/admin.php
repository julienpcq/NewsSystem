<?php
session_start();
?>
<html>
<head>
  <title>Administration</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>

<div class="container">
  <div class="row">
    <div class="col-lg-4 col-lg-offset-4"><a href="../form_new_post.php">Ajouter un nouveau post</a></div>
    <div class="col-lg-4">
      <h3>Derniers articles</h3>
      <?php
      require "../config/config.php";
      $all_posts = $bdd->query("SELECT * FROM posts ORDER BY id DESC LIMIT 20");
      while ($data = $all_posts->fetch())
      {
        echo "N° " . $data['id'] . " - " . $data['name'] .
        " - <a href=\"delete_post.php?id={$data['id']}\">Supprimer</a>
        - <a href=\"edit_post.php?id={$data['id']}\">Modifier</a><br>";
      }
      ?>
    </div>
    <div class="col-lg-4">
      <h3>Derniers commentaires</h3>
      <?php
      $last_comments = $bdd->query("SELECT * FROM comments ORDER BY id DESC LIMIT 20");
      while ($data_comments = $last_comments->fetch())
      {
        echo $data_comments['author'] . " - " . $data_comments['post_id'] . "<br>";
        echo $data_comments['content'] . "<br>";
        echo "<a href=\"moderate_comment.php?id={$data_comments['id']}\">Modérer</a><br>";
      }
      ?>

    </div>

  </div>
</div>
</html>
