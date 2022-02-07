<head>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
 .title{
  position: absolute;
  top: 0%;
  left: 0;
  width: 100%;
  display: flex;
  justify-content: center;
  font-size: 50px;
  background-color: transparent;
  padding: 2.5% 0%;
  color: aliceblue;
  overflow-y: hidden;
 }
 .oceanblue {
  position: absolute;
  z-index: -1;
  inset: 0;
  width: 100%;
  height: 100%;
  /* overflow-y: hidden; */
}
table {
  font-family: arial, sans-serif;
  font-size: 125%;
  border-collapse: collapse;
  width: 95%;
}
th{
  background-color:rgb(38, 69, 90);
  color: white;
}
td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: rgb(194, 220, 238);
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}

</style>
</head>

<?php
$full_name=$_POST['full_name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$gender=$_POST['gender'];
$credcard=$_POST['creditcard'];
$checkinDate=$_POST['checkinDate'];
$checkoutDate=$_POST['checkoutDate'];
$RoomID=$_POST['RoomID'];
$servername = "localhost";
$username = "ChrisBear";
$password = "bear123";
$dbname = "hoteldb";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection 
if ($conn->connect_error) {
    die("Connection failed");
    //die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully, ";

$sql = "SELECT RoomID, Checkin_Date, Checkout_Date FROM booking_info WHERE (('$checkinDate' BETWEEN Checkin_Date AND Checkout_Date) OR ('$checkoutDate' BETWEEN Checkin_Date AND Checkout_Date)) AND (RoomID = $RoomID)";
//echo $sql;
$result = $conn->query($sql);
//echo $result->num_rows;
if ($result->num_rows == 0) {
  $sql = "INSERT INTO user_info(Full_Name, Phone, Email, Gender, Credit_Card) VALUES ('$full_name', '$phone', '$email', '$gender', '$credcard')";

  if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;
      //echo "Registration Successful. Last inserted ID is: " . $last_id;
  } else {
      echo "<h1 style='text-align:center; font-size:250%;'>Error 404</h1>";
      //echo "Error: " . sql . "<br>" . $conn->error;
  }
  
  $sql2 = "INSERT INTO booking_info VALUES ('$last_id', '$checkinDate', '$checkoutDate', '$RoomID')";
  
  if ($conn->query($sql2) === TRUE) {
    //echo "<br>Room Reserved";
  } else {
    //echo "Error: " . sql . "<br>" . $conn->error;
    echo "<h1 style='text-align:center; font-size:250%;'>Error 404</h1>";
  }
  
  $sql = "SELECT Full_Name, Phone, Email, Gender, Credit_Card, Checkin_Date, Checkout_Date, RoomID, Room_Type, Price FROM user_info 
          JOIN booking_info Using(UID) 
          JOIN room_info Using(RoomID) WHERE UID = $last_id";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
      //output data for each row
  echo "<img src='Ocean.png' class='oceanblue' alt='imageerror'>";
  echo "<div class='title'>EZ HOTEL</div>";
  echo '<div class="main-data" style="width: 100%; background-color: white; height: calc(90vh - 50px);margin-top: calc(10vh + 50px);display: flex; justify-content:center;align-items:center;flex-direction:column;padding-bottom: 100px;">';
  echo "<h1 style='text-align:center; font-size:250%; color:green;'>Room Reserved</h1><br><br>";
  echo "<h1 style='text-align:center; font-size:2rem;'>Your Reservation Detail</h1><br>";
  echo "<table class='center'>";
  echo "<tr><th>Full Name</th>
  <th>Phone</th>
  <th>Email</th>
  <th>Gender</th>
  <th>Credit Card</th>
  <th>Checkin Date</th>
  <th>Checkout Date</th>
  <th>Room Number</th>
  <th>Room Type</th>
  <th>Price</th></tr>";
      while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["Full_Name"]. " </td>
          <td>" . $row["Phone"]. " </td>
          <td>" . $row["Email"]. " </td>
          <td>" . $row["Gender"]. " </td>
          <td>" . $row["Credit_Card"]. " </td>
          <td>" . $row["Checkin_Date"]. " </td>
          <td>" . $row["Checkout_Date"]. " </td>
          <td>" . $row["RoomID"]. " </td>
          <td>" . $row["Room_Type"]. " </td>
          <td>" . $row["Price"]. " </td></tr>";
      }
  echo "</table>";
  } else {
      echo "<h1 style='text-align:center; font-size:250%;'>0 Results</h1>";
  }
}
else {
  echo "<h1 style='text-align:center; font-size:40px; color:#FF1717; margin-top:50px;'>Reservation Failed, Room Occupied At That Date</h1>";
}
$conn->close();
?>