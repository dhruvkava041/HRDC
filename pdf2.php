

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Participants Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style6.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   
<style type="text/css">
  .button {
    height: 100%;
	width: 20%;
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
  <div class="title">Event Details</div>
  <form action="" method="POST">
    
   

  <button class="button" type="button" id="btnExport" name="btnExport" value="create pdf">Create pdf</button>



    <div class="table">
		<table id="tblCustomers" class="table table-bordered  table-striped">
                        <tr>
                        <th>No</th>
                        <th>Event Name</th>
                        <th>Subevent Name</th>
                        <th>Event to date</th>
                        <th>Event from date</th>
                        <th>Number of attendees</th>
                        <th>Event Days</th>
                        <th>Batch </th>
                        <th>Expert Name</th>
                        <th>Event type</th>
                        <th>action</th>
                        </tr>
                <?php  
                    $conn = mysqli_connect('localhost','root','');
                    $db = mysqli_select_db($conn,'hrdc1');
                    
                    if(isset($_POST['search']))
                    {
                        $eventname = $_POST['eventname'];
                        $subeventname = $_POST['subeventname'];
                        $expertname = $_POST['expertname'];

                        $query = "SELECT * FROM `scheduling_event` WHERE `Event Name`='$eventname' or `Subevent Name`='$subeventname' or `Enter the expert Name`='$expertname'";
                        $query_run = mysqli_query($conn,$query);
                        $i = 0;
                        while($row = mysqli_fetch_array($query_run))
                        {
                            ?>
                                <tr>
                                <td><?php $i++; echo $i;?></td>
                                    <td><?php echo $row['Event Name']?></td>
                                    <td><?php echo $row['Subevent Name']?></td>
                                    <td><?php echo $row['Event to date']?></td>
                                    <td><?php echo $row['Event from date']?></td>
                                    <td><?php echo $row['Maximum Number of attendees']?></td>
                                    <td><?php echo $row['Event Days']?></td>
                                    <td><?php echo $row['Event Batch No']?></td>
                                    <td><?php echo $row['Enter the expert Name']?></td>
                                    <td><?php echo $row['Event-type']?></td>
                                    
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


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script type="text/javascript">
        $("body").on("click", "#btnExport", function () {
            html2canvas($('#tblCustomers')[0], {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("pdffile.pdf");
                }
            });
        });
    </script>

</body>
</html>
