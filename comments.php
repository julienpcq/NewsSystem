<?php session_start(); ?>


<html>
<head>
    <?php
    require 'config/config.php';
    include 'head.php';
    // Connection to the DB in the head because I need to catch the title to display it in the nav tab.
      $id=$_GET['id'];
      $sql = $bdd->query("SELECT * FROM posts WHERE id=$id");
      $data=$sql->fetch();
      $title = $data["name"];
  ?>

  <title><?php echo $title ?></title>
</head>
<body>
  <?php include('navbar.php'); ?>
  <a href="index.php">Retour</a>

<!-- Display the name of the post -->
<?php
echo"<h1>{$data["name"]}</h1>";
echo"<div class=\"image_article img-responsive col-lg-6\"><img src=\"images/articles/".$data['id']."/".$data['image']."\"></div>";
echo $data['id'];
?>


<form action="add_comment.php" method="post">
  <input type="hidden" name="author" value="<?php echo $_SESSION['pseudo']; ?>">
  <br />
  <label for="comment_form">Commentaire :</label>
  <textarea id="comment_form" type="text" name="content"></textarea>
  <input type="hidden" name="post_id" value="<?php echo $data["id"]; ?>">
  <br />
  <?php if(isset($_SESSION['pseudo']))
  {
    echo "<input type=\"submit\" value=\"Envoyer\">";
  }else{
    echo "Vous devez être connecté pour commenter";
  }
  ?>
  </form>

<!-- Display all comments -->
<?php
// Query for counting number of comments (number of rows)
$sql = $bdd->query("SELECT * FROM comments WHERE post_id=$id");
$count = $sql->rowCount();
echo "<p>".$count." commentaires</p>";

// Loop to display all comments of the post
while ($data = $sql->fetch()) {
  echo "<p><strong>".$data['author']."</strong>";
  echo "<small> le ".date("j/n/Y à G:i",strtotime($data["date"]))."</small></p>";
  echo "<p>".$data['content']."</p>";
}
?>

</body>
</html>