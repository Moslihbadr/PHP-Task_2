<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyDatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}else {
  // Insert new user
  $email = "Youssef@example.com";
  $password = "mypassword";
  $firstName = "Youssef";
  $lastName = "Foukahi";

  $sql = "INSERT INTO users (email, password, firstName, lastName) VALUES ('$email', '$password', '$firstName', '$lastName')";
  
  if (mysqli_query($conn, $sql)) {
    echo "New user created successfully<br>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  // Retrieve all users
  $sql2 = "SELECT * FROM users";
  $result = mysqli_query($conn, $sql2);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "Email: " . $row["email"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
    }
  } else {
    echo "0 results";
  }

  mysqli_close($conn);

  }
?>
