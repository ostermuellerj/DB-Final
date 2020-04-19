<html>

<body>
    <h3>Enter information about a Course to add to the database:</h3>

    <form action="jdbc_add_course.php" method="post">
        DeptCode: <input type="text" name="code"><br>
        CourseNum: <input type="text" name="num"><br>
        Type: <input type="text" name="title"><br>
        City: <input type="text" name="credit"><br>
        <input name="submit" type="submit">
    </form>
    <br><br>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    //Course: DeptCode, CourseNum, Title, CreditHours
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $code = escapeshellarg($_POST[id]);
    $num = escapeshellarg($_POST[name]);
    $title = escapeshellarg($_POST[major]);
    $credit = escapeshellarg($_POST[credit]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar jdbc_add_course ' . $code . ' ' . $num . ' ' . $title . ' ' . $credit;

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";

    // run
    system($command);
}
?>