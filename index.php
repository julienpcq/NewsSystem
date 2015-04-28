<?php
// Allways put the session start at the top of the code, before anything else.
session_start();
?>

<html>
<head>
  <title>News System</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php include ('navbar.php'); ?>


      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
      <table>
        <tbody>
        <?php
        require 'config.php';
        // Display last posts
        $display_posts = $bdd->query("SELECT * FROM posts ORDER BY id DESC LIMIT 10");
        while($data = $display_posts->fetch())
        {
          echo "<tr><td>";
          echo"<img class=\"thumbnail img-responsive col-lg-2\" src='images/articles/".$data['id']."/".$data["image"]."'><br/>";
          echo "<div class=\"news\"><a href=\"comments.php?id={$data['id']}#comments\"><h3>".$data['name']."</h3></a><p>".$data['points']." points - ";
          echo "<small>Par <a href=\"member.php?pseudo={$data["author"]}#members\">".$data['author']."</a> le ".date("j/n/Y à G:i",strtotime($data["date"]))." </small>";
          include("vote_button.php");

        // Query to display number of comments on the index for each post
        $nb_comments = $bdd->query("SELECT id FROM comments WHERE post_id={$data['id']}");
        $count_comments = $nb_comments->rowCount();
        echo " <a href=\"comments.php?id={$data['id']}#comments\"> ".$count_comments." commentaire(s)</a>";
        echo "</div></td></tr>";
        }
        ?>

        </tbody>
      </table>
      <div class="spacer"></div>
  </div>
  <div class="row">
    <div class="aside_menu col-lg-2"> TEST TEST TEST TEST</div>
  </div>
</div>

<div class="container">

</div>
<?php include('footer.php'); ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>