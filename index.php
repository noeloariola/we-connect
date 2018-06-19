<?php
include 'Database.php';
  $users = DB::query('users');
  foreach ($users as $user) {
    echo $user->email;
  }
?>
