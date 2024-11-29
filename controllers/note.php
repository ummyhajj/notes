<?php

$config = require('config.php');
$db = new Database($config['database'] );

$heading = 'Note';




$note  = $db -> query('SELECT * FROM notes WHERE user_id = :user AND id = :id', [
   
    'user' => 2,
    'id' => $_GET['id']

    ])-> fetch();

   

    if (!$note) {
        abort();
    }
      

    $currentUserId = 2;

    if ($note['user_id'] !== $currentUserId) {
        abort(Response::FORBIDDEN);
    }


 
require "views/note.view.php";