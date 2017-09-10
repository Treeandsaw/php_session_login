<?php  session_start(); ?>  // session starts with the help of this function 

<?php

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if 
                              // true then header redirect it to the home page directly 
 {
    header("Location:home.php"); 
 }

if(isset($_POST['login']))   // it checks whether the user clicked login button or not 
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];

    // Define $username and $password
    $username=$user;
    $password=$pass;
    // Establishing Connection with Server by passing server_name, user_id and password as a parameter
    $connection = mysql_connect("localhost", "root", "");
    // To protect MySQL injection for Security purpose
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysql_real_escape_string($username);
    $password = mysql_real_escape_string($password);
    // Selecting Database
    $db = mysql_select_db("company", $connection);
    // SQL query to fetch information of registerd users and finds user match.
    $query = mysql_query("select * from login where password='$password' AND username='$username'", $connection);
    $rows = mysql_num_rows($query);
    if ($rows == 1) {
    $_SESSION['use']=$user; // Initializing Session
    echo '<script type="text/javascript"> window.open("home.php","_self");</script>';            
    //  On Successful Login redirects to home.php
    } else {
      $error = "Username or Password is invalid";
    }
    mysql_close($connection); // Closing Connection 
}
 ?>  

<html>
<head>

<title> Login Page   </title>

</head>

<body style="padding-top: 100px; text-align: center;">

  <form action="" method="post">

      <table width="200" border="0">
    <tr>
      <td>  UserName</td>
      <td> <input type="text" name="user" > </td>
    </tr>
    <tr>
      <td> PassWord  </td>
      <td><input type="password" name="pass"></td>
    </tr>
    <tr>
      <td><input type="submit" name="login" value="LOGIN"></td>
      <td></td>
    </tr>
  </table>
  </form>

</body>
</html>