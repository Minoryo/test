<?php

require_once('MyDB.php');

class Chat extends MyDB {
  private $_message;

  public function __construct() {
    Parent::__construct();
    $this->setTable("messages");
  }

  public function setMessage($msg) {
    $this->_message = $msg;
  }

  public function postData($com_id) {
    $sql = "insert into messages (com_id, message) values (:com_id, :message)";
    $stmt = $this->_pdo->prepare($sql);
    $stmt->bindParam(':com_id', $com_id, PDO::PARAM_INT);
    $stmt->bindParam(':message', $this->_message, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function getMessage($com_id) {
    $sql = "select message from messages INNER JOIN communities ON communities.id = messages.com_id";
    $stmt = $this->_pdo ->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll();
  }

}
