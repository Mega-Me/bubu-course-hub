
<?php 

session_start(); 

include "../connection.php";
include "../function.php";
if (isset($_POST['email']) && isset($_POST['password'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $email = validate($_POST['email']);

    $pass = validate($_POST['password']);

    if (empty($email)) {

        header("Location: loginform.php?error=Email is required");
        
        exit();

    }else if(empty($pass)){

        header("Location: loginform.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM signup WHERE email='$email' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);


            

            




            if ($row['email'] === $email && $row['password'] === $pass) {

                echo "Logged in!";

                $_SESSION['username'] = $row['username'];

                $_SESSION['email'] = $row['email'];

                $_SESSION['password'] = $row['password'];

                if($row["usertype"]=="user")
            {

                header("Location: ../index.php");

            }
            else{
                header("Location: ../admin.php");
            }

                exit();

            }else{

                 header("Location: loginform.php?error=Incorrect email or password");

                exit();

            }

        }else{

            header("Location: loginform.php?error=Incorrect email or password");

            exit();

        }

    }

}else{

    header("Location: loginform.php");

    exit();

}