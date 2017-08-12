<?php

class MyDB {
  protected $_pdo;
  private $_tablename;

  public function __construct() {
    try {
      $this->_pdo = new PDO('mysql:host=localhost;dbname=hobby_circle', 'root', 'mino5150');
    } catch (PDOException $e) {
      echo "エラー！： " . $e->getMessage();
    }
  }

  protected function setTable($tb_name) {
    $this->_tablename = $tb_name;
  }

  protected function getTable() {
    return $this->_tablename;
  }

  public function getAll() {
    $stmt = $this->_pdo->query("select * from " . $this->_tablename);
    return $stmt;
  }

}
