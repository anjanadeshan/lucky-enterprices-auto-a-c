<?php session_start(); ?>
<?php require_once('db.php'); ?>
<?php require_once('functions.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>

<?php
$errors = array();
$username = '';
$sans= '';
$usertype= '';
$password = '';

if (isset($_POST['submit'])) {

    $first_name = $_POST['username'];
    $sans = $_POST['sans'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];

    // checking required fields
  /*  $req_fields = array('username', 'sans', 'usertype', 'password');
    $errors = array_merge($errors, check_req_fields($req_fields)); */

    // checking max length
    
   // $max_len_fields = array('username' => 50, 'sans' => 100, 'usertype' => 100, 'password' => 40);
    //$errors = array_merge($errors, check_max_len($max_len_fields));

    // checking email address
   /* if (!is_email($_POST['email'])) {
        $errors[] = 'Email address is invalid.';
    }*/

    // checking if email address already exists
    /*
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $query = "SELECT * FROM user WHERE email = '{$email}' LIMIT 1";

    $result_set = mysqli_query($connection, $query);

    if ($result_set) {
        if (mysqli_num_rows($result_set) == 1) {
            $errors[] = 'Email address already exists';
        }
    }
*/
    if (empty($errors)) {
        // no errors found... adding new record
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $sans = mysqli_real_escape_string($conn, $_POST['sans']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        // email address is already sanitized
        //$hashed_password = sha1($password);
        
        $query = "INSERT INTO users ( ";
        $query .= "username,  password, s_question , user_type";
        $query .= ") VALUES (";
        $query .= "'{$username}', '{$password}', '{$sans}', '{$usertype}'";
        $query .= ")";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page
          
            header('Location: useraccts.php');
        } else {
            $errors[] = 'Failed to add the new record.';
            //  echo 'asd'.$query;
        }
    }
}
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Add New User</title>


        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link href="../bootstrap/vendor/bootstrap-3.3.7-dist/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="vendor/bootstrap-3.3.7-dist/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
        <link href="../bootstrap/vendor/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>


        <link href="vendor/style2.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="vendor/js.js" type="text/javascript"></script>




    </head>
    <body>
        <div class="row" style="background: transparent;">
            <div class="col-xs-12">
                <nav class="navbar navbar-default" >
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#" style="color: blue;">LUCKY REF ENGINEERS</a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li  ><a href="index.php" ><i class="fa fa-home" aria-hidden="true"></i> <span style=" color:white; -webkit-text-stroke: 0.5px red;"> Home </span> <span class="sr-only">(current)</span></a></li>
                                <li><a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i>  <span style=" color:white; -webkit-text-stroke: 0.5px red;"> About Us </span> </a></li>
                                <li><a href="#"><i class="fa fa-phone-square" aria-hidden="true"></i> <span style=" color:white; -webkit-text-stroke: 0.5px red;">  Contact Us </span> </a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-external-link" aria-hidden="true"></i>  <span style=" color:white; -webkit-text-stroke: 0.5px red;"> External Links  </span> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-header">Search Engines</li><!-- /new line for dropdown header -->
                                        <li><a href="http://www.google.com" target="_blank"><i class="fa fa-google" aria-hidden="true"></i> Google</a></li>
                                        <li><a href="http://www.bing.com" target="_blank"><i class="fa fa-windows" aria-hidden="true"></i> Bing</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square" aria-hidden="true"></i> Twitter</a></li>
                                    </ul>
                                </li>


                                <li  > <a  name="logout" href="logout.php" > <i class="fa fa-sign-out" aria-hidden="true"> </i> <span style=" color:white; -webkit-text-stroke: 0.5px red;">LOG OUT</span> </a></li>

                                <li class="active"  style="background-color: #063989; " ><a href="profile.php"> <img   src="images/user.png" style="height: 40; width: auto; position: absolute; top:12%;"> <span style="padding-left: 50px; color:cyan; font-family:sans-serif ; text-shadow: 2px 2px 4px #000000;" ><?php echo $_SESSION['user_id']; ?>  </span> <span style="color: brown;"> (<?php echo $_SESSION['user_type']; ?>)</span> </li> </a>
                            </ul> 
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>


        <div class="container" id="adu">
            <div class="col-sm-12">Add New User </div>
          


            <div> 
                <div class="divform">
                    <form method="post" class="addform">


                        <p class="col-lg-12">
                            <label for="">User Name:</label>
                            <input type="text" name="username" <?php echo 'value="' . $username. '"'; ?>>
                        </p>

                        <p class="col-lg-12">
                            <label for="">Security Answer </label>
                            <input type="text" name="sans" <?php echo 'value="' . $sans . '"'; ?>>
                        </p>

                        <p class="col-lg-12">
                            <label for="">User type</label>
                            <select  name="usertype" >
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                                
                            </select>
                        </p>

                        <p class="col-lg-12" >
                            <label for="">New Password:</label>
                            <input type="password" name="password">
                        </p>

                        <p >
                            <label for="">&nbsp; </label>
                            <button type="" name="submit">Save</button>
                        </p>


                    </form>

                </div>
            </div>


        </div>






    </body>
</html>



