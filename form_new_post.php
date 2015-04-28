<?php session_start(); ?>
<html>
<head>
  <title>HackerNewsCopy | Ajouter un post</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php include('navbar.php'); ?>
<!-- Form to add a new post-->
<form action="add_post.php" method="post" enctype="multipart/form-data">
  <label for="post_title_form">Titre du post :</label>
  <input id="post_title_form" type="text" name="name">
  <br />
  <label for="post_image_form">Image du post :</label>
  <input id="post_image_form" type="text" name="image">
  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
  <br />
  <label for="post_content_form">Contenu du post :</label>
  <textarea id="post_content_form" type="text" name="content"></textarea>
  <br />
  <input type="hidden" name="author" value="<?php echo $_SESSION['pseudo']; ?>">
  <input type="hidden" name="author_id" value="<?php echo $_SESSION['id']; ?>">
  <input type="submit" name="submit" value="Envoyer">
</form>
</html>