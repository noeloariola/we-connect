<?php
// namespace Model;
/**
 *
 */
include $_SERVER['DOCUMENT_ROOT'].'/we-connect/Database.php';

class Model {
  public static $table;

  function __construct($table) {
      self::$table = $table;
  }
  public static function all() {
    $users = Database::query(['table' => self::$table, 'clause' => []]);
    return $users;
  }
  public static function find($id) {
    $users = Database::query(['table' => self::$table, 'clause' => ['id' => $id, 'gender' => 'male']]);
    return $users;
  }
}
/**
 *
 */
trait StaticGet
{
  static function all() {
    parent::$table = 'user';
    return parent::all();
  }
  static function find($id) {
    parent::$table = 'user';
    return parent::find($id);
  }
}

class User extends Model {
  use StaticGet;
  function __construct() {
    parent::__construct('users');
  }
}

// print_r(User::all());
// print_r(User::find('1'));

?>
