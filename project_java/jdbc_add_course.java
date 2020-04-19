import java.sql.*;

//Course: DeptCode, CourseNum, Title, CreditHours
public class jdbc_add_course {
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
      String query1 = "SELECT * from Course";
      builder.append("<br> Table Course before:" + myDB.query(query1) + "<br>");

      // Parse input string to get restauranrestaurant Name and Address
      String code = "STUDENT ID";
      String num = "STUDENT NAME";
      String title = "COURSE TITLE";
      String credit = "CREDIT HOURS";

      // Read command line arguments
      code = args[0];
      num = args[1];
      title = args[2];
      credit = args[3];

      // Insert the new Student
      //String input = "'" + code + "','" + num + "','" + title + "','" + credit + "'";
      String input = code + "," + num + ",'" + title + "'," + credit;
      builder.append("Command Executed: " + input);
      myDB.insert("Course (CourseNum, DeptCode, Title, CreditHours)", input);

      // For debugging purposes: Show the database after the insert
      builder.append("<br><br><br> Table Course after:" + myDB.query(query1));
      System.out.println(builder.toString());

      myDB.disConnect();
   }
}
