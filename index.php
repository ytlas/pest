<?php

/* This is the "index.php controller". This is where
 * all the requests to the website should go. The uri
 * will be stored in a get variable called 'view'. */
// Initializes the session
session_start();
global $user;

// Sets up an autoloading for the classes in DOCUMENT_ROOT/classes/
spl_autoload_register(function($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
});
// Create new object of class Site
$site = new Site("pest+");

// Authenticate the user
$site->authenticate();

// Renders a page depending on the "view" get variable in the uri
$site->render($_GET['view']);
exit();
