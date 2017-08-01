<?php

include_once '../vendor/autoload.php';
$registered=new \App\koli\Registered_Course();
$registered->update($_GET['id']);
