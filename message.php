<?php
require_once('functions.php');
require_once('classes/Chat.php');


$com_id = h($_POST["community_id"]);
$message = $_POST["message"];

$chat = new Chat();
$chat->setMessage($message);

//com_idとmessageを投稿する処理
$chat->postData($com_id);

header('Location:http://localhost:8000/show.php?id=' . $_POST["community_id"]);
exit();
