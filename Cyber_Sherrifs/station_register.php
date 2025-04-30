<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "web";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $station_id = $_POST['full_name'];
    $station_pincode = $_POST['station_pincode'];
    $contact_number = $_POST['contact_number'];

    $sql = "INSERT INTO station_register (station_id, pincode, contact) 
            VALUES ('$station_id', '$station_pincode', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        echo "Station registered successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Station Register</title>
  <link rel="icon" href="karnatakapolicelogo copy.jpg">
  <style>
      body {
        font-family: sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .header-logo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: contain;
        margin-bottom: 20px;
        background-color: #f0f0f0;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

    form {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 400px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="number"]{
        width: calc(100% - 12px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    button[type="submit"] {
        background-color: #4c96af;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        width: 100%;
    }

    button[type="submit"]:hover {
        background-color: #3b7d8e;
        box-shadow: 0 3px 7px rgba(0,0,0,0.3);
    }

    button[type="submit"]:active {
        background-color: #2c5e6b;
        box-shadow: 0 1px 2px rgba(0,0,0,0.2);
    }

    p {
        margin-top: 15px;
        font-size: 14px;
        color: #666;
        text-align: center;
    }

    a {
        color: #4c96af;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    </style>
</head>
<link rel="stylesheet" href="styles.css">
<body>
  <img src="karnatakapolicelogo copy.jpg" alt="logo" class="header-logo">

<h1>Station Register</h1>

<form action="station_register.php" method="POST">
  <label>Station ID:</label><br>
  <input type="text" name="full_name" placeholder="Enter the station ID" required><br><br>

  <label>Pincode:</label><br>
  <input type="number" name="station_pincode" placeholder="Enter pincode" required><br><br>

  <label>Contact:</label><br>
  <input type="number" name="contact_number" placeholder="Enter contact Number" required><br><br>

  
  <button type="submit">Register</button>
</form>

<p>Already have an account? <a href="login.html">Login Here</a></p>

</body>
</html>
