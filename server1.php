<?php

$conn = mysqli_connect('localhost','root','','hrdc1');


if(isset($_POST['save']))
{   
    $eventname =mysqli_real_escape_string($conn, $_POST['eventname']) ;
    $subeventname =mysqli_real_escape_string($conn, $_POST['subeventname']);
    $employeeid = $_POST['employeeid'];
    $nameofparticipant = $_POST['nameofparticipant'];
    $functionaldepartment =mysqli_real_escape_string($conn, $_POST['functionaldepartment']);
    $designation =mysqli_real_escape_string($conn, $_POST['designation']);
    $mobilenumber =mysqli_real_escape_string($conn, $_POST['mobilenumber']);
    $emailid =$_POST['emailid'];
    $selectbatch =mysqli_real_escape_string($conn, $_POST['selectbatch']);
    $selectslot = $_POST['selectslot'];
	  $reportauthority = $_POST['reportauthority'];
    
    $query = "INSERT INTO `batchwise_nomination`(`id`,`Event Name`,`Subevent Name`,`Employee ID`,`Name of Participant`,`Functional Department`,`Designation`,`Mobile Number`,`Email Id`,`Select Batch` , `Select slot`, `Report Authority`) VALUES('0','$eventname','$subeventname','$employeeid','$nameofparticipant','$functionaldepartment','$designation','$mobilenumber','$emailid','$selectbatch','$selectslot','$reportauthority')";
    
    $query_run = mysqli_query($conn,$query);
    
    if($query_run)
    {
      echo "<script>alert('Event Created...')</script>";
    }
      else{
      echo "nottttttttttttttttttttttttttttttttt";
    }
}