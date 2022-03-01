<?php

require('project/model/frontend.php');


if (isset($_GET['id']) && $_GET['id'] > 0) {
  $ticket = getTicket($_GET['id']);
  // $comments = getComments($_GET['id']);
  require('project/view/frontend/ticketView.php');
}
else {
  echo 'Erreur : aucun identifiant de billet envoyé';
}
