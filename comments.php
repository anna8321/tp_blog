<!-- show one ticket with its related comments -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>billet</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>

  <h1>Mon super blog</h1>
  <p><a href="index.php">Retour à la liste des billets</a></p>


<?php
// connect to database
try
{
  $db = new PDO ('mysql:host=localhost;dbname=tp_blog','root', '', );
}
  catch(Exception $e)
{
  die('Erreur:'.$e->getMessage());
}
?>



<?php
// $title = isset($_GET['title']);
// $id = isset($_GET['id']);

// retrieve ticket
$retrieveTicket = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date FROM tickets WHERE id = ?');
$retrieveTicket->execute(array($_GET['ticket']));
$ticket = $retrieveTicket->fetch();
// $retrieveTicket->execute ([
//   ':id' => $id,
//   ':title' => $title
// ]);
// $ticket = $retrieveTicket->fetchAll();

?>

<div class="news">
<h3>
<strong><?php echo htmlspecialchars($ticket['title']);?></strong><em>, le  <?php echo htmlspecialchars($ticket['created_date']);?></em><br/>
</h3>
<p>
  <?php echo nl2br(htmlspecialchars($ticket['content'])); ?>
</p>
</div>

<?php
$retrieveComment = $db->prepare('SELECT id, ticket_id, author, description, DATE_FORMAT(posted_date, \'%d/%m/%Y\ à %Hh%imin%ss\') AS posted_date FROM comments WHERE ticket_id = ? ORDER BY posted_date');
$retrieveComment->execute(array($_GET['ticket']));
while ($comment = $retrieveComment->fetch())
{
?>
<p><?php echo htmlspecialchars($comment['author']);?> le <?php echo htmlspecialchars($comment['posted_date']);?>: <br/>
<?php echo htmlspecialchars($comment['description']); ?></</p>

<?php
} // Fin de la boucle des commentaires
$retrieveComment->closeCursor();
?>

</body>
</html>
