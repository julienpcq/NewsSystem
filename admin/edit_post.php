<?php
session_start();
require "../config/config.php";

if(!empty($_POST))
{
  extract($_POST);
  $name = mysql_real_escape_string($name);
  $image = mysql_real_escape_string($image);
  $content = mysql_real_escape_string($content);
  $id = $_GET['id'];
  $edit = $bdd->exec("UPDATE posts SET name='$name',image='$image',content='$content' WHERE id = '$id'");
}

$post = $bdd->query("SELECT * FROM posts WHERE id = '{$_GET['id']}'");
$data = $post->fetch();

?>

<form action="edit_post.php" method="post" enctype="multipart/form-data">
  <label for="post_title_form">Titre du post :</label>
  <input id="post_title_form" type="text" name="name" value="<?php echo $data['name']; ?>">
  <br />
  <label for="post_image_form">Image du post :</label>
  <input id="post_image_form" type="text" name="image" value="<?php echo $data['image']; ?>">
  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
  <br />
  <label for="post_content_form">Contenu du post :</label>
  <textarea id="post_content_form" type="text" name="content"><?php echo $data['content']; ?></textarea>
  <br />
  <input type="hidden" name="author" value="<?php echo $_SESSION['pseudo']; ?>">
  <input type="hidden" name="author_id" value="<?php echo $_SESSION['id']; ?>">
  <input type="submit" name="submit" value="Envoyer">
</form>
</html>