import java.sql.*;

//Student: StudentId, StudentName, Major
public class jdbc_student_courses {
    // The main program that inserts a restaurant
    public static void main(String[] args) throws SQLException {
        String Username = "gbglenn"; // Change to your own username
        String mysqlPassword = "EiGaix8o"; // Change to your own mysql Password

        // Connect to the database
        jdbc_db myDB = new jdbc_db();
        myDB.connect(Username, mysqlPassword);
        myDB.initDatabase();

        // For debugging purposes: Show the database before the insert
        StringBuilder builder = new StringBuilder();

        // Parse input string to get restauranrestaurant Name and Address
        String id = "STUDENT ID";

        // Read command line arguments
        id = args[0];

        // For debugging purposes: Show the database after the insert
        // String query1 = "SELECT * FROM Enrollment WHERE StudentId=" + id;
        //SELECT * FROM Enrollment INNER JOIN Course ON Enrollment.CourseNum = Course.CourseNum WHERE StudentId=1;
        String query1 = "SELECT Course.CourseId, Course.CourseNum, Course.DeptCode, Course.Title, Course.CreditHours FROM Enrollment INNER JOIN Course ON Enrollment.CourseNum = Course.CourseNum WHERE StudentId=" + id;

        System.out.println(query1);
        builder.append("<br><br><br> Courses for student" + id + "after:" + myDB.query(query1));
        System.out.println(builder.toString());

        myDB.disConnect();
    }
}
