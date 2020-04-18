<html>
   <body>
      <h3>Enter information about a restaurant to add to the database:</h3>

      <form action="php_insert_restaurant.php" method="post">
         Name: <input type="text" name="name"><br>
         Type: <input type="text" name="type"><br>
         City: <input type="text" name="city"><br>
         <input name="submit" type="submit" >
      </form>
      <br><br>
   </body>
</html>

<?php
   include('php_db.php'); // include database class

   // replace ' ' with '\ ' in the strings so they are treated as single command line a
    	
    $name = $_POST[name];
    $type = $_POST[type];
    $city = $_POST[city];
	
	if (isset($_POST['submit'])) 
	{
	  $myDb = new php_db('MYUSERNAME','MYMYSQLPASSWORD','MYUSERNAME'); // create a new object, class php_db()

      //initialize database
      $myDb->initDatabase();
      
      // show Restaurant data before inserting a record
      $Restaurant = $myDb->query('SELECT restaurantID, restaurantName, type, city FROM Restaurant'); 
      echo '<br>Table Restaurant before:';
	  $myDb->printTable($Restaurant);
      
      //Insert a record into table 
      $values = '4, \'' . $name . '\', \'' . $type . '\', \''. $city . '\' ';
	  $fields = '(restaurantID, restaurantName, type, city)';
      $myDb->insert('Restaurant', $fields, $values);
      
      // show Restaurant data after inserting a record
      $Restaurant = $myDb->query('SELECT restaurantID, restaurantName, type, city FROM Restaurant'); // select ALL from Restaurant
	  echo '<br>Table Restaurant after:';
	  $myDb->printTable($Restaurant);
	  
	}  
?>
