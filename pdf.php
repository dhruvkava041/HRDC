
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Participants Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style5.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
<style type="text/css">
  .button {
    height: 100%;
	width: 13%;
  padding: 10px 15px;
  text-align: center;
	outline: none;
	color: #fff;
	border :none;
	font-size: 18px;
	font-weight: 500;
	border-radius: 5px;
	letter-spacing: 1px;

	background: linear-gradient(135deg, #17a2b8, #17a2b8);
   
}
</style>

</head>
<body>

<div class="container">
  <div class="title">Participants Details</div>
  <form action="pdfx.php" method="POST">
    
  
  <button  class="button" type="submit" id="pdf" name="btn_pdf" value="create pdf">Create pdf</button>


    <div class="table">
		<table id="tblCustomers" class="table table-bordered  table-striped">
                        <tr>
                            <th>No</th>
                            <th>Name of participant</th>
                            <th>Department</th>
                            <th>Event Name</th>
                            <th>Subevent Name</th>
                            <th>Employee ID</th>
                            <th>Mobile Number</th>
                            <th>Email Id</th>
                            <th>Batch</th>
                            <th>slot</th>
                            <th>Authority</th>
                            <th colspan="2" align="center">action</th>
                        </tr>
                <?php  
                    $conn = mysqli_connect('localhost','root','');
                    $db = mysqli_select_db($conn,'hrdc1');
                    
                    if(isset($_POST['search']))
                    {
                        $batchno = $_POST['batchno'];
                        $participantname = $_POST['participantname'];
                        $employeeid = $_POST['employeeid'];

                        $query = "SELECT * FROM `batchwise_nomination` WHERE `Select Batch`='$batchno' or `Name of Participant`='$participantname' or `Employee ID`='$employeeid'";
                        $query_run = mysqli_query($conn,$query);
                        $i = 0;
                        while($row = mysqli_fetch_array($query_run))
                        {
                            ?>
                                <tr>
                                    <td><?php $i++; echo $i;?></td>
                                    <td><?php echo $row['Name of Participant']?></td>
                                    <td><?php echo $row['Functional Department']?></td>
                                    <td><?php echo $row['Event Name']?></td>
                                    <td><?php echo $row['Subevent Name']?></td>
                                    <td><?php echo $row['Employee ID']?></td>
                                    <td><?php echo $row['Mobile Number']?></td>
                                    <td><?php echo $row['Email Id']?></td>
                                    <td><?php echo $row['Select Batch']?></td>
                                    <td><?php echo $row['Select slot']?></td>
                                    <td><?php echo $row['Report Authority']?></td>
                                    <td><a href = 'update.php?np=$row[`Name of Participant`] & fd=$row[`Functional Department`]&en=$row[`Event Name`]&sen=$row[`Subevent Name`]&ei=$row[`Employee ID`]&mn=$row[`Mobile Number`]&emi=$row[`Email Id`]&sb=$row[`Select Batch`]&ss=$row[`Select slot`]&ra=$row[`Report Authority`]&dd=$row[`Designation`]' >update/edit</a></td>
                                    <td>
                                      <form action="delete.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['Name of Participant']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger">delete</button>
                                      </form>
                                    </td>    
                                </tr>
                            <?php
                        }
                    }
                ?>   
        </table>
		<script>
      function checkdelete()
      {
        return Confirm('Are you sure you want to delete this record');
      }

    </script>
	</div>
	
  </form>
</div> 


</body>
</html>
