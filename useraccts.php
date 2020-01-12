<?php session_start(); ?>
<?php require_once('db.php'); ?>
<?php require_once('Functions.php'); ?>
<?php require_once('process.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
//    header('Location: login.php');
}
?>


<?php

$first_name = '';
$last_name = '';
$username = '';
$usertype = '';
$password = '';


if (isset($_POST['save'])) {

    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $username = $_POST['username'];
    $usertype = $_POST['role'];
    $password = $_POST['password'];
    if (empty($errors)) {
        // no errors found... adding new record
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        // email address is already sanitized
        //$hashed_password = sha1($password);


        $query = "INSERT INTO users ( ";
        $query .= "fname, lname,username,  password , user_type";
        $query .= ") VALUES (";
        $query .= "'{$first_name}', '{$last_name}', '{$username}', '{$password}', '{$usertype}'";
        $query .= ")";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page

            $sweetalertadded = $username;
        } else {
            $errors[] = 'Failed to add the new record.';
            echo $errors[0];
            $errors[0] = '';
        }
    }
}
if (isset($_POST['update'])) {

   
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $username = $_POST['username'];
    $usertype = $_POST['role'];
    $password = $_POST['password'];
    if (empty($errors)) {
        // no errors found... adding new record
        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $password = mysqli_real_escape_string($conn, $_POST['password']);
        // email address is already sanitized
        //$hashed_password = sha1($password);
//        $query = "INSERT INTO users ( ";
//        $query .= "fname, lname,username,  password , user_type";
//        $query .= ") VALUES (";
//        $query .= "'{$first_name}', '{$last_name}', '{$username}', '{$password}', '{$usertype}'";
//        $query .= ")";

        $query = "UPDATE `users` SET `fname`='{$first_name}',`lname`='{$last_name}',`username`='{$username}',`password`='{$password}',`user_type`='{$usertype}' WHERE username=";
        $query .= "'{$_GET['edit']}'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page
            $sweetalerupdate = $username;
            unset($_GET['edit']);
            unset($_POST['update']);
            $update = false;
            $f_name = '';
            $l_name = '';
            $uname = '';
            $utype = '';
            $pword = '';
            // echo '<script>location.replace("http://localhost/ostiwebpro/useraccts.php");</script>';
        } else {
            $errors[] = 'Failed to add the new record.';
            echo $errors[0];
            $errors[0] = '';
        }
    }
}

 if (isset($_GET['delete'])) {




        $query = "DELETE FROM users WHERE username =";
        $query .= "'{$_GET['delete']}'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            // query successful... redirecting to users page
//          echo $result;
          //echo '<script>location.replace("http://localhost/ostiwebpro/useraccts.php");</script>';
            $sweetalerdelete=$_GET['delete'];
           
   
           // echo '<script>setTimeout(function () { location.replace("http://localhost/ostiwebpro/useraccts.php");}, 500);</script>';

            // echo 'deleted ';
        } else {
            $errors[] = 'Failed to add the new record.';
            echo 'FAIL';
            echo $query;
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Data Table -->
        <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Imported Template Start   -->
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Favicons -->
        <link href="img/favicon.png" rel="icon">
        <link href="img/apple-touch-icon.png" rel="apple-touch-icon">


        <!--  sweet alert-->

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

        <!-- Bootstrap CSS File -->
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Libraries CSS Files -->
        <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/animate/animate.min.css" rel="stylesheet">
        <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Main Stylesheet File -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Imported Template End   -->



        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





        <!-- <link href="vendor/style.css" rel="stylesheet" type="text/css"/> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="vendor/js.js" type="text/javascript"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>

        <title>User Accounts</title>


        <style>
            #list_filter>label>input{
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
            }
        
            .modal-open>button{
                z-index:2;
            }
        </style>
    </head>
    <body>

        <!--==========================
        Header
        ============================-->
        <header id="header" class="fixed-top bg-orange">


            <div class="logo float-left">
                <!-- Uncomment below if you prefer to use an image logo -->
                <h3 class="text-light"><a href="index.php"><span>Lucky Ref Engineers</span></a></h3>
                <!-- <a href="#intro" class="scrollto"><img src="img/lucky2.jpg" alt="" class="img-fluid"></a> -->
            </div>

            <nav class="main-nav float-right d-none d-lg-block">
                <ul>
                    <li ><a href="index.php">Home</a></li>
              
                    <?php
                   if (!isset($_SESSION['user_id'])) {
                    echo  '<li class="nav-item">
                    <a class="nav-link" href="login.php">
                      <i class="fa fa-sign-in">
                       
                      </i>
                      Login
                    </a>
                  </li>' ;
                 }
                  
                  
                  if (isset($_SESSION['user_id'])) {
          
             
              echo
              (' <li class="nav-item">
                 <a class="nav-link" href="joblist.php">
                   <i class="fa fa-reorder">
                     
                   </i>
                   Job List
                 </a>
               </li>')
               ;
               if ($_SESSION['user_type']==='Admin' ){
                echo
                (' <li class="nav-item active">
                   <a class="nav-link" href="useraccts.php">
                     <i class="fa fa-users">
                      
                     </i>
                     User Management
                   </a> 
                 </li>')
                 ; 
              }
                 
                   
                   echo   
        
                   ('<li class="drop-down"><a href="">
                   <i class="fa fa-user-circle">
                   
                   </i>
                   <span style="color: orange;"> '.($_SESSION['user_id']) . '</span>  <span style="font-size: 10px;"> ('.  $_SESSION['user_type'] .')</span>
                  
                   </a>
        
                   <ul>
                     <li><a href="profile.php">My Profile</a></li>
                     <li >
                     <a  href="joblist.php">
                      
                       Job List
                     </a>
                   </li>
                      
                     </li>
                      
                      
                    
                     '.(($_SESSION['user_type']==='Admin' ) ? '<li><a href="useraccts.php">User Management</a></li>' : '').' 
                     <li><a href="#">Drop Down 4</a></li>
                     <div class="dropdown-divider"></div>
                     <li><a href="logout.php">Logout</a></li>
                   </ul>
                 </li>') ;
        
              }
                    ?>
                </ul>
            </nav><!-- .main-nav -->

        </div>
    </header><!-- #header -->

    <?php
    $user_list = '';

// getting the list of users
    $query = "SELECT * FROM users  ORDER BY username";
    $jobs = mysqli_query($conn, $query);
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">

                    
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add User
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <form method="post">
                        <div class="modal-header">

                            <?php if ($update == true): ?>
                                <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                            <?php else: ?>
                                <h5 class="modal-title" id="exampleModalLabel">Create New User</h5>
                            <?php endif; ?>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First name</label>
                                    <input type="text" name="fname" class="form-control" id="firstName" placeholder="" value="<?php echo $f_name ?>"s required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last name</label>
                                    <input type="text"name="lname" class="form-control" id="lastName" placeholder="" value="<?php echo $l_name ?>" required="">
                                    <div class="invalid-feedback">
                                        Valid last name is required.
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">@</span>
                                    </div>
                                    <input type="text"  name="username"class="form-control" id="username" value="<?php echo $uname ?>" placeholder="Username" required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Password for new user</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-fw" aria-hidden="true" title="Copy to use key"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="password" id="username"  value="<?php echo $pword ?>"placeholder="Password" required="">
                                    <div class="invalid-feedback" style="width: 100%;">
                                        Your username is required.
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="username">Select User Role</label>
                                <div class="d-block my-2">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="role" type="radio" class="custom-control-input " value="Admin"  checked="" required="">
                                        <label class="custom-control-label pl-4" for="credit">Admin</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="role" type="radio" value="User" class="custom-control-input" required="">
                                        <label class="custom-control-label pl-4" for="debit">User </label>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if ($update == true): ?>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <?php else: ?>
                                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <br>
        <br>
        <br>
        <div class="table-responsive">
        <table class="table table-striped table-bordered" align="center" id="list">
            <thead>
            <td> Name</td>
            <td>User Name</td>
            <td>User Type</td>
            <td>Last Login</td>
            <td>Actions</td>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($jobs)) {

                echo'<tr><td>' . $row['fname'] . ' ' . $row['lname'] . '</td><td>' . $row['username'] . '</td>'
                . '<td>' . $row['user_type'] . '</td>'
                . '<td>' . $row['last_login'] . '</td>'
                . '<td><a  onclick="swal({
  title: \'Are you sure? Delete  ' . $row['username'] . ' \',
  text: \'Once deleted, This User Can not Log into the System\',
  icon: \'warning\',
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   location.replace(\'useraccts.php?delete=' . $row['username'] . '\');
  } else {
   
  }
})" class="btn btn-danger" id="delete" name="delete">Delete</a/>  <a  href="useraccts.php?edit=' . $row['username'] . '" class="btn btn-primary"  >Edit</a></td>'
                . '</tr>';
            }
            ?>

        </table>
        
        </div>

    </div> 
  



    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- Uncomment below i you want to use a preloader -->
    <div id="preloader"></div>

    <!-- JavaScript Libraries -->
    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/mobile-nav/mobile-nav.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <!-- Contact Form JavaScript File -->
    <script src="contactform/contactform.js"></script>

    <!-- Template Main Javascript File -->
    <script src="js/main.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#list').DataTable();
        });
    </script>


    <!--     alerts-->
    <?php
    if ($sweetalertadded) {
        echo '<script type="text/javascript">setTimeout(function () { swal("User ' . $sweetalertadded . ' Added Successful!", "New User Creating Successfull", "success");}, 000);</script>';

        $sweetalertadded = '';
    }
    if ($sweetalerupdate) {
        echo '<script type="text/javascript">setTimeout(function () { swal("User ' . $sweetalerupdate . ' Update Successful!", "User Update Successfull", "success");}, 000);</script>';

        $sweetalerupdate = '';
    }
    if ($sweetalerdelete) {
         echo '<script type="text/javascript">setTimeout(function () { swal("User ' . $sweetalerdelete . ' Deleted Successfully!", "User Deleted Successfull", "success");}, 000);</script>';

       $sweetalerdelete = '';
    }
   


    if (isset($_GET['edit'])) {
        echo'<script type="text/javascript">$("#exampleModal").modal("show"); </script>';
    }
    ?>

</body>
</html>