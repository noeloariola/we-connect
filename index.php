<?php
include 'Database.php';
  // returns a collection of users
  $users = DB::query('users');
  foreach ($users as $user) {
    echo $user->email;
  }
?>
