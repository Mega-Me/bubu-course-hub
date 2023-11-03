<?php
session_start();
   
    include("../connection.php");
    include("../function.php");


    if($_SERVER['REQUEST_METHOD']=="POST")
    {
      //something was posted
     $username= $_POST['username'];
     $email= $_POST['email'];
      $password=$_POST['password'];
     

      if(!empty($username) && !empty($email)&& !empty($password))
      {
        $query = "insert into signup (username,email,password) values ('$username','$email','$password')";

        mysqli_query($conn,$query);

        header("location: ../loginpage/loginform.php");
        die;
      }
      else{
        echo "please enter some valid information!";
      }
    }

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="signup.css" />
  </head>
  <body>
    <div class="container" style="background-color: #def0ef">
      <header>
        <h1>signup</h1>
      </header>
      <form id="cont" action="signupform.php" method="post">
        <input
          type="text"
          name="username"
          id="username"
          placeholder="username"
          autocomplete="off"
          required
        />
        <input type="text" name="email" id="email" placeholder="Email" autocomplete="off" required/>
        <input
          type="password"
          name="password"
          id="password"
          placeholder="password"
          required
        />
        
        <input type="submit" value="signup" class="signup" />
        <div id="line"></div>
        <div class="create">
          <p>if you have registered,<a href="../loginpage/loginform.php">login</a></p>
          
        </div>
      </form>
    </div>
  </body>
</html>

