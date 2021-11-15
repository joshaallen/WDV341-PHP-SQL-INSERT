# **Unit-12 SQL INSERT**

## 12-1: Create a form page for the events

**Create a web page called eventsForm.php and make it a self-posting form. It will do the following:**

1. It will display a form that can be used to input the information for an event.
2. Make sure your form contains fields for all DB columns.
    * name, description, presenter, date and time
    * The date_inserted and date_updated should also have the current date filled when the record is inserted.
3. The action attribute of your form will call a php file that will insert data into your database.
4. Include at least one form protection technique such as honeypot, Captcha, reCaptcha, etc.

Use PHP, PDO and SQL to process the form data into your database. 

1. It will connect to your wdv341 database using a db-connect.php file.
2. It will access the wdv341_event table that we've used throughout the course.
3. Use a PDO Prepared Statement to process a SQL INSERT command to insert the form data into your table. 

When you are finished, the form should accept the input, and when submitted it should send the data to the server to be inserted into the database.  If successful, a confirmation message will be displayed to the user.

Please post your files to your Git repo.  Remember to 'ignore' your db-connect.php file as you should not store these files on your public repo. 

No need to include any screenshots. I will be testing your form on your homework page as well as looking at your code.


