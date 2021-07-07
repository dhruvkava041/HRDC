

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Participants Details</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="style4.css">
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

                        $query = "SELECT * FROM `scheduling_event` inner join `batchwise_nomination` on scheduling_event.id=batchwise_nomination.id WHERE `Event Name`='$eventname' AND `Subevent Name`='$subeventname' AND `Event Batch No`='$batchnumber' AND `Event from date`='$date'";
                        $query_run = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($query_run))
                        {
                            ?>
                                <tr>
                                <td><?php $i = 1; $i++; echo $i-1;?></td>
                                
                                    <td><?php echo $row['Name of Participant']?></td>
                                    
                                    
                                    
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
