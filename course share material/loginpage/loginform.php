
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>login</title>
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <header class="header">
      <h1>Course Room</h1>
      <p>
        Course Room helps you to download your<br />
        course material.
      </p>
    </header>

    <div class="container">
      <div class="btn">
        <h1>Login</h1>
      </div>  

      <form action="login.php" method="post" class="login-box">

      <?php if(isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>

        <input type="email" class="email" placeholder="Email" name="email" autocomplete="off"/>
        <input type="password" class="password" placeholder="Password" name="password" />
        
        <input type="submit" value="login" class="submit"/>
        <div id="line"></div>
        <div class="create">
          <p>if you haven't register,</p>
          <a href="../signup2/signupform.php"><h4>signup</h4></a>
        </div>
       
      </form>
    </div>
  </body>
</html>
