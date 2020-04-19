<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <h3>Enter information about a Course to add to the database:</h3>

    <form action="jdbc_add_course.php" method="post">
        Department Code: <input type="text" name="code"><br>
        Course Number: <input type="text" name="num"><br>
        Course Title: <input type="text" name="title"><br>
        Credit Hours: <input type="text" name="credit"><br>
        <input name="submit" type="submit">
    </form>
    <br>
    <h3>
        <a href="index.html">Return to homepage.</a>
    </h3>

</body>

</html>

<?php
if (isset($_POST['submit'])) {
    //Course: DeptCode, CourseNum, Title, CreditHours
    // replace ' ' with '\ ' in the strings so they are treated as single command line args
    $code = escapeshellarg($_POST[code]);
    $num = escapeshellarg($_POST[num]);
    $title = escapeshellarg($_POST[title]);
    $credit = escapeshellarg($_POST[credit]);

    $command = 'java -cp .:mysql-connector-java-5.1.40-bin.jar jdbc_add_course ' . $code . ' ' . $num . ' ' . $title . ' ' . $credit;

    // remove dangerous characters from command to protect web server
    $command = escapeshellcmd($command);
    echo "<p>command: $command <p>";

    // run
    system($command);
}
?>