<?php
include('constants.php');

// Autoload classes when requested.
spl_autoload_register(function($class_name){
    include $_SERVER['DOCUMENT_ROOT'] . '/classes/' . $class_name . '.php';
});

/// Init
session_start();
$page = new Page();
$page->docroot = $_SERVER['DOCUMENT_ROOT'];
$page->uri     = $_SERVER['REQUEST_URI'];
$page->ip      = $_SERVER['REMOTE_ADDR'];

/// Authenticate
$page->authenticate();

/// Parse uri
if($page->uri == '/'){
    $page->setView('home');
} else $page->setView(substr($page->uri,1));
$page->setTitle('pest - '.$page->getView());

/// Render page
$page->render();
