<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Attendence Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<div class="container">
  <div class="title">Attendence Details</div>
  <form action="pdf3.php" method="POST">
    <p>
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
                    echo "<option value='$subeventname'>$subeventname </option>";
                }
            ?>
        </select>
      </div>
	  
      <div class="input-box">
        <span class="details">Batch Number</span>
        <input type="text" name="batchnumber" placeholder="Enter Batch Number" required> 
      </div>
      
	  <div class="input-box">
        <span class="details">Date</span>
        <input type="date" name="date" required=>
      </div>
	  
	</div>
	
    <div class="button">
      <input type="submit" name="search" value="search">
        <input type="submit" name="" value="SAVE">
      <input type="button" name="" value="SUBMIT">
    </div>
   
    <div class="table">
		<table id="tblCustomers" class="table table-bordered  table-striped">
                        <tr>
                            <th>No</th>
                            <th>Name of Participants</th>
                            <th>date 1</th>
                            <th>date 2</th>
                        </tr>
                        <?php  
                    $conn = mysqli_connect('localhost','root','');
                    $db = mysqli_select_db($conn,'hrdc1');
                    
                    if(isset($_POST['search']))
                    {
                        $eventname = $_POST['eventname'];
                        $subeventname = $_POST['subeventname'];
                        $batchnumber = $_POST['batchnumber'];
                        $date = $_POST['date'];

                        $query = "SELECT * FROM `scheduling_event` WHERE `Event Name`='$eventname' AND `Subevent Name`='$subeventname' AND `Event Batch No`='$batchnumber' AND `Event from date`or`Event to date`='$date'";
                        $query_run = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($query_run))
                        {
                            ?>
                                <tr>
                                    <td><?php $i = 1; $i++; echo $i-1;?></td>
                                    <td><?php echo $row['Event Name']?></td>
                                    <td><?php echo $row['Event from date']?></td>
                                    <td><?php echo $row['Event to date']?></td>
                                    <td><?php ?></td>
                                </tr>
                            <?php
                        }
                    }
                ?>   
                    </table>
	</div>
	
	</p>
  </form>
</div>   
    
	


</body>
</html>