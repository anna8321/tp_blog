<?php $title = htmlspecialchars($ticket['title']); ?>

  <?php ob_start(); ?>

  <h1>Mon super blog !</h1>
    <p><a href="index.php">Retour à la liste des billets</a></p>


<?php
  $vho = array_slice($ticket, 0);
  var_dump($vho['title']);
  echo '<hr/>';
  echo '<br/>';
?>


  <h2>Commentaires</h2>

  <?php
    // while ($comment = $comments->fetchAll())
    // {
  ?>
      <p>
        <strong>
          <!-- <?= htmlspecialchars($comment['author']) ?>  -->
        </strong>
        le
        <!-- <?= $comment['comment_date_fr'] ?> -->
      </p>
      <p>
        <!-- <?= nl2br(htmlspecialchars($comment['description'])) ?> -->
      </p>
  <?php
    // }
  ?>

<?php $content = ob_get_clean(); ?>

<?php require('project/view/frontend/template.php'); ?>
