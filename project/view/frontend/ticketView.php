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

<form action="index.php?action=addComment&amp;id=<?= $ticket['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="description">Commentaire</label><br />
        <textarea id="description" name="description"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>


  <?php
    while ($comment = $comments->fetch())
    {
  ?>
      <p>
        <strong>
          <?= htmlspecialchars($comment['author']) ?>
        </strong>
        le
         <?= $comment['posted_date'] ?>
      </p>
      <p>
         <?= nl2br(htmlspecialchars($comment['description'])) ?>
      </p>
  <?php
    }
  ?>









<?php $content = ob_get_clean(); ?>

<?php require('project/view/frontend/template.php'); ?>
