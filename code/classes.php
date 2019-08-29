<?php

interface iApp {
  public function __construct();
  public function ConnectDb();
  public function GetRandomGroups();
}

abstract class AbstractApp implements iApp {

  public $conn = null;
  public $user = null;
  public $pass = null;
  public $hosted = null;
  public $dbname = null;
  public $sql = null;
  public $statement = null;
  public $rows = null;
  public $debug = '';

  public function __construct() {
    $this->ConnectDb();
  }

  public function GetRandomGroups() {
  }

  public function ConnectDb() {

    $this->hosted = gethostname();

    $this->user = getenv('TEST_USERNAME');
    $this->pass = getenv('TEST_PASSWORD');
    $this->dbname = "givepulse_test";

    if ($this->hosted == 'gator2005.hostgator.com') {
      $this->user = getenv('TEST_USERNAME');
      $this->pass = getenv('TEST_PASSWORD');
      $this->dbname = "zaphod_test1";
    }

    try {
      $this->conn = new pdo('mysql:host=localhost; port=3306; dbname='. $this->dbname, $this->user, $this->pass);
      if ($this->conn){
        $this->debug .= "MYSQL - PDO SUCCESS.<br>";
      }
    }

    catch(PDOException $e) {
      $this->debug .=  "MYSQL - PDO ERROR -> " . $e->getMessage() . "<br>";
    }

  }
}

class App extends AbstractApp  {

  public function GetRandomGroups() {

    $this->sql  = ' ';
    $this->sql .= ' SELECT G.title, G.address1, G.latitude, G.longitude  ';
    $this->sql .= ' FROM groups G ';
    $this->sql .= ' WHERE G.latitude IS NOT NULL ';
    $this->sql .= ' AND G.longitude IS NOT NULL ';
    $this->sql .= ' ORDER BY RAND() ';
    $this->sql .= ' LIMIT 50 ';
    $this->sql .= ' ; ';

    $this->debug .= 'SQL = ' . $this->sql . '<br>';

    $this->statement = $this->conn->prepare($this->sql);
    $this->statement->execute();
    $this->rows = $this->statement->fetchAll(PDO::FETCH_ASSOC);

    $this->debug .=  'ROWS = ' . $this->statement->rowCount() . '<br>';

  }

}

