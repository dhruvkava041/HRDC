


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <title>Scheduling Event</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

<div class="container">
  <div class="title">Scheduling Event</div>
  <form action="server.php" method="POST">
    <div class="user-details">
    
      <div class="input-box">
        <span class="details">Event Name</span>
         <input type="text" name="Eventname"  placeholder="Enter the event Name "required> 

      </div>
      

    <div class="subevent">
      <div class="input-box3">
        <span class="details">Enter subevent name</span>
        <input type="text" name="subeventname[]" value="" placeholder="Enter Subevent Name" required>
        <button class="btn add-subeventbtn">Add  </button>
      </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
 
      // allowed maximum input fields
      var max_input = 10;
 
      // initialize the counter for textbox
      var x = 1;
 
      // handle click event on Add More button
      $('.add-subeventbtn').click(function (e) {
        e.preventDefault();
        if (x < max_input) { // validate the condition
          x++; // increment the counter
          $('.subevent').append(`
            <div class="input-box3">
              <span class="details">Enter the subevent Name</span>
              <input type="text" name="subeventname[]" value="" placeholder="Enter subevent Name" required/>
              <a href="#" class="remove-lnk">Remove</a>
            </div>
          `); // add input field
        }
      });
 
      // handle click event of the remove link
      $('.subevent').on("click", ".remove-lnk", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();  // remove input field
        x--; // decrement the counter
      })
 
    });
  </script>
    
    <div class="input-box">
        <span class="details">Maximum Number of attendees</span>
        <input type="Number" name="maximumnumberofattendees"  required> 
      </div>


      

      <div class="batchno">
      <div class="input-box4">
        <span class="details">Event Batch Name</span>
        <input type="text" name="eventbatchno[]" value="" placeholder="Enter the batch name" required> 
        <button class="btn add-batchnobtn">Add  </button>
      </div>
    </div>


<script type="text/javascript">
    $(document).ready(function () {
 
      // allowed maximum input fields
      var max_input = 10;
 
      // initialize the counter for textbox
      var x = 1;
 
      // handle click event on Add More button
      $('.add-batchnobtn').click(function (e) {
        e.preventDefault();
        if (x < max_input) { // validate the condition
          x++; // increment the counter
          $('.batchno').append(`
            <div class="input-box4">
              <span class="details">Event Batch Name</span>
              <input type="text" name="eventbatchno[]" value="" placeholder="Enter the batch name" required/>
              <a href="#" class="remove-lnk">Remove</a>
            </div>
          `); // add input field
        }
      });
 
      // handle click event of the remove link
      $('.batchno').on("click", ".remove-lnk", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();  // remove input field
        x--; // decrement the counter
      })
 
    });
  </script>
    


  <div class="input-box">
        <span class="details">Event Days</span>
        <input type="text" name="eventdays"  required> 
      </div>



       <div class="input-box">
        <span class="details">Event to date</span>
        <input type="date" name="eventtodate" required=>
      </div>

       <div class="input-box">
        <span class="details">Event from date</span>
        <input type="date" name="eventfromdate">
      </div>












    <div class="wrapper">
      <div class="input-box2">
        <span class="details">Enter the expert Name</span>
        <input type="text" name="expertname[]" value="" placeholder="Enter expert Name" required>
        <button class="btn add-btn">Add  </button>
      </div>
</div>
  <script type="text/javascript">
    $(document).ready(function () {
 
      // allowed maximum input fields
      var max_input = 5;
 
      // initialize the counter for textbox
      var x = 1;
 
      // handle click event on Add More button
      $('.add-btn').click(function (e) {
        e.preventDefault();
        if (x < max_input) { // validate the condition
          x++; // increment the counter
          $('.wrapper').append(`
            <div class="input-box2">
              <span class="details">Enter the expert Name</span>
              <input type="text" name="expertname[]" value="" placeholder="Enter expert Name" required/>
              <a href="#" class="remove-lnk">Remove</a>
            </div>
          `); // add input field
        }
      });
 
      // handle click event of the remove link
      $('.wrapper').on("click", ".remove-lnk", function (e) {
        e.preventDefault();
        $(this).parent('div').remove();  // remove input field
        x--; // decrement the counter
      })
 
    });
  </script>
    

      <div class="input-box1">
        <span class="details">Event Details</span>
        <input type="text" name="eventdetails"  required> 
      </div>
    </div>


    <div class="event-type">
      <input type="radio" name="eventtype" value="teaching" id="dot-1">
      <input type="radio" name="eventtype" value="Non-teaching" id="dot-2">
      <input type="radio" name="eventtype" value="All" id="dot-3">

      <span class="event-type-title">Event-type</span>
      <div class="category">
        
        <label for="dot-1">
          <span class="dot one"></span>
          <span class="event-type">teaching</span>
        </label>

        <label for="dot-2">
          <span class="dot two"></span>
          <span class="event-type">Non-teaching</span>
        </label>

        <label for="dot-3">
          <span class="dot three"></span>
          <span class="event-type">All</span>
        </label>

      </div>
    </div>

    <div class="button">
      <input type="submit" name="save" value="Schedule Event">
      <input type="reset" name="save1" value="Reset">
     
   </div>
  </form>
</div>   
      


</body>
</html>