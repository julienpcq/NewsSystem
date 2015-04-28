<?php
if(isset($_SESSION['pseudo']))
{
  echo "<a href=\"add_point.php?id={$data['id']}#posts\">Voter</a>";
}
else
{
  echo "<small>Identifiez-vous pour voter</small>";
}
?>