<?php
require_once('MyDB.php');

class Community extends MyDB {
  private $_id;
  private $_name;
  private $_description;

  public function __construct() {
    Parent::__construct();
    $this->setTable("communities");
  }

  public function setId($id) {
    $this->_id = $id;
  }

  public function getId() {
    return $this->_id;
  }

  public function setName($name) {
    $this->_name = $name;
  }

  public function setDescription($description) {
    $this->_description = $description;
  }

  public function createCommunity() {
    $sql = 'insert into communities (community_name, description) values (:name, :description)';
    $stmt = $this->_pdo->prepare($sql);
    $stmt->bindParam(':name', $this->_name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $this->_description, PDO::PARAM_STR);
    $stmt->execute();
  }

  public function getCommunityInfo() {
    $sql = "select community_name, description from communities where id = :id";
    $stmt = $this->_pdo ->prepare($sql);
    $stmt->bindParam(':id', $this->_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
  }

  public function getCommunityCount() {
    $sql = "select count(*) from communities";
    $stmt = $this->_pdo->query($sql);
    return $stmt;
  }
}
