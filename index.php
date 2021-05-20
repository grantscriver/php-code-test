<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
  <body>
  <h3>
  <?php echo file_get_contents("assets/logo.svg"); ?>
  
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bios";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
   echo "<br>"."<br>"."Name: " . $row["name"]. "<br>"."   Title: " . $row["title"].  "<br>"."<br>";
    if ($row["photo"] <> "") {
    $image = $row["photo"];
    $imageData = base64_encode(file_get_contents($image));
    echo '<img src="data:image/jpeg;base64,'.$imageData.'" height = "283" width = "250" alt = "Image resize">';
    }
    else {
      echo "< photo not available >";
    }
  }
} else {
  echo "0 results";
}
$conn->close();
?>
  </body>
</h3>
</html>
