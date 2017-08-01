<?php
include_once('../vendor/autoload.php');
use App\koli\AdminProfile;
use App\koli\Message;
use App\koli\Login;
use App\koli\Utility;
/*Utility::d($_POST);
Utility::dd($_FILES);*/

?>


<?php
if((isset($_FILES['image'])) && (!empty($_FILES['image']['name']))){
    $imageName=time().$_FILES["image"]["name"];
    $temporaryLocation=$_FILES["image"]["tmp_name"];
    unlink($_SERVER['DOCUMENT_ROOT'].'/testors/resource/images/'.$allInfo['image']);
    move_uploaded_file($temporaryLocation,"../resource/images/".$imageName);
    $_POST["image"]=$imageName;


}

//Utility::dd($_POST);

$profilePicture=new AdminProfile();
$profilePicture->prepare($_POST)->update();
?>