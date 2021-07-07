<?php
$conn = mysqli_connect('localhost','root','','hrdc1');
error_reporting(0);

if(isset($_POST['delete_btn']))
{
$participantname=$_POST['delete_id'];
$query= "DELETE from batchwise_nomination where `Name of Participant`='$participantname'";

$data=mysqli_query($conn,$query);

if($data)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: Participants details.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: Participants details.php'); 
    }  
}  
?>