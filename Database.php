<?php
$config = include_once 'sets.php';
$db_config = $config['database'];
// include $_SERVER['DOCUMENT_ROOT'].'/we-connect/sets.php';
class Database {
    private $dsn;

    public function __construct() {
      $config = include_once('sets.php');
      $this->dsn = 'mysql:host=localhost;dbname=we_connect';
    }
    public static function query($props) {
      global $db_config;
      $_this = new self;
      $pdo = new PDO($_this->dsn, $db_config['username'], $db_config['password']);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      $sql = '';

      if(sizeof($props['clause']) <= 0) {
        $sql = 'SELECT * FROM '.$props['table'];
      }else{
        $sql = 'SELECT * FROM '.$props['table'];
        $firstClause = true;
        foreach ($props['clause'] as $key => $value) {
          if($firstClause) {
            if(is_string($value)) {
              $sql.= ' where '.$key. ' = '.'\''.$value.'\'';
            }else{
              $sql.= ' where '.$key. ' = '.$value;
            }
            $firstClause = false;
          }else{
            if(is_string($value)) {
              $sql.= ' and '.$key. ' = '.'\''.$value.'\'';
            }else{
              $sql.= ' and '.$key. ' = '.$value;
            }
          }
        }
      }

      // $stmt = $pdo->query();
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      if(!$stmt){
        die("Execute query error, because: ". print_r($pdo->errorInfo(),true) );
      }
      $data = [];
      $n = 1;
      while ($row = $stmt->fetch()) {
        $row->row = $n;
        $data[] = $row;
        $n++;
      }
      return $data;
    }
}

?>
