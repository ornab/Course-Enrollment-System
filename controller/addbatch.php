<?php
include_once '../vendor/autoload.php';
use App\koli\BatchData;


$id=explode(",",$_POST['dept']);
$_POST['dept']=$id[0];

$batchdata=new BatchData();
$batchdata->prepareData($_POST)->store();
header('Location:../views/addBatch.php');
