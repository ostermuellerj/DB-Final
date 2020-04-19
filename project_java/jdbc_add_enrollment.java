import java.sql.*;

//Course: DeptCode, CourseNum, Title, CreditHours
public class jdbc_add_enrollment {
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
      String query1 = "SELECT * from Enrollment";
      builder.append("<br> Table Enrollment before:" + myDB.query(query1) + "<br>");

      // Parse input string to get Enrollment id, name, and num
      String id = "ENROLLMENT STUD ID";
      String code = "ENROLLMENT DEPTCODE";
      String num = "ENROLLMENT COURSE NUMBER";

      // Read command line arguments
      id = args[0];
      code = args[1];
      num = args[2];

      // Insert the new Student
      String input = "'" + id + "','" + code + "','" + num + "'";
      builder.append("Command Executed: " + input);
      myDB.insert("Enrollment", input);

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table Enrollment after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}
