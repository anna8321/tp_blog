<?php

require('project/controller/frontend.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listTickets') {
      listTickets();
    }
    elseif ($_GET['action'] == 'ticket') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        ticket();
      }
      else {
        echo 'Erreur : aucun identifiant de billet envoyé';
      }
    }
    elseif ($_GET['action'] == 'addComment') {
      if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['author']) && !empty($_POST['description'])) {
          addComment($_GET['id'], $_POST['author'], $_POST['description']);
        }
        else {
          echo 'Erreur : tous les champs ne sont pas remplis!';
        }
      }
      else {
        echo 'Erreur : aucun identifiant de billet envoyé';
      }
    }
}
else {
  listTickets();
}
