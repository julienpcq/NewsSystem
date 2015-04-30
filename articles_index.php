
<?php
// Query to display number of comments on the index for each post
$nb_comments = $bdd->query("SELECT id FROM comments WHERE post_id={$data['id']}");
$count_comments = $nb_comments->rowCount();
?>


  <div class="news_index">
    <div class="row">
      <div class="col-lg-2 col-md-2">
        <div class="news_index_img">
          <p><img class="img-responsive" src="images/articles/<?php echo $data['id'] ;?>/<?php echo $data['image'];?>"></p>
        </div>
      </div>
      <div class="col-lg-8 col-md-8">
        <div class="news_index_content">
          <h2><a href="comments.php?id=<?php echo $data['id'] ;?>#comments"><?php echo $data['name']; ?></a></h2>
          <small>Par <a href="member.php?pseudo=<?php echo $data["author"]; ?>#members\"><?php echo $data['author']; ?></a> le <?php echo date("j/n/Y à G:i",strtotime($data["date"])); ?></small>
          <p><?php echo $data['content']; ?></p>
        </div>
      </div>
      <div class="col-lg-2 col-md-12">
        <div class="news_index_other">
          <a href="comments.php?id=<?php echo $data['id']; ?>#comments"><?php echo $count_comments; ?> commentaire(s)</a>
          <p><?php echo $data['points']; ?> point(s)</p>
          <?php include "vote_button.php"; ?>
        </div>
      </div>
    </div>
  </div>

