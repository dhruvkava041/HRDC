<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Event Details</title>
  <meta charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
  <div class="title">Event Details</div>
  <form action="pdf2.php" method="POST">
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



	<div class="wrapper">
      <div class="input-box2">
        <span class="details">Enter the expert Name</span>
        <input type="text" name="expertname" placeholder="Enter expert Name" >
      </div>
</div>
  	
    </div>
	
    <div class="button">
      <input type="submit" name="search" value="search">
       <input type="button" name="" value="Show Rows">
    </div>

    


   
   
    
    
	</p>
  </form>
</div>   
    
</body>
</html>