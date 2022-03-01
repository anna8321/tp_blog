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

?>

<?php

if(empty($_POST['author']) && empty($_POST['description'])){
    // If the fields are empty, display a message to the user
    echo "Please fill in the fields";
// Process the form data if the input fields are not empty
}else{
    $author= $_POST['author'];
    $description= $_POST['description'];
    echo ('Your Name is:     '. $author. '<br/>');
    echo ('Your comment is:'   . $description. '<br/>');
}
?>

<?php
$insertComment = $db->prepare('INSERT INTO comments(author, description) VALUES (:author, :description)');
$insertComment->execute([
  'author' => $author,
  'description' => $description
// (array($_POST['comment']));

]);
// header('Location: comments.php');
$newComment = $insertComment;
?>

<a href="comments.php">retour au billet</a>

</body>
</html>
