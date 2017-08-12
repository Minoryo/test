<?php

require_once('functions.php');
require_once('classes/Community.php');

$c_name = h($_POST['community_name']);
$c_description = h($_POST['description']);

$community = new Community();
$community->setName($c_name);
$community->setDescription($c_description);
if ($community->createCommunity()) {
  echo "コミュニティが作成されました。";
  echo "<a href='http:localhost:8000'>戻る</a>";
} else {
  echo "コミュニティ作成に失敗しました。";
}
