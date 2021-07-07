<?php
if(isset($_POST["save1"]))
{
  header('Location:scheduling_event.php');
} 
?>

<?php

$conn = mysqli_connect('localhost','root','','hrdc1');


if(isset($_POST['save']))
{   
    $EventName =mysqli_real_escape_string($conn, $_POST['Eventname']) ;
    $SubeventName =$_POST['subeventname'];
    $MaximumNumberofattendance = $_POST['maximumnumberofattendees'];
    $EventDays = $_POST['eventdays'];
    $EventBatchNo =$_POST['eventbatchno'];
    $Eventtodate =mysqli_real_escape_string($conn, $_POST['eventtodate']);
    $Eventfromdate =mysqli_real_escape_string($conn, $_POST['eventfromdate']);
    $ExpertName =$_POST['expertname'];
    $EventDetails =mysqli_real_escape_string($conn, $_POST['eventdetails']);
    $Eventtype = $_POST['eventtype'];
    
	
    foreach($SubeventName as $index => $names)
    {
      $s_SubeventName = $names;
      $s_ExpertName = $ExpertName[$index];
      $s_EventBatchNo = $EventBatchNo[$index];
    
      $query = "INSERT INTO scheduling_event(`id`,`Event Name`,`Subevent Name`,`Maximum Number of attendees`,`Event Days`,`Event Batch No`,`Event to date`,`Event from date`,`Enter the expert Name`,`Event Details` , `Event-type`) VALUES('0','$EventName','$s_SubeventName','$MaximumNumberofattendance','$EventDays','$s_EventBatchNo','$Eventtodate','$Eventfromdate','$s_ExpertName','$EventDetails','$Eventtype')";
    
      $query_run = mysqli_query($conn,$query);

    }
    
    if($query_run)
    {
      header('refresh:0.5; url=scheduling_event.php');
      echo "<script>alert('Event Created...')</script>";
      
      
    }
      else{
      echo "nottttttttttttttttttttttttttttttttt";
    }
}
