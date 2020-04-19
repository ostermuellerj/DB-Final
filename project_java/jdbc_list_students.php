<html>

<body>
    <h3>Enter information about a Student to add to the database:</h3>

    <form action="jdbc_list_students.php" method="post">
        Click to show all students <input name="submit" type="submit">
    </form>
    <br><br>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    // replace ' ' with '\ ' in the strings so they are treated as single command line args

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar jdbc_list_students ';

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";

    // run jdbc_insert_restaurant.exe
    system($command);
}
?>