<?php
namespace Config;

$server_name = $_SERVER['HTTP_HOST'];
$server_protocol = strtolower(explode("/", $_SERVER['SERVER_PROTOCOL'])[0]);
$resource_path = $server_protocol.'://we-connect/app/resource';
class Controller {
  
}
// function __autoloader($filename){
//   $file_name = $filename.'.php';
//   $file = './'.$file_name;
//   if( !file_exists( $file_name ) ) {
//     return false;
//   }
//   require $file;
//   spl_autoload_register('__autoloader');
// }

?>
