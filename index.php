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
}
else {
  listTickets();
}
