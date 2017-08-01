<?php
/**
 * Created by PhpStorm.
 * User: rod16
 * Date: 6/10/2016
 * Time: 2:40 AM
 */

include_once '../vendor/autoload.php';
use App\koli\Admin;
$addadmin=new Admin();
$addadmin->insert($_POST);
header("Location: ../views/assignadmin.php");
exit;