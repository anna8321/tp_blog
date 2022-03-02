<?php

function getTickets()
{ // connect to db
  $db= dbConnect();
// retrieve tickets from database with sqlquery
  $retrieveTickets = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date FROM tickets ORDER BY created_date DESC LIMIT 0,5');
  $retrieveTickets->execute ([
    'title' => isset($_GET['title']),
    'content' => isset($_GET['content']),
  ]);
  $tickets = $retrieveTickets->fetchAll();
  return $tickets;
}

function getTicket($ticketId)
{
  $db = dbConnect();
  $retrieveTicket = $db->prepare('SELECT id, title, content, DATE_FORMAT(created_date, \'%d/%m/%Y à %Hh%imin%ss\') AS created_date FROM tickets WHERE `tickets`.`id` = ?');
  $retrieveTicket->execute(array($ticketId));
  $ticket = $retrieveTicket->fetch();
  return $ticket;

}

function getComments($ticketId)
{
  $db = dbConnect();
  $retrieveComments = $db->prepare('SELECT id, author, description, DATE_FORMAT(posted_date, \'%d/%m/%Y\ à %Hh%imin%ss\') AS posted_date FROM comments WHERE ticket_id = ? ORDER BY posted_date DESC');
  $retrieveComments->execute(array($ticketId));
  // $comments = $retrieveComments->fetchAll();

  return $retrieveComments;

}

function ticketComment($ticketId, $author, $description)
{
  $db = dbConnect();
  $comments = $db->prepare('INSERT INTO comments(ticket_id, author, description, posted_date) VALUES (?, ?, ?, NOW())');
  $affectedLines = $comments->execute(array($ticketId, $author, $description));
  return $affectedLines;
}

function dbConnect()
{
  try
  {
    $db = new PDO ('mysql:host=localhost;dbname=tp_blog','root', '');
    return $db;
  }
  catch(Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
}
