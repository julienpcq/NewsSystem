<?php
// Allways put the session start at the top of the code, before anything else.
session_start();
?>

<html>
<head>
  <title>News System</title>
  <?php include "head.php"; ?>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <?php include ('navbar.php'); ?>

      <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
        <?php
        require 'config/config.php';
        // Display last posts
        $display_posts = $bdd->query("SELECT * FROM posts ORDER BY id DESC LIMIT 10");
        while($data = $display_posts->fetch())
        {
          include("articles_index.php");
        }
        ?>
      </div>

      <div class="aside_menu col-lg-2"> TEST TEST TEST TEST
    </div>

      <div class="spacer"></div>
      </div>



</div>

<?php include('footer.php'); ?>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</body>
</html>