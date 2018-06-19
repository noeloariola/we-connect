<?php
$config = include_once 'config.php';
$db_config = $config['database'];

class DB{
    private $dsn;

    public function __construct() {
      $config = include_once('config.php');
      $this->dsn = 'mysql:host=localhost;dbname=we_connect';
    }
    public static function query($table) {
      global $db_config;
      $_this = new self;
      $pdo = new PDO($_this->dsn, $db_config['username'], $db_config['password']);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $sql = 'SELECT * FROM users';
      // $stmt = $pdo->query();
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      if(!$stmt){
        die("Execute query error, because: ". print_r($pdo->errorInfo(),true) );
      }
      $data = [];
      while ($row = $stmt->fetch()) {
        $data[] = $row;
      }
      return $data;
    }
}

?>
