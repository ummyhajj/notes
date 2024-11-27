<?php

$config = require "config.php";
$db = new Database($config['database'] );

$heading = 'Note';



$note  = $db -> query('SELECT * FROM notes WHERE user_id = :user AND id = :id', [
    'user' => 3,
    'id' => $_GET['id'] 
    ]) -> fetch();


    if (!$note) {
        abort(404);
    }

 
require "views/note.view.php";