<?php

require_once'config/init.php';
$page = new Page();
include('template/header.php'); // Page Header

include('views/pages/'. $page->_type->name.'.php'); // View Type

include('template/footer.php'); // Page Footer 

?>
