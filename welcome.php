<?php
  include 'functions.php';
  $pdo = connectionDB();
?>

<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta content="viewport"/>
    <title>Log in</title>
    <style media="screen">
      div
      {
        border-style: solid;
        border-width: 2px;
        padding: 5px 5px 5px 5px;
        margin-right: 40%;
        margin-left: 40%;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="">
      <h1>Benvenuto nel nostro sito</h1>
      <button name="usernames">show user names </button>
      <?php
      if (isset($_POST["username"]))
      {
        $stmt = usernames($pdo);
        foreach ($stmt as $row) { echo $row['username'] . "\n"; }
      }
      ?>
      <br> <br>
      <button name="userpasswds">show user passwords</button>
      <?php if (isset($_POST["userpasswds"])) { echo "you must be an admin!";} ?>
    </div>
  </body>
</html>
