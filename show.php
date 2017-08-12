<?php
require_once('functions.php');
require_once('classes/Community.php');
require_once('classes/Chat.php');



//コミュニティに入っているかのチェック

$com_id = h($_GET["id"]);

$com = new Community();
$com->setId($com_id);
$community = $com->getCommunityInfo();

$chat = new Chat();
$messages = $chat->getMessage($com->getId());

?>

<h1>コミュニティ名：<?php echo $community["community_name"]; ?></h1>
<p>コミュニティ説明：<?php echo $community["description"]; ?></p>

<div class="form_area">
  <form class="" action="../message.php" method="post">
    <textarea name="message" cols="60" rows="6"></textarea>
    <input type="submit" value="書き込む">
    <input type="hidden" name="community_id" value="<?php echo $com_id; ?>">
  </form>
</div>

<div class="chat-area">
  <h2>チャット</h2>
  <?php foreach ($messages as $message) : ?>
    <?php echo $message["message"]; ?><br>
  <?php endforeach; ?>
</div>
