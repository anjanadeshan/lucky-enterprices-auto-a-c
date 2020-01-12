
<?php require_once('db.php'); ?>
<?php require_once('Functions.php'); ?>
<?php
$sweetalertadded = '';
$sweetalerupdate = '';
$sweetalerdelete='';
$update = false;
$jobupdate = false;
$f_name = '';
$l_name = '';
$uname = '';
$utype = '';
$pword = '';

$customer_name = '';
$address ='';
$phone_number = '';
$NIC ='';
$vehicle_number = '';
$vehicle_model = '';
$brand ='';
$vehicle_color ='';
$type = '';
$datetime ='';
$description = '';
$remarks = '';
$status = '';

if (isset($_GET['edit'])) {



    $update = true;
    $query = "SELECT * FROM users WHERE username =";
    $query .= "'{$_GET['edit']}'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $f_name = $row['fname'];
        $l_name = $row['lname'];
        $uname = $row['username'];
        $utype = $row['user_type'];
        $pword = $row['password'];

//   echo '<script>setTimeout(function () { location.replace("http://localhost/ostiwebpro/useraccts.php");}, 5000);</script>' ;
    } else {
        $errors[] = 'Failed to Update the  record.';
        echo 'FAIL';
        echo $query;
    }
    
}
if (isset($_GET['jobedit'])) {



    $jobupdate = true;
    $query = "SELECT * FROM job_details WHERE job_id =";
    $query .= "'{$_GET['jobedit']}'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_array($result);
        $customer_name = $row['customer_name'];
        $address = $row['address'];
        $phone_number =  $row['phone_no'];
        $NIC = $row['nic_no'];
        $vehicle_number =  $row['vehicle_no'];
        $vehicle_model =  $row['vehicle_model'];
        $brand = $row['vehicle_brand'];
        $vehicle_color = $row['colour'];
        $type =  $row['type'];
        $datetime = $row['bill_date'];
        $description =  $row['Description'];
        $remarks =  $row['Remarks'];
        $status =  $row['job_Status'];
            
//   echo '<script>setTimeout(function () { location.replace("http://localhost/ostiwebpro/useraccts.php");}, 5000);</script>' ;
    } else {
        $errors[] = 'Failed to Update the  record.';
        echo 'FAIL';
        echo $query;
    }
    
}