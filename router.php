<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  
  // Refactored the if statements below to the $route array
  //   if ( $uri === '/routers/index' ) {
  
  //     require "controllers/index.php";
  
  //   } else if ( $uri === '/routers/about' ) {
  
  //     require "controllers/about.php";
  
  //   } else if ( $uri === "/routers/contact") {
  
  //     require "controllers/contact.php";
  //   }
  //declaration of the routes

  $routes = [
      '/authorisation/index' => 'controllers/index.php',
      '/authorisation/about' => 'controllers/about.php',
      '/authorisation/notes' => 'controllers/notes.php',
      '/authorisation/note' => 'controllers/note.php',
      '/authorisation/contact' => 'controllers/contact.php',
  ];
  
  
  
  //routing the current uri to the corresponding controller
  function routeToController($uri,$routes){

      if (array_key_exists($uri, $routes)) {
          require $routes[$uri];
      } else {
          abort(404); 
      }
  }
  function abort($code = 404){
      http_response_code($code);
  
      require "views/{$code}.php";
  
      die();
  }
  
  routeToController($uri,$routes);
  