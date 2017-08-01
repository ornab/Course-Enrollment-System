<?php
include_once '../vendor/autoload.php';
use App\koli\DepartMentData;
$obj=new DepartMentData();
$obj->prepareData($_POST)->update();