
<div id="message">

    <?
    if(array_key_exists('message',$_SESSION)&&(!empty($_SESSION['message']))){
        echo App\koli\Message::message();
    }
    ?>
</div>