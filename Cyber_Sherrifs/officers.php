<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "web"; // your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Only run when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $officer_id = $_POST['officer_id'];
    $station_id = $_POST['station_id'];
    $officer_name = $_POST['officer_name'];
    $badge_number = $_POST['badge_number'];
    $rank = $_POST['rank'];
    $department = $_POST['unit'];  // corrected: 'unit' instead of 'department'
    $contact_number = $_POST['contact_number'];
    $email_id = $_POST['email_id'];

    // Always validate station_id exists before inserting
    $check_station = "SELECT * FROM station_register WHERE station_id = '$station_id'";
    $result = $conn->query($check_station);

    if ($result->num_rows > 0) {
        // Now insert into officers
        $sql = "INSERT INTO officers (officer_id, station_id, officer_name, badge_number, rank, department, contact, email_id) 
                VALUES ('$officer_id', '$station_id', '$officer_name', '$badge_number', '$rank', '$department', '$contact_number', '$email_id')";

        if ($conn->query($sql) === TRUE) {
            echo "New Officer added successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Station ID does not exist in station_register. Please enter a valid station_id.";
    }
}

$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles.css">
  <meta charset="UTF-8">
  <title>Add Officer</title>
  <link rel="icon" href="karnatakapolicelogo copy.jpg">
  <style>
      body {
        font-family: sans-serif;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: flex-start;
        padding-top: 20px;
    }

    .header-logo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: contain;
        margin-bottom: 20px;
        background-color: #f0f0f0;
    }

    h2 {
        color: #333;
        margin-bottom: 20px;
        text-align: center;
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
    input[type="number"],
    input[type="email"],
    select {
        width: calc(100% - 12px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 20px;
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

    </style>
</head>
<body>
  <img src="karnatakapolicelogo copy.jpg" alt="logo" class="header-logo">

  <h2>Add New Officer</h2>

  <form action="officers.php" method="POST">

    <label>Officer ID:</label><br>
    <input type="text" name="officer_id" placeholder="Enter unique Officer ID" required><br><br>

    <label>Station ID:</label><br>
    <input type="text" name="station_id" placeholder="Enter unique station ID" required><br><br>

    <label>Officer Name:</label><br>
    <input type="text" name="officer_name" placeholder="Enter full Officer Name" required><br><br>

    <label>Badge Number:</label><br>
    <input type="text" name="badge_number" placeholder="Enter Badge Number" required><br><br>

    <label>Rank:</label><br>
    <input type="text" name="rank" placeholder="Enter Rank (e.g., Constable, Sub-inspector..)" required><br><br>

    <label>Department:</label><br>
    <select name="unit" required>
      <option value="">Select Department</option>
      <option value="Administration">Administration</option>
      <option value="Patrol">Patrol</option>
      <option value="Investigative Services">Investigative Services</option>
      <option value="Support Services">Support Services</option>
      <option value="Traffic Police">Traffic Police</option>
      <option value="Cybercrime Unit">Cybercrime Unit</option>
      <option value="Security Detail/VIP Security">Security Detail/VIP Security</option>
      <option value="K-9 Unit">K-9 Unit</option>
      <option value="Mounted Police">Mounted Police</option>
      <option value="Crime Scene Investigation (CSI)">Crime Scene Investigation (CSI)</option>
      <option value="School Resource Officers (SROs)">School Resource Officers (SROs)</option>
      <option value="Victim Advocate">Victim Advocate</option>
      <option value="Public Information Officer (PIO)">Public Information Officer (PIO)</option>
      <option value="Criminal Investigation Department (CID)">Criminal Investigation Department (CID)</option>
      <option value="Economic Offences Wing (EOW)">Economic Offences Wing (EOW)</option>
      <option value="Government Railway Police (GRP)">Government Railway Police (GRP)</option>
      <option value="Anti-Corruption Organization">Anti-Corruption Organization</option>
      <option value="State Armed Police Forces">State Armed Police Forces</option>
      <option value="Central Armed Police Forces (CAPF)">Central Armed Police Forces (CAPF)</option>
      <option value="Central Bureau of Investigation (CBI)">Central Bureau of Investigation (CBI)</option>
      <option value="National Investigation Agency (NIA)">National Investigation Agency (NIA)</option>
      <option value="Intelligence Bureau (IB)">Intelligence Bureau (IB)</option>
    </select><br><br>

    <label>Contact:</label><br>
    <input type="number" name="contact_number" placeholder="Enter contact number" required><br><br>

    <label>Email ID:</label><br>
    <input type="email" name="email_id" placeholder="Enter email ID" required><br><br>

    <button type="submit">Add Officer</button>

  </form>

</body>
</html>
