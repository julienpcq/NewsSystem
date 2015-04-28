<?php session_start(); ?>
<?php
  require 'functions.php';
  check_username(); ?>

</head>
<body>
<?php include ('navbar.php');  ?>
<p>Vous êtes sur le profil de <?php echo $_GET['pseudo'];?></p>

<?php
require 'config.php';
$nb_posts = $bdd->query("SELECT id FROM posts WHERE author='{$_GET['pseudo']}'");
$count_posts = $nb_posts->rowCount();
?>

<p>Nombre de news postées par <?php echo $_GET['pseudo']; ?> = <?php echo $count_posts ?></p>


</body>
</html>
