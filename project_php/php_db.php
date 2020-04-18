<?php
// A class that contains useful php functions that interact with mysql

class php_db 
{
   // the instance variables
   private $conn;
   private $host;
   private $user;
   private $password;
   private $dbaseName;
   private $debug;
   private $status_fatal;
     
   function __construct($username,$pass,$dbname) 
   {
      $this->conn = false;
      $this->host = 'turing';               //hostname
      $this->user = $username;           //your username
      $this->password = $pass  ;  //your password 
      $this->dbaseName = $dbname;      // schema
      $this->port = '3306';
      $this->debug = true;
      $this->connect();
   }
     
   function __destruct() 
   {
      $this->disconnect();
   }
    
   function connect() 
   {
      if (!$this->conn) 
      {
         try 
         {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbaseName.'', 
                                  $this->user, $this->password, 
                                  array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  
         }
         catch (Exception $e) 
         {
            die('Error : ' . $e->getMessage());
         }
     
         if (!$this->conn) 
         {
            $this->status_fatal = true;
            echo 'Connection BD failed';
            die();
         } 
         else 
         {
            $this->status_fatal = false;
         }
      }
      return $this->conn;
   }
     
   function disconnect() 
   {
      if ($this->conn) 
      {
         $this->conn = null;
      }
   }
    
   function query($query) 
   {
   $result = $this->conn->prepare($query);
   $ret = $result->execute();

      if (!$ret) 
      {
         echo 'PDO::errorInfo():';
         echo '<br />';
         echo "error SQL: $query";
         die();
      }
      $result->setFetchMode(PDO::FETCH_ASSOC);
      $reponse = $result->fetchAll();
    
      return $reponse;
   }
    
   function execute($query) 
   {
      if (!$response = $this->conn->exec($query)) 
      {
         echo 'PDO::errorInfo():';
         echo '<br />';
         echo 'error SQL: '.$query;
         die();
      }
      return $response;
   }

   function initDatabase()
   {
      try 
      {
         $result = $this->query('DELETE FROM FoodOrder');
         $result = $this->query('DELETE FROM MenuItem');
         $result = $this->query('DELETE FROM Dish');
         $result = $this->query('DELETE FROM Restaurant');
    
         $result = $this->insert("Restaurant" , "(restaurantID, restaurantName, type, city)", "0, 'Tasty Thai', 'Asian', 'Dallas'");
		 $result = $this->insert("Restaurant" , "(restaurantID, restaurantName, type, city)", "3, 'Eureka Pizza', 'Pizza', 'Fayetteville'");
		 $result = $this->insert("Restaurant" , "(restaurantID, restaurantName, type, city)", "5, 'Tasty Thai', 'Asian', 'Las Vegas'");
		 
         $result = $this->insert("Dish", "(dishNo, dishName, type)", "13, 'Spring Roll', 'ap'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "15, 'Pad Thai', 'en'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "16, 'Pad Sticker', 'ap'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "22, 'Masaman Curry', 'en'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "10, 'Custard', 'ds'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "12, 'Garlic Bread', 'ap'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "44, 'Salad', 'ap'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "07, 'Cheese Pizza', 'en'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "19, 'Pepperoni Pizza', 'en'");
		 $result = $this->insert("Dish", "(dishNo, dishName, type)", "77, 'Vegi Supreme Pizza', 'en'");
		 
         $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "0, 0, 13, 8.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "1, 0, 16, 9.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "2, 0, 44, 10.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "3, 0, 15, 19.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "4, 0, 22, 19.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "5, 3, 44, 6.25");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "6, 3, 12, 5.50");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "7, 3, 7, 12.50");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "8, 3, 19, 13.50");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "9, 5, 13, 6.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "10, 5, 15,15.00");
		 $result = $this->insert("MenuItem", "(itemNo, restaurantNo, dishNo, price)", "11, 5, 22, 14.00");
		 
         $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "0,2,STR_TO_DATE('2017-03-01', '%Y-%m-%d'), '10:30'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "1,0,STR_TO_DATE('2017-03-02', '%Y-%m-%d'), '15:33'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "2,3,STR_TO_DATE('2017-03-01', '%Y-%m-%d'), '15:35'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "3,5,STR_TO_DATE('2017-03-03', '%Y-%m-%d'), '21:00'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "4,7,STR_TO_DATE('2017-03-01', '%Y-%m-%d'), '18:11'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "5,7,STR_TO_DATE('2017-03-04', '%Y-%m-%d'), '18:51'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "6,9,STR_TO_DATE('2017-03-01', '%Y-%m-%d'), '19:00'");
		 $result = $this->insert("FoodOrder", "(orderNo, itemNo, date, time)", "7,11,STR_TO_DATE('2017-03-05', '%Y-%m-%d'), '17:15'");
		 
      }     
      catch (Exception $e) 
      {
         die('Error : ' . $e->getMessage());
      }
   }

   function insert($table, $fields, $values)
   {
      $result = $this->query("INSERT INTO " . $table . " " . $fields. " VALUES (" . $values . ")");
   }

   function printTable($arrValues)
   {
      try
      {
		 echo '<table>';

         // Output header row from keys.
         echo '<tr>';
         foreach($arrValues[0] as $key => $field) 
            echo '<th>' . $key . '</th>';
         echo '</tr>';

         // Output data rows from keys.
         foreach ($arrValues as $row) 
         {
            echo '<tr>';
            foreach($row as $key => $field) 
               echo '<td>' . $field . '</td>';
            echo '</tr>';
         }
         echo '</table>';
      }
      catch (Exception $e) 
      {
         die('Error : ' . $e->getMessage());
      }
   }
}
