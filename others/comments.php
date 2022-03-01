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

$getData = isset($_GET['id']);


// retrieve ticket
$retrieveTicket = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date FROM tickets WHERE id = id');
$retrieveTicket->execute([
  'title' => isset($getData['title']),
  'content' => isset($getData['content']),

]);
// $tickets = $retrieveTicket->fetchAll();
// array($_GET['ticket']));

  $ticket = $retrieveTicket->fetchAll();

 // $ticket = [
//   'id' =>  $tickets[0]['id'],
//   'title' => $tickets[0]['title'],
//   'content' => $tickets[0]['content'],
//   'created_date' => $tickets[0]['created_date'],
//   'tickets' => [],
// ];
print_r($ticket[$getData]['title']);
echo '<hr/>';
echo '<br/>';

$vho = array_slice($ticket, 0);
  print_r($vho[isset($_GET['id']['title'])]);
  echo '<hr/>';
  echo '<br/>';


print_r($ticket);
 echo '<hr/>';
  echo '<br/>';

?>
<?php
for($i = 0; $i < count($vho); $i++){
  print_r($vho[$i]);
  echo '<br/>';
    echo '<hr/>';

}
?>
<hr/>

<?php
foreach($ticket as $t)
  {
    $vho = array_slice($t, 1);

  }
?>



<div class="news">
  <h3>
    <strong><?php print_r($ticket[$getData]['title']);?></strong><em>, le  <?php print_r($ticket[$getData]['created_date']);?></em><br/>
  </h3>
  <p>
    <?php print_r($ticket[$getData]['content']); ?>
  </p>
</div>

<!-- retrieve Comment -->
<h2>Commentaires:</h2>
<?php
$getData = $_GET;
$commentId = isset($getData['id']);

$retrieveComment = $db->prepare('SELECT id, ticket_id, author, description, DATE_FORMAT(posted_date, \'%d/%m/%Y\ à %Hh%imin%ss\') AS posted_date FROM comments WHERE ticket_id = ticket_id ORDER BY posted_date');
$retrieveComment->execute(array(isset($getData[
  $commentId
])));
$comments = $retrieveComment->fetchAll();

// $comment = [
//   'id' =>  $comments[0]['id'],
//   'ticket_id' => $comments[0]['ticket_id'],
//   'author' => $comments[0]['author'],
//   'description' => $comments[0]['description'],
//   'posted_date' => $comments[0]['posted_date'],
//   'comments' => [],
// ];
// array($_GET['ticket']));
?>

<?php
foreach($comments as $c)
{

  {
    echo htmlspecialchars(($c['author'])) . ' : ' .
    htmlspecialchars(($c['description']));
  }
}
?>

<div>
  <h2>Poster un commentaire</h3>
<p>
  <form action="comments_post.php" method="post">
    <label for="author">Pseudo:</label>
    <input type="text" id="author" name="author" />
    <label for="description">Commentaire:</label>
    <input type="text" name="description" id="description" />
    <button type="submit">Ajouter</button>
  </form>
</p>

</div>

</body>
</html>
