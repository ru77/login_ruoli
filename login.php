<?php
include 'functions.php';
if (isset($_POST['submit']))
{
  $pdo = connectionDB();
  $form = ['username'=>$_POST["username"],'password' => $_POST['password']];
  if (check($pdo,$form))
  {
    if (checkType($pdo,$form)==0)
    {
      session_start();
        $_SESSION["type"] = "user";
      header( "Location: /welcome.php" );
    }
    else
    {
      session_start();
        $_SESSION["type"] = "admin";
      header( "Location: /welcome_admin.php" );
     }
  }
}
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
      <form class="" action="login.php" method="post">
        <h1>Log in</h1>
        Nome Utente
          <br><br>
        <input type="text" name="username" value="" required>
          <br><br>
        Password
          <br><br>
        <input type="password" name="password" value="" required>
          <br><br>
        <input type="submit" name="submit" value="invia">
      </form>
    </div>
  </body>
</html>
