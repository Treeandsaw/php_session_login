<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body style="padding-top: 100px; text-align: center;">
<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login.php");  
       }

          echo 'Username: '.$_SESSION['use'].'<br><br>';

          echo "Login Success ";

          echo "<a href='logout.php'>Logout</a> "; 
?>
</body>
</html>