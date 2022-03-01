
  <?php ob_start(); ?>

  <h1> Mon super Blog </h1>
  <p> Derniers billets du blog :</p>

  <?php
  foreach($tickets as $ticket )
  {
  ?>
    <div class="news">
      <h3>
        <strong><?= htmlspecialchars($ticket['title']);?></strong><em> , le  <?= htmlspecialchars($ticket['created_date']);?></em><br/>
      </h3>
      <p>
        <?= htmlspecialchars($ticket['content']);?><br/>
      </p>
      <!-- one link for show display one comment, send params to ticket.php -->
      <em> <a href="index.php?action=ticket&amp;id=<?= $ticket['id'] ?>">Commentaires</a></em>
    </div>
  <?php
  }
  ?>

  <?php $content = ob_get_clean(); ?>
  <?php require('project/view/frontend/template.php'); ?>
