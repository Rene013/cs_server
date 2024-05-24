<?php

error_reporting(0);//E_ALL & ~E_NOTICE

#Setup File:

# Database Connection:
require_once 'connection.php';

# Functions:
include('functions/data.php');
include('functions/template.php');

# Loaad the pages view /**** pages can be loaded via the view class ***/
if(isset($_GET['page'])) {
    
    $page = $_GET['page']; // Set $pageid to equal the value given in the URL
    
} else {
    
    $page = 'dashboard'; // Set $pageid equal to 1 or the Home Page.
    
}

# Page Setup:
include('queries.php');
# Ajax Querries:

// require_once('ajax/avatar.php');
// require_once('ajax/blur-save.php');
// require_once('ajax/list-sort.php');
// require_once('ajax/navigation.php');
// require_once('ajax/pages.php');
?>