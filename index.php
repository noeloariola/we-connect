<?php

  // returns a collection of users
  // $users = DB::query('users');
  // users iteration
  // foreach ($users as $user) {
    // echo $user->email;
  // }
  include 'app/Model/User.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/we-connect/app/resource/public/css/wel.css">
  </head>
  <body>
    <nav class="top-nav">
        <div class="company-logo">
          <h1>we-Connect</h1>
        </div>
    </nav>
    <div id="maincontainer">
      <div class="user-table-container">
        <table id="user-table">
          <thead>
            <tr>
              <th>#</th><th>Name</th><th>Gender</th><th>Email</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( User::all() as $user ): ?>
              <tr>
                <td><?php echo $user->row; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->gender; ?></td>
                <td><?php echo $user->email; ?></td>
              </tr>
            <?php endforeach;  ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="/we-connect/app/resource/public/js/wel.js"></script>
  </body>
</html>
