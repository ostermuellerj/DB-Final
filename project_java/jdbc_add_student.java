import java.sql.*;

/*
jdbc_insert_restaurant.java    // java program that is called by php that just does the insert; calls jdbc_db.java to connect and do the actual insert
jdbc_db.java // class (no main program) that has useful methods
*/


//Student: StudentId, StudentName, Major
public class jdbc_add_student{
   // The main program that inserts a restaurant
   public static void main(String[] args) throws SQLException 
   {
   String Username = "gbglenn";              // Change to your own username
   String mysqlPassword = "EiGaix8o";    // Change to your own mysql Password

      // Connect to the database
      jdbc_db myDB = new jdbc_db();
      myDB.connect(Username, mysqlPassword);
      myDB.initDatabase();				    

      // For debugging purposes:  Show the database before the insert
      StringBuilder builder = new StringBuilder();
      String query1 = "SELECT * from Student";
      builder.append("<br> Table Student before:" + myDB.query(query1) + "<br>");       

      // Parse input string to get restauranrestaurant Name and Address
      String id = "STUDENT ID";
      String name = "STUDENT NAME";
      String major = "STUDENT MAJOR";

      // Read command line arguments
      // args[0] is the first parameter
      id = args[0];
      name = args[1];
      major = args[2];

      // Insert the new Student
      String input = "'" + id + "','" + name + "','" + major + "'";
      builder.append("Command Executed: " + input);               
      myDB.insert("Student", input);    // insert new restaurant

      // For debugging purposes:  Show the database after the insert
      builder.append("<br><br><br> Table Student after:" + myDB.query(query1));
      System.out.println(builder.toString());     

      myDB.disConnect();
   }
}
