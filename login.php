<?php session_start(); ?>
<?php require_once('db.php'); ?>
<?php require_once('Functions.php'); ?>

<?php
// check for form submission
if (isset($_POST['submit'])) {


    $errors = array();


    // check if the username and password has been entered
    if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
        $errors[] = 'Username is Missing / Invalid';
    }

    if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
        $errors[] = 'Password is Missing / Invalid';
    }

    // check if there are any errors in the form
    if (empty($errors)) {
        // save username and password into variables
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashed_password = sha1($password);

        // prepare database query
        $query = "SELECT * FROM users 
						WHERE username = '{$email}' 
						AND password = '{$password}' 
						LIMIT 1";

        $result_set = mysqli_query($conn, $query);

        verify_query($result_set);

        if (mysqli_num_rows($result_set) == 1) {
            // valid user found
            $user = mysqli_fetch_assoc($result_set);
            $_SESSION['user_id'] = $user['username'];
            $_SESSION['user_type'] = $user['user_type'];

            // $_SESSION['first_name'] = $user['first_name'];
            // updating last login
              $query = "UPDATE users SET last_login = NOW() ";
              $query .= "WHERE username='{$_SESSION['user_id']}' LIMIT 1";

              $result_set = mysqli_query($conn, $query);

             verify_query($result_set);
               //echo '--'.$_SESSION['user_id'];
            // redirect to users.php
            header('Location: index.php');
        } else {
            // user name and password invalid
            $errors[] = 'Invalid Username / Password';
        }
    }
}
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">

        <title>OSTI</title>


        <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <link href="vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <link href="vendor/style.css" rel="stylesheet" type="text/css"/>

        <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body class="back">
        <div class="1div"> 
            <img src="images/img.jpg" class="img"> 


        </div>
        <div class="loginbox"> 
            <img src="images/user.png" class="user">
            <h2> Log In Here </h2>
            <form method="post" action="#">
                <?php
                if (!isset($_GET['logout'])) {


                    if (isset($errors) && !empty($errors)) {



                        if ((!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) && (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1)) {
                            //$errors[] = 'Username is Missing / Invalid';
                            echo '<p class="error" style="margin-bottom:10; text-align:center; font-size:25px; color:red;box-sizing: border-box;
    background: rgba(50,58,73,1);
 box-shadow: 0 0 25px #d81d08; ">Username & Password Missing</p>';
                        } elseif (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1) {
                            //$errors[] = 'Username is Missing / Invalid';
                            echo '<p class="error" style="margin-bottom:10; text-align:center; font-size:25px; color:red;box-sizing: border-box;
    background: rgba(50,58,73,1);
 box-shadow: 0 0 25px #d81d08; ">Username is Missing / Invalid</p>';
                        } elseif (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1) {
                            //$errors[] = 'Password is Missing / Invalid';
                            echo '<p class="error" style="margin-bottom:10; text-align:center; font-size:25px; color:red;box-sizing: border-box;
    background: rgba(50,58,73,1);
 box-shadow: 0 0 25px #d81d08; ">Password is Missing / Invalid</p>';
                        } elseif (!empty($_POST['password']) && !empty($_POST['email'])) {

                            echo '<p class="error" style="margin-bottom:10; text-align:center; font-size:25px; color:red;box-sizing: border-box;
    background: rgba(50,58,73,1);
 box-shadow: 0 0 25px #d81d08; ">Invalid Username / Password</p>';
                        }
                    }
                    
                }
                ?>

                <?php
                if (isset($_GET['logout']) && !isset($errors) && empty($errors)) {
                    echo '<p class="info" style="margin-bottom:10 ; text-align:center; font-size:25px; color:green;box-sizing: border-box;
    background: rgba(50,58,73,1);
    box-shadow: 0 0 25px #d81d08; ">You have successfully logged out from the system</p>';
                    //unset($_GET['logout']);
                    //if (isset($_POST['submit'])) { }
                       //$_GET['logout']=0; 
                 //   header('Location: logout=0');
                       
                       
                       
                       
                       
                       
                       
                       
                    
                }
                ?>
                <p>Email</p>
                <input type="text" name="email"  placeholder="Enter Email">
                <p>Password</p>
                <input type="password" name="password" placeholder="•••••••••">


                <input type="submit" name="submit" value="Sign In">
                <a href="#" > Forget Password </a>
            </form>
            
        </div>

        <?php
// put your code here
        ?>
        <br>
        <br>
        <br>

       
    </body>
</html>
<?php mysqli_close($conn); ?>