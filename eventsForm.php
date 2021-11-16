<?php
//Setting up data model
$eventName= "" ;
$eventDescription= "";
$eventPresenter= "";
$eventDate="";
$eventTime="";
//Form Flag
$validForm = false;
//End of Response Object Flag
$endOfResposeObject = false;
//Selection block to determine if form has been submitted
if(isset($_POST["submit"])) {
  //The form has been submitted and needs to be processed
  if(!isset($_POST["eventInfo"]) || $_POST["eventInfo"] == false) {
  //Get the name value pairs from the $_POST variable into PHP variables
  $eventName = trim($_POST["eventName"]);
  $eventDescription = trim($_POST["eventDescription"]);
  $eventPresenter= trim($_POST["eventPresenter"]);
  $eventDate= $_POST["eventDate"];
  $eventTime= $_POST["eventTime"];
  //Form Flag
  $validForm= true;
  //Validate the form data here!
  if(empty($eventName)) {
      $validForm= false;
      $errorEventNameMsg= "Please supply an event name";
  }
  if(empty($eventDescription)) {
    $validForm= false;
    $errorEventDescriptionMsg= "Please supply an event description";
  }
  if(empty($eventPresenter)) {
    $validForm= false;
    $errorEventPresenterMsg= "Please supply an event presenter";
  }
  if(empty($eventDate)) {
    $validForm= false;
    $errorEventDateMsg= "Please supply an event date";
  }
  if(empty($eventTime)) {
    $validForm= false;
    $errorEventTimeMsg= "Please supply an event time";
  }
  else {
        //concataniting seconds onto eventTime value in prep for inserting into database
        $eventTime .= ":00";
   }
  //Determine if form has error messages 
  if($validForm) {
    try {
      /*is identical to require except PHP will check if the file has already been included, and if so , not require it again
               */
      require_once('connection.php');
      require_once('event.php');
      //instaniating new Event object to hold user data
      $eventObject = new Event();
      $eventObject->set_eventName("$eventName");
      $eventObject->set_eventPresenter("$eventPresenter");
      $eventObject->set_eventDate("$eventDate");
      $eventObject->set_eventTime("$eventTime");
      $eventObject->set_eventDescription("$eventDescription");
      //entering sanitzed values into php vairables 
      $name = $eventObject->get_eventName();
      $time = $eventObject->get_eventTime();
      $presenter = $eventObject->get_eventPresenter();
      $date = $eventObject->get_eventDate();
      $description = $eventObject->get_eventDescription();
      //PHP object assigned to an instance of the connection class
      $connection = new Connection();
      //open connection 
      $conn = $connection->open();
      //SQL query that "
      $sql = "INSERT INTO wdv341_events (";
      $sql .= "name, ";
      $sql .= "description, ";
      $sql .= "presenter, ";
      $sql .= "date, ";
      $sql .= "time "; //Last column does NOT have a comma after it.
      $sql .= ") VALUES (:name, :description, :presenter, :date, :time)";
      //PREPARE the SQL statement
      $stmt = $conn->prepare($sql);
      //Bind the statement
      $stmt->bindParam(':name',$name);
      $stmt->bindParam(':description', $description);
      $stmt->bindParam(':presenter', $presenter);
      $stmt->bindParam(':date', $date);
      $stmt->bindParam(':time', $time);
      //EXECUTE the prepared statement
      $stmt->execute();
      //capturing the number of row that were inserted
      $count = $stmt->rowCount();
      //capture id of last row inserted
      $lastInsertID = $conn->lastInsertId();
       //close connection
      $conn = $connection->close(); 
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
  }//enf of if block for form control validation and query
  }//end of if block for honey pot validation
  // Entering block for honeypot field submission
  else {
    /**storing ip address of visitor. will need away to transport the data with ip adddress
          **/
     $ip = getenv("REMOTE_ADDR");
      header("Location: form-handler-homework-honeyPot.php?ip=" . $ip);
  }
}
?><!--end of IF SUBMIT BLOCK -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" content="PHP, Self-Posting Form, Web Forms, PDO, SQL, Databases">
  <meta name="description" content="This is a self posting form that accepts users inputs for an event and redirects to a confirmation page">
  <meta name="author" content="Joshua Allen">
  <title>SQL INSERT</title>
  <style>
    body {
      background-color: #cccccc;
    }
    .container {
      width: 40%;
      margin: 0 auto;
    }
    h1 {
      text-align: center;
      margin-bottom: 100px;
    }
    label, input {
      display: block;
    }
    input[type="submit"], input[type="reset"] {
      display: inline-block;
    }
    #form_1 {
      background-color: #a5a5a5;
    }
    #form_1 div:nth-of-type(1) {
            display: none;
        }
  </style>
</head>
<body>
  <div class="container">
    <h1>Event Forms</h1>
    <?php 
    /**
    * testing if form is valid so submission with data errors won't step into this branch
    * 
    * testing $count to ensure that the insert query was successful 
    */
    if($validForm) {
      if($count>0) {
        $endOfResposeObject = true;
    ?>
    <!-- 
      This HTML block will only be visible with a valid form and a successful insert query
    -->
    <div>
      <h2>Submission Successful!</h2>
      <p>Thank you for submitting your info.</p>
      <p>The id of the last record you inserted is:<?php echo $lastInsertID; ?> </p>
    </div>
    <?php
      }
      else {
        $endOfResposeObject = true;
    ?>
    <!-- 
      This HTML block will only be visible with a valid form and an unsuccessful insert query
    -->
    <div>
      <h2>Uh Oh!</h2>
      <p>There was a problem.</p>
      <p>Please click <a href="eventsForm.php">Here!!!</a> to attempt form again</p>
    </div>
    <?php
      }
    }
    if(!$endOfResposeObject) {
    ?>
      <form action="eventsForm.php" method="post" id="form_1">
      <fieldset>
        <legend>Event</legend>
      <!--Honey Pot-->
      <div>
        <label for="eventInfo">Event Info: </label>
        <input type="text" name="eventInfo" id="eventInfo" size=25>
      </div>
      <div>
      <label for="eventName">Name:</label>
      <input type="text" name="eventName" id="eventName">
      </div>
      <div>
      <label for="eventDescription">Description:</label>
      <input type="text" name="eventDescription" id="eventDescription">
      </div>
      <div>
      <label for="eventPresenter">Presenter:</label>
      <input type="text" name="eventPresenter" id="eventPresenter">
      </div>
      <div>
      <label for="eventDate">Date:</label>
      <input type="date" name="eventDate" id="eventDate">
      </div>      
      <div>
      <label for="eventTime">Time:</label>
      <input type="time" name="eventTime" id="eventTime">
      </div>     
      <input type="submit" name="submit" value="submit">
      <input type="reset" name="reset" value="reset"> 
      </fieldset>
     </form>
      <!--
        This is a honeypot javascript redudancy for the CSS embedded style rule
     -->
    <script>
        document.querySelector("#form_1 div:nth-child(1)").style.display = "none";
    </scirpt>
  </div>
  <?php 
    }
  ?>
</body>
</html>