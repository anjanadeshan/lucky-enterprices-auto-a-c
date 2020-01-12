<?php session_start(); ?>
<?php require_once('db.php'); ?>
<?php require_once('Functions.php'); ?>
<?php require_once('process.php'); ?>
<?php
if (!isset($_SESSION['user_id'])) {
   header('Location: login.php');
}
?>


<?php
$count= '';
$first_name = '';
$last_name = '';
$username = '';
$usertype = '';
$password = '';




if (isset($_POST['save'])) {

    $customer_name = $_POST['cname'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $NIC = $_POST['NIC'];
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_model = $_POST['Model'];
    $brand = $_POST['brand'];
    $vehicle_color = $_POST['vehicle_color'];
    $type = $_POST['vehicle_type'];
    $datetime = $_POST['datetime'];
    $description = $_POST['description'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];
    $user =$_SESSION['user_id'];

    if (empty($errors)) {
        // no errors found... adding new record
        // $username = mysqli_real_escape_string($conn, $_POST['username']);

        // $password = mysqli_real_escape_string($conn, $_POST['password']);
        // email address is already sanitized
        //$hashed_password = sha1($password);


        $query = "INSERT INTO job_details ( ";
        $query .= "customer_name, address,phone_no,  nic_no , vehicle_no,vehicle_model, vehicle_brand,colour,type,Description,Remarks,bill_date,user,job_Status ";
        $query .= ") VALUES (";
        $query .= "'{$customer_name}', '{$address}', '{$phone_number}', '{$NIC}', '{$vehicle_number}', '{$vehicle_model}', '{$brand}', '{$vehicle_color}', '{$type}', '{$description}', '{$remarks}', '{$datetime}', '{$user}', '{$status}'";
        $query .= ")";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page

            $sweetalertadded = $customer_name;
        } else {
            $errors[] = 'Failed to add the new record.';
            echo $errors[0];
            $errors[0] = '';
        }
    }
}
if (isset($_POST['update'])) {

   
    $customer_name = $_POST['cname'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $NIC = $_POST['NIC'];
    $vehicle_number = $_POST['vehicle_number'];
    $vehicle_model = $_POST['Model'];
    $brand = $_POST['brand'];
    $vehicle_color = $_POST['vehicle_color'];
    $type = $_POST['vehicle_type'];
    $datetime = $_POST['datetime'];
    $description = $_POST['description'];
    $remarks = $_POST['remarks'];
    $status = $_POST['status'];
    $user =$_SESSION['user_id'];
    if (empty($errors)) {
        // no errors found... adding new record
      
        // email address is already sanitized
        //$hashed_password = sha1($password);
//        $query = "INSERT INTO users ( ";
//        $query .= "fname, lname,username,  password , user_type";
//        $query .= ") VALUES (";
//        $query .= "'{$first_name}', '{$last_name}', '{$username}', '{$password}', '{$usertype}'";
//        $query .= ")";

        $query = "UPDATE `job_details` SET `customer_name`='{$customer_name}',`address`='{$address}',`phone_no`='{$phone_number}',`nic_no`='{$NIC}',`vehicle_no`='{$vehicle_number}',`vehicle_model`='{$vehicle_model}',`vehicle_brand`='{$brand}',`colour`='{$vehicle_color}',`type`='{$type}',`Description`='{$description}',`Remarks`='{$remarks}',`job_Status`='{$status}' WHERE job_id=";
        $query .= "'{$_GET['jobedit']}'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            // query successful... redirecting to users page
            $sweetalerupdate = $_GET['jobedit'];
            unset($_GET['jobedit']);
            unset($_POST['update']);
            $update = false;
          
            // echo '<script>location.replace("http://localhost/ostiwebpro/useraccts.php");</script>';
        } else {
            $errors[] = 'Failed to add the new record.';
            echo $errors[0];
            $errors[0] = '';
        }
    }
}

 if (isset($_GET['delete'])) {




        $query = "DELETE FROM job_details WHERE job_id =";
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

        <script>
                                     function add() {
 
                                       var now = new Date();
                                       var today = now.toDateString(now);
                                       var time = now.toLocaleTimeString(now);
                                       var hours = now.getHours();
                                       var minutes = now.getMinutes();
                                       var seconds = now.getSeconds();
                                       var miliSeconds = now.getMilliseconds();
                                       var newSeconds = seconds + ( miliSeconds / 1000 );
                                       document.getElementById('datetime').value = today+"|"+hours+':'+minutes+':'+seconds;

                                      };
                                     
                                      
                                       </script>

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

        <title>Job List</title>


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
          (' <li class="nav-item active">
             <a class="nav-link" href="joblist.php">
               <i class="fa fa-reorder">
                 
               </i>
               Job List
             </a>
           </li>')
           ;
           if ($_SESSION['user_type']==='Admin' ){
            echo
            (' <li class="nav-item">
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
    $query = "SELECT * FROM job_details";
    $jobs = mysqli_query($conn, $query);
    ?>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container">

    <div class="row">
         <div class="col-md-9 order-md-2">
           <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary"  onclick="add()" id="addjob" data-toggle="modal" data-target="#exampleModal">
            Add User
        </button>
         </div>
         <div class="col-md-3 order-md-1 mb-4">
          <!-- <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Your cart</span>
            <span class="badge badge-secondary badge-pill">3</span>
          </h4> -->
          <ul class="list-group mb-3">
            <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
              <div>
                <h6 class="my-0 text-success">Delivered Jobs</h6>
                <small class="text-success">100% Completed</small>
              </div>
              <span class="text-success">
              <?php 
                 $query = "SELECT COUNT(*) FROM job_details WHERE job_Status='PAID-JOB DONE'";
                $count = mysqli_query($conn, $query);
                if ($count) {
                   $row= mysqli_fetch_array($count);
                   echo $row['COUNT(*)'];
                } else {
                    echo 'FAIL count';
                }
              ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
              <div>
                <h6 class="my-0 text-primary">Repaire Completed Jobs</h6>
                <small class="text-primary">Ready To Deliver</small>
              </div>
              <span class="text-primary">
              <?php 
                 $query = "SELECT COUNT(*) FROM job_details WHERE job_Status='FIXED-REPAIRED'";
                $count = mysqli_query($conn, $query);
                if ($count) {
                   $row= mysqli_fetch_array($count);
                   echo $row['COUNT(*)'];
                } else {
                    echo 'FAIL count';
                }
              ?>
              </span>
            </li>
            <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
              <div>
                <h6 class="my-0 text-danger">Ongoing Repaires </h6>
                <small class="text-danger">Not Completed</small>
              </div>
              <span class="text-danger">
              <?php 
                 $query = "SELECT COUNT(*) FROM job_details WHERE job_Status='INPROGRESS'";
                $count = mysqli_query($conn, $query);
                if ($count) {
                   $row= mysqli_fetch_array($count);
                   echo $row['COUNT(*)'];
                } else {
                    echo 'FAIL count';
                }
              ?>
              </span>
            </li>
           
            <li class="list-group-item d-flex justify-content-between">
              <span>Total Jobs</span>
              <strong>
              <?php 
                 $query = "SELECT count(*)
                FROM job_details";
                $count = mysqli_query($conn, $query);
                if ($count) {
                   $row= mysqli_fetch_array($count);
                   echo $row['count(*)'];
                } else {
                    echo 'FAIL count';
                }
              ?>
              </strong>
            </li>
          </ul>
        </div>
         
         </div>           
      
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content"> <form method="post">
                        <div class="modal-header">

                            <?php if ($update == true): ?>
                                <h5 class="modal-title" id="exampleModalLabel">Edit/Update</h5>
                            <?php else: ?>
                                <h5 class="modal-title font-weight-bold" id="exampleModalLabel">Add New Job</h5>
                            <?php endif; ?>

                            <button type="button" class="close icoclose" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        
                        <div class="modal-body">
                        <h5 class=" mb-3 pt-2 pl-0" id="">Customer Details</h5>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Customer Name</label>
                                    <input type="text" name="cname" class="form-control" id="firstName" placeholder="" value="<?php echo $customer_name ?>"s required="">
                                    <div class="invalid-feedback">
                                        Valid first name is required.
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="firstName">Address</label>
                                    <input type="text" name="address" class="form-control" id="firstName" placeholder="" value="<?php echo $address ?>"s required="">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" id="firstName" placeholder="" value="<?php echo $phone_number ?>"s required="">
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">NIC</label>
                                    <input type="text" name="NIC" class="form-control" id="firstName" placeholder="" value="<?php echo $NIC ?>"s required="">
                                    
                                </div>
                            </div>
                        <hr>
                            <h5 class=" mb-3 pt-2 pl-0 " id="">Vehical Details</h5>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Vehicle Number</label>
                                    <input type="text" name="vehicle_number" class="form-control" id="firstName" placeholder="" value="<?php echo $vehicle_number ?>"s required="">
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Model</label>
                                    <input type="text" name="Model" class="form-control" id="firstName" placeholder="" value="<?php echo $vehicle_model ?>"s required="">
                                    
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                                    <label for="country">Brand</label>
                                    <select class="custom-select d-block w-100"  value="<?php echo $brand ?>" name="brand" id="Brand" required>
                                    <option value="">Choose...</option>
                                 
                                    <option value="Toyota"<?=$brand == 'Toyota' ? ' selected="selected"' : '';?>>Toyota</option>
                                    <option value="Honda"<?=$brand == 'Honda' ? ' selected="selected"' : '';?>>Honda</option>
                                    <option value="Suzuki"<?=$brand == 'Suzuki' ? ' selected="selected"' : '';?>>Suzuki</option>
                                    <option value="Merzedies"<?=$brand == 'Merzedies' ? ' selected="selected"' : '';?>>Merzedies</option>
                                    <option value="Audi"<?=$brand == 'Audi' ? ' selected="selected"' : '';?>>Audi</option>
                                    <option value="Mazda"<?=$brand == 'Mazda' ? ' selected="selected"' : '';?>>Mazda</option>
                                    <option value="Micro"<?=$brand == 'Micro' ? ' selected="selected"' : '';?>>Micro</option>
                                    <option value="Cherry"<?=$brand == 'Cherry' ? ' selected="selected"' : '';?>>Cherry</option>
                                    <option value="Ford"<?=$brand == 'Ford' ? ' selected="selected"' : '';?>>Ford</option>
                                    <option value="Volvo"<?=$brand == 'Volvo' ? ' selected="selected"' : '';?>>Volvo</option>
                                    <option value="Nissan"<?=$brand == 'Nissan' ? ' selected="selected"' : '';?>>Nissan</option>
                                    <option value="Kia"<?=$brand == 'Kia' ? ' selected="selected"' : '';?>>Kia</option>
                                    <option value="BMW"<?=$brand == 'BMW' ? ' selected="selected"' : '';?>>BMW</option>
                                    <option value="Mitsubishi"<?=$brand == 'Mitsubishi' ? ' selected="selected"' : '';?>>Mitsubishi</option>
                                    <option value="Other"<?=$brand == 'Other' ? ' selected="selected"' : '';?>>Other</option>
                                    </select>
                                    
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Vehicle Color</label>
                                    <input type="text" name="vehicle_color" class="form-control" id="Color" placeholder="" value="<?php echo $vehicle_color ?>" required="">
                                    
                                </div>
                            </div>
                            <div class="row">
                                 <div class="col-md-6 mb-3">
                                    <label for="country">Vehicle Type</label>
                                    <select class="custom-select d-block w-100" id="vehicle_type"  value="<?php echo $type ?>" name="vehicle_type" required>
                                    <option value="">Choose...</option>
                                    <!-- <option>Car</option> -->
                             
                                    <option value="Van"<?=$type == 'Van' ? ' selected="selected"' : '';?>>Van</option>
                                    <option value="SUV"<?=$type == 'SUV' ? ' selected="selected"' : '';?>>SUV</option>
                                     <option value="Cab"<?=$type == 'Cab' ? ' selected="selected"' : '';?>>Cab</option>
                                     <option value="Bus"<?=$type == 'Bus' ? ' selected="selected"' : '';?>>Bus</option>
                                    <option value="Lorry"<?=$type == 'Lorry' ? ' selected="selected"' : '';?>>Lorry</option>
                                    <option value="Car"<?=$type == 'Car' ? ' selected="selected"' : '';?>>Car</option>
                                    <option value="Other"<?=$type == 'Other' ? ' selected="selected"' : '';?>>Other</option>
                                
                                  
                                    </select>
                                    
                                    </div>
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">Date / Time</label>
                                  
                                    <input type="text" readonly name="datetime" class="form-control" id="datetime" placeholder="" value="<?php echo $datetime ?>" required="">
                                    
                                </div>
                            </div>
                          
                            <h5 class=" mb-3 pt-2 pl-0 " id="">Company Notes</h5>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName">Description</label>
                                        <textarea  rows="3" name="description" class="form-control" id="firstName" placeholder="" required=""> <?php echo $description ?>
                                        </textarea> 
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="Remarks">Remarks </label>
                                        <textarea rows="3" name="remarks" class="form-control" id="Remarks" placeholder=""  required=""> <?php echo $remarks ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row">
                                   
                                    <div class="col-md-6 mb-3">
                                      
                                        <label for="firstName">Job Status</label>
                                        <select class="custom-select d-block w-100" name="status" value="<?php echo $status ?>"  id="type" required>
                                            <option value="">Choose...</option>
                                          
                                            <option value="INPROGRESS"<?=$status == 'INPROGRESS' ? ' selected="selected"' : '';?>>INPROGRESS</option>
                                            <option value="FIXED-REPAIRED"<?=$status == 'FIXED-REPAIRED' ? ' selected="selected"' : '';?>>FIXED-REPAIRED</option>
                                            <option value="PAID-JOB DONE"<?=$status == 'PAID-JOB DONE' ? ' selected="selected"' : '';?>>PAID-JOB DONE</option>
                                         </select>
                                    </div>
                                </div>
                            

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <?php if ($jobupdate == true): ?>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <?php else: ?>
                                <button type="submit" name="save" class="btn btn-primary">Save Job</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle" align="center" id="list">
            <thead>
            <th class="text-center align-content-center"> #ID</th>
            <th class="text-center align-content-center">Customer Name</th>
            <th class="text-center align-content-center">Phone Number</th>
            <th class="text-center align-content-center">Vehicle Number</th>
            <th class="text-center align-content-center">Job Status</th>
            <th class="text-center align-content-center ">Actions</th>
            </thead>
            <?php
            while ($row = mysqli_fetch_array($jobs)) {

              echo'<tr ><td class="align-middle">' . $row['job_id'] . ' </td><td class="align-middle">' . $row['customer_name'] . '</td>'
              . '<td class="align-middle">' . $row['phone_no'] . '</td>'
              . '<td class="align-middle">' . $row['vehicle_no'] . '</td>'
              . '<td class="align-middle text-center align-content-center '.(($row['job_Status']==='FIXED-REPAIRED')?'text-primary ':" ").(($row['job_Status']==='PAID-JOB DONE')?'text-success ':" ").(($row['job_Status']==='INPROGRESS')?'text-danger ':" ").'">' . $row['job_Status'] . '</td>'
              . '<td class="align-middle"><a  onclick="swal({
  title: \'Are you sure? Delete Job  ' . $row['job_id'] . ' \',
  text: \'Once deleted, This Will can not  Recovered \',
  icon: \'warning\',
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
   location.replace(\'joblist.php?delete=' . $row['job_id'] . '\');
  } else {
   
  }
})" class="btn btn-danger" id="delete" name="delete">Delete</a/>  <a  href="joblist.php?jobedit=' . $row['job_id'] . '" class="btn btn-primary"  >Edit</a></td>'
                . '</tr>';
            }
            ?>

        </table>
      

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
            $('#list').DataTable({
                "columnDefs": [
    { "orderable": false, "targets": 5 }
  ]
            });
        });
    </script>


    <!--     alerts-->
    <?php
    if ($sweetalertadded) {
        echo '<script type="text/javascript">setTimeout(function () { swal("User ' . $sweetalertadded . ' Added Successful!", "New User Creating Successfull", "success");}, 000);</script>';

        $sweetalertadded = '';
    }
    if ($sweetalerupdate) {
        echo '<script type="text/javascript">setTimeout(function () { swal("Job : ' . $sweetalerupdate . ' Update Successful!", "Job Update Successfull", "success");}, 000);</script>';

        $sweetalerupdate = '';
    }
    if ($sweetalerdelete) {
         echo '<script type="text/javascript">setTimeout(function () { swal("User ' . $sweetalerdelete . ' Deleted Successfully!", "User Deleted Successfull", "success");}, 000);</script>';

       $sweetalerdelete = '';
    }
   


    if (isset($_GET['jobedit'])) {
        echo'<script type="text/javascript">$("#exampleModal").modal("show"); </script>';
    }
    ?>

</body>
</html>