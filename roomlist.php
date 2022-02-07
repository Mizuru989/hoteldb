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
  width: 75%;
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

$servername = "localhost";
$username = "ChrisBear";
$password = "bear123";
$dbname = "hoteldb";

//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check connection 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully, ";

$sql = "SELECT RoomID, Room_Type, Max_Capacity, Bed_Type, Price FROM room_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
//output data for each row
echo "<img src='Ocean.png' class='oceanblue' alt='imageerror'>";
echo "<div class='title'>EZ HOTEL</div>";
echo '<div class="main-data" style="width: 100%; background-color: white; height: calc(90vh - 50px);margin-top: calc(10vh + 50px);display: flex; justify-content:center;align-items:center;flex-direction:column;padding-bottom: 100px;">';
echo '<h1 style="text-align:center; font-size:250%;margin-bottom: 50px;">Room List</h1>';
echo '<div class="container" style="width: 100%;">';
echo '<table class="center">';
echo "<tr><th>Room ID</th>
<th>Room Type</th>
<th>Max Capacity</th>
<th>Bed Type</th>
<th>Price</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["RoomID"]. " </td>
        <td>" . $row["Room_Type"]. " </td>
        <td>" . $row["Max_Capacity"]. " </td>
        <td>" . $row["Bed_Type"]. " </td>
        <td>" . $row["Price"]. " </td></tr>";
    }
echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
