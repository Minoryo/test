<?php
require_once('functions.php');
require_once('classes/Community.php');

$com = new Community();
$result = $com->getAll();
var_dump($com->getCommunityInfo());
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Hobby Circle</title>
  </head>
  <body>
    <header>
      <h1>Hobby Circle</h1>
      <p>
        共通の趣味を持った仲間同士でコミュニティを作り、<br>
        コミュニティ間でイベントを実施できるサービスです。
    　</p>
    </header>

    <div class="">
      <ul class="menu">
        <li><a href="">ホーム</a></li>
        <li><a href="">コミュニティについて</a></li>
        <li><a href="new.php">コミュニティを作成する</a></li>
      </ul>
    </div>

    <div class="community_list">
      <h2>コミュニティ一覧</h2>
      <?php foreach ($result as $community) : ?>
        <div id="community">
          <p>コミュニティ名:<?php echo $community["community_name"]; ?></p>
          <?php echo $community["description"]; ?><br>
          <button type="submit" name="participate" value="<?php echo h($community["id"]); ?>">参加する</button>
        </div>
      <?php endforeach; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="js/index.js"></script>
  </body>
</html>
