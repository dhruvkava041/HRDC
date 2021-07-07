<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Batchwise Nomination</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
  <div class="title">Batchwise Nomination</div>
  <form action="" method="POST">
    <div class="user-details">
      
   
       <div class="input-box">
        <span class="details">Event Name</span>
        <?php
        $mysqli = NEW MySQLi('localhost','root','','hrdc1');

        $resultSet = $mysqli->query("SELECT DISTINCT `Event Name` from scheduling_event ");
        ?>
        <select name="eventname">
        <option value="">--- Select ---</option>
            <?php
                while($rows = $resultSet->fetch_assoc())
                {
                    $eventname = $rows['Event Name'];
                    echo "<option value='$eventname'>$eventname</option>";
                }
            ?>
        </select>
      </div>


      <div class="input-box">
        <span class="details">Subevent Name</span>
        <?php
        $mysqli = NEW MySQLi('localhost','root','','hrdc1');

        $resultSet = $mysqli->query("SELECT DISTINCT `Subevent Name`,`Event Name` from scheduling_event");
        ?>
        <select name="subeventname">
        <option value="">--- Select ---</option>
            <?php
                while($rows = $resultSet->fetch_assoc())
                {
                    $subeventname = $rows['Subevent Name'];
                    $eventname = $rows['Event Name'];
                    echo "<option value='$subeventname'>$subeventname [ Event : $eventname ]</option>";
                }
            ?>
        </select>
      </div>

       <div class="input-box">
        <span class="details">Employee ID</span>
        <input type="text" name="employeeid" placeholder="Enter your Id" required> 
      </div>

       <div class="input-box">
        <span class="details">Name of Participant</span>
        <input type="text" name="nameofparticipant" placeholder="Enter your Name" required> 
      </div>  


      <div class="input-box">
        <span class="details">Functional Department</span>
        <select name="functionaldepartment">  
        <option value="">--- Select ---</option>  
          <option value="CSPIT-CE">CSPIT-CE</option>  
          <option value="CSPIT-IT">CSPIT-IT</option>  
          <option value="CSPIT-EC">CSPIT-EC</option>  
          <option value="CSPIT-EE">CSPIT-EE</option>  
          <option value="CSPIT-CL">CSPIT-CL</option>  
          <option value="CSPIT-ME">CSPIT-ME</option>
          <option value="DEPSTAR-CE">DEPSTAR-CE</option>
          <option value="DEPSTAR-CSE">DEPSTAR-CSE</option>
          <option value="DEPSTAR-IT">DEPSTAR-IT</option>  
        </select>
      </div>
    
     
       
       <div class="input-box">
        <span class="details">Designation</span>
       <input type="text" name="designation" placeholder="Enter Designation" required> 
      </div>
      
      
      

       <div class="input-box">
        <span class="details">Mobile Number</span>
        <input type="Number" name="mobilenumber" placeholder="Enter your Mobile Number" required> 
      </div>
      
             <div class="input-box">
        <span class="details">Email Id</span>
        <input type="Email" name="emailid" placeholder="Enter event Email Id" required> 
      </div>
      

       <div class="input-box">
        <span class="details">Select Batch</span>  
        <?php
        $mysqli = NEW MySQLi('localhost','root','','hrdc1');

        $resultSet = $mysqli->query("SELECT DISTINCT `Event Batch No` from scheduling_event");
        ?>
        <select name="selectbatch">
        <option value="">--- Select ---</option>
            <?php
                while($rows = $resultSet->fetch_assoc())
                {
                    $selectbatch = $rows['Event Batch No'];
                    echo "<option value='$selectbatch'>$selectbatch</option>";
                }
            ?>
        </select>
      </div>

      <div class="input-box">
        <span class="details">Select slot</span>
        <select name="selectslot"> 
        <option value="">--- Select ---</option> 
          <option value="Course">Morning</option>  
          <option value="BCA">Afternoon</option>   
        </select>
      </div>

 <div class="input-box">
        <span class="details">Report Authority</span>
        <select name="reportauthority">  
        <option value="">--- Select ---</option>  
          <option value="Dr.ritesh patel">Dr.ritesh patel</option>  
          <option value="Dr.Parth Shah">Dr.Parth Shah</option>  
          <option value="Dr.Trushit Upadhyay">Dr.Trushit Upadhyay</option>  
        </select>
      </div>

    </div>


    <div class="button">
      <input type="submit" name="save" value="save">
      <input type="submit" name="save" value="Register">
     
   </div>
  </form>
</div>   
      


</body>
</html>

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