<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>blog</title>
</head>
<body>
 <h1> Mon super Blog </h1>
 <p> Derniers billets du blog :</p>
 <!-- connect to database first  -->
 <?php
 try
 {
   $db = new PDO ('mysql:host=localhost;dbname=tp_blog','root', '', );
 }
  catch(Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
 ?>
<!-- retrieve last tickets from database with sqlquery -->
<?php
$retrieveTicket = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date FROM tickets ORDER BY created_date DESC LIMIT 0,5');
$retrieveTicket->execute ([
  'title' => isset($_GET['title']),
  'content' => isset($_GET['content']),
]);
$tickets = $retrieveTicket->fetchAll();
?>
<!-- display 5 last tickets with a loop title and content  -->

<?php
foreach($tickets as $ticket )
{
?>
  <div class="news">
    <h3>
      <strong><?php echo htmlspecialchars($ticket['title']);?></strong><em> , le  <?php echo htmlspecialchars($ticket['created_date']);?></em><br/>
    </h3>
    <p>
      <?php echo htmlspecialchars($ticket['content']);?><br/>
    </p>
      <!-- one link for show display one comment, send params to comment.php -->
      <em> <a href="comments.php?ticket=<?php echo $ticket['id']; ?>">Commentaires</a></em>
  </div>
<?php
}
?>
<!-- stop the loop -->

<?php
$retrieveTicket->closeCursor();
?>

</body>
</html>
