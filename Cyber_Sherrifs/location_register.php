<?php
// Database connection details
$host = 'localhost';  // MySQL host
$dbname = 'WEB';      // Database name
$username = 'root';   // MySQL username
$password = '';       // MySQL password (empty string in your case)

// Create a connection to MySQL using PDO
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $state = $_POST['state'];
    $district = $_POST['district'];
    $station_name = $_POST['station_id'];
    $officer_id = $_POST['officer_id'];
    $station_id = $_POST['station_id'];

    // Check if the officer_id exists in the officers table
    $officerCheckQuery = "SELECT officer_id FROM officers WHERE officer_id = :officer_id";
    $stmt = $conn->prepare($officerCheckQuery);
    $stmt->bindParam(':officer_id', $officer_id);
    $stmt->execute();

    // If officer_id doesn't exist, show an error message
    if ($stmt->rowCount() == 0) {
        echo "Error: Officer ID does not exist in the officers table.";
    } else {
        // SQL query to insert data into the location_register table
        $sql = "INSERT INTO location_register (state, district, station_name, officer_id, station_id) 
                VALUES (:state, :district, :station_name, :officer_id, :station_id)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to prevent SQL injection
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':district', $district);
        $stmt->bindParam(':station_name', $station_name);
        $stmt->bindParam(':officer_id', $officer_id);
        $stmt->bindParam(':station_id', $station_id);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo "Record inserted successfully!";
        } else {
            echo "Error: Unable to insert record.";
        }
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Location Register</title>
    <link rel="stylesheet" href="styles.css">
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
        select {
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

    </style>
    <script>
        
        const stationsByDistrict = {
            "Bengaluru Urban": [
                "Majestic Police Station", "Jayanagar Police Station", "Indiranagar Police Station",
                "Malleswaram Police Station", "Koramangala Police Station", "Shivajinagar Police Station",
                "Rajajinagar Police Station", "Yelahanka Police Station", "Whitefield Police Station",
                "Electronic City Police Station", "Banashankari Police Station", "Vijayanagar Police Station",
                "Basavanagudi Police Station"
            ],
            "Mysuru": ["Mysuru South Police Station", "Mysuru North Police Station"],
            "Mangaluru": ["Mangaluru City Police"],
            "Hubballi": ["Hubballi West Police Station"],
            "Dharwad": ["Dharwad Central Police"],
            "Udupi": ["Udupi District Police"],
            "Belagavi": ["Belagavi City Police"],
            "Tumakuru": ["Tumakuru City Police", "Tumkur South Police Station", "Tiptur Police Station"],
            "Davangere": ["Davangere Police Station"],
            "Chikkamagaluru": ["Chikkamagaluru Police Station"],
            "Hassan": ["Hassan Central Police", "Channarayapatna Police Station", "Shravanabelagola Police Station"],
            "Ballari": ["Ballari District Police", "Hospet Town Police"],
            "Kalaburagi": ["Kalaburagi City Police"],
            "Raichur": ["Raichur Police Station"],
            "Bagalkot": ["Bagalkot Police Station"],
            "Bidar": ["Bidar Police Station"],
            "Kolar": ["Kolar District Police"],
            "Mandya": ["Mandya Police Station"],
            "Ramanagara": ["Ramanagara Police Station"],
            "Chitradurga": ["Chitradurga Police Station"],
            "Gadag": ["Gadag Town Police"],
            "Haveri": ["Haveri Police Station"],
            "Sagar": ["Sagar Police Station"],
            "Sirsi": ["Sirsi Town Police"],
            "Puttur": ["Puttur Town Police"],
            "Madikeri": ["Madikeri Police Station"],
            "Karwar": ["Karwar District Police"],
            "Vijayapura": ["Vijayapura City Police"],
            "Dandeli": ["Dandeli Police Station"],
             "Kundapura" : ["Kundapura Police Station"],
             "Gokarna" : ["Gokarna Police Station"],
             "Chikkaballapur" : ["Chikkaballapur Police Station"]

        };

        function populateStations() {
            const districtSelect = document.getElementById("district");
            const stationSelect = document.getElementById("station_id");
            const selectedDistrict = districtSelect.value;

            
            stationSelect.innerHTML = '<option value="">Select Station</option>';

            if (stationsByDistrict[selectedDistrict]) {
                stationsByDistrict[selectedDistrict].forEach(stationName => {
                    let option = document.createElement("option");
                    option.value = stationName;
                    option.textContent = stationName;
                    stationSelect.appendChild(option);
                });
                stationSelect.disabled = false; 
            } else {
                stationSelect.disabled = true; 
            }
        }
    </script>
</head>
<body>
    <img src="karnatakapolicelogo copy.jpg" alt="logo" class="header-logo">

<h1>Location Register</h1>

<form action="location_register.php" method="POST">
    
    <label>State:</label><br>
    <select name="state" required>
        <option value="">Select State</option>
        <option value="Karnataka">Karnataka</option>
    </select><br><br>

    <label>District:</label><br>
    <select id="district" name="district" required onchange="populateStations()">
        <option value="">Select District</option>
        <option value="Bagalkot">Bagalkot</option>
        <option value="Ballari">Ballari</option>
        <option value="Belagavi">Belagavi</option>
        <option value="Bengaluru Rural">Bengaluru Rural</option>
        <option value="Bengaluru Urban">Bengaluru Urban</option>
        <option value="Bidar">Bidar</option>
        <option value="Chamarajanagar">Chamarajanagar</option>
        <option value="Chikballapur">Chikballapur</option>
        <option value="Chikkamagaluru">Chikkamagaluru</option>
        <option value="Chitradurga">Chitradurga</option>
        <option value="Dakshina Kannada">Dakshina Kannada</option>
        <option value="Davanagere">Davanagere</option>
        <option value="Dharwad">Dharwad</option>
        <option value="Gadag">Gadag</option>
        <option value="Hassan">Hassan</option>
        <option value="Haveri">Haveri</option>
        <option value="Kalaburagi">Kalaburagi</option>
        <option value="Kodagu">Kodagu</option>
        <option value="Kolar">Kolar</option>
        <option value="Koppal">Koppal</option>
        <option value="Mandya">Mandya</option>
        <option value="Mysuru">Mysuru</option>
        <option value="Raichur">Raichur</option>
        <option value="Ramanagara">Ramanagara</option>
        <option value="Shivamogga">Shivamogga</option>
        <option value="Tumakuru">Tumakuru</option>
        <option value="Udupi">Udupi</option>
        <option value="Uttara Kannada">Uttara Kannada</option>
        <option value="Vijayapura">Vijayapura</option>
        <option value="Yadgir">Yadgir</option>
    </select><br><br>

    <label>Station Name:</label><br>
    <select id="station_id" name="station_id" required disabled>
        <option value="">Select Station</option>
    </select><br><br>

    <label>Officer ID:</label><br>
    <input type="text" name="officer_id" placeholder="Enter officer ID" required><br><br>


    <label>Station ID:</label><br>
    <input type="text" name="officer_id" placeholder="Enter station ID" required><br><br>

    
    <button type="submit">Register</button>
</form>

</body>
</html>
