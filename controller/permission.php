<?php
include_once '../vendor/autoload.php';
$acc=new \App\koli\Accounts();
$acc->preparedata($_POST)->update();