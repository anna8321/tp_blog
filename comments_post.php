<!-- save the comment to db  -->

<?php
try
{
$db = new PDO('mysql:host=localhost;dbname=minichat', 'root', '');
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}

$author = $_POST['author'];
$description = $_POST['description'];




$insertComment = $db->prepare('INSERT INTO comments(author, description) VALUES (:author, :description)');
$insertComment->execute([
  'author' => $author,
  'description' => $description
// (array($_POST['comment']));

]);
header('Location: comments.php');

?>

  <div class="container">

        <h1>Commentaire bien posté !</h1>

        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Apercu du commentaire</h5>
                <p class="card-text"><b>auteur</b> : <?php echo ($author); ?></p>
                <p class="card-text"><b>commentaire</b> : <?php echo ($description); ?></p>
            </div>
        </div>

</body>
</html>
