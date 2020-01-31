<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'functions.php';
//exc in handling scenario
//mb4 cause better unicode support
function error_report($e_pdo)
{
  print_r($e_pdo->errorInfo());
}
try
{
  $pdo = connectionDB();
  createTables($pdo);
}
catch (\PDOException $e)
{
  throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

createTables($pdo);
if (isset($_POST['submit']))
{
  insert($pdo,getForm());
  echo var_dump($pdo);
  header( "Location: /index.php" );
}
?>
<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8"/>
    <meta content="viewport"/>
    <title>Sign up</title>
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
      <form class="" action="signup.php" method="post">
        <h1>Registrati!</h1>
        Nome Utente
          <br><br>
        <input type="text" name="username" value="" required>
          <br><br>
        Password
          <br><br>
        <input type="password" name="password" value="" required>
          <br><br>
        <input type="radio" name="type" value="base" required>
        Utente base
          <br><br>
        <input type="radio" name="type" value="admin" required>
        Admin
          <br><br>
        <input type="submit" name="submit" value="invia">
      </form>
    </div>
  </body>
</html>
