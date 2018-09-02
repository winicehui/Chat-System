<?php 

require_once('xmlHandler.php');

if (!isset($_COOKIE["name"])) {
    header("Location: error.html");
    exit;
}

// create the chatroom xml file handler
$xmlh = new xmlHandler("chatroom.xml");
if (!$xmlh->fileExist()) {
    header("Location: error.html");
    exit;
}


setcookie("name", "");
$xmlh->openFile();
$users= $xmlh-> getElement("users");
$childNodeList = $users->childNodes;

$messages= $xmlh-> getElement("messages");
$childNodeList = $messages->childNodes;


$xmlh-> saveFile();

echo "<script> window.parent.location.reload() </script>";


//no while loop stuff

?>
