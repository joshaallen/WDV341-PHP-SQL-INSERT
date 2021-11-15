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
    .container {
      width: 40%;
      margin: 0 auto;
    }
    h1 {
      text-align: center;
    }
    label, input {
      display: block;
    }
    input[type="submit"], input[type="reset"] {
      display: inline-block;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Event Forms</h1>
    <form action="" method="post">
      <fieldset>
        <legend>Event</legend>
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
      <input type="text" name="eventDate" id="eventDate">
      </div>      
      <div>
      <label for="eventTime">Time:</label>
      <input type="text" name="eventTime" id="eventTime">
      </div>     
      <input type="submit" name="submit" value="submit">
      <input type="reset" name="reset" value="reset"> 
      </fieldset>
     </form>
  </div>
</body>
</html>