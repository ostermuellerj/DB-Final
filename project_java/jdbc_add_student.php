<html>
<body>
<h3>Enter information about a Student to add to the database:</h3>

<form action="jdbc_add_student.php" method="post">
    Name: <input type="text" name="id"><br>
    Type: <input type="text" name="name"><br>
    City: <input type="text" name="major"><br>
    <input name="submit" type="submit" >
</form>
<br><br>

</body>
</html>

<?php
if (isset($_POST['submit'])) 
{
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $id = escapeshellarg($_POST[id]);
    $name = escapeshellarg($_POST[name]);
    $major = escapeshellarg($_POST[major]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar jdbc_add_student ' . $id . ' ' . $name . ' ' . $major;

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";
 
    // run jdbc_insert_restaurant.exe
    system($command);           
}
?>


