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
  // $comments = getComments($_GET['id']);
  require('project/view/frontend/ticketView.php');
}
