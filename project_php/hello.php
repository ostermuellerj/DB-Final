<html>
   <body>
      <h3>Enter your name: </h3>

      <form action="hello.php" method="post">
         Name: <input type="text" name="name"><br>
         <input name="submit" type="submit" >
      </form>
      <br><br>
   </body>
</html>

<?php
   
   function hello ($name)
   {
      echo "Hello again $name<br>";
   }

   // an example of calling a function that is defined in the same file
   // This is the if statement for what to do after submit is pushed
   if (isset($_POST['submit'])) 
   {
      $name = $_POST[name];
      hello($name);
   }
?>
