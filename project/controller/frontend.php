<?php

require('project/model/frontend.php');

function listTickets()
{
  $tickets = getTickets();
  require('project/view/frontend/listTicketsView.php');
}

function ticket()
{
  $ticket = getTicket($_GET['id']);
  $comments = getComments($_GET['id']);
  require('project/view/frontend/ticketView.php');
}

function addComment($ticketId, $author, $description)
{
  $affectedLines = ticketComment($ticketId, $author, $description);

  if ($affectedLines === false) {
    die('impossible d\'ajouter commentaire!');
  }
  else {
    header('Location: index.php?action=ticket&id=' . $ticketId);
  }
}
