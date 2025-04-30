<?php
// Database connection parameters
$servername = "localhost"; // Your server name (e.g., localhost)
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (leave empty if none)
$dbname = "web"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $fir_id = $_POST['fir_id'];
    $complaint_given_by = $_POST['complaint_given_by'];
    $crime_id = $_POST['crime_id'];
    $crime_type = $_POST['crime_type'];
    $case_status = $_POST['case_status'];
    $no_of_casualties = $_POST['no_of_casualties'];
    $deceased = $_POST['deceased'];
    $suspects = $_POST['suspects'];
    $complaint_in_brief = $_POST['complaint_in_brief'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO crime_reporting (firid, complaint_name, crime_id, crime_type, crime_status, no_of_casualties, deceased, suspects, complaint_in_brief) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisiiiss", $fir_id, $complaint_given_by, $crime_id, $crime_type, $case_status, $no_of_casualties, $deceased, $suspects, $complaint_in_brief);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Crime report successfully submitted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crime Reporting Form</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="karnatakapolicelogo copy.jpg">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding-top: 30px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            margin-top: 30px;
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        h2 {
            color: #1d3557;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        form {
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #1d3557;
            font-size: 1.1em;
        }

        label span {
            color: #e63946;
            animation: blink 1s infinite alternate;
        }

        @keyframes blink {
            from { opacity: 1; }
            to { opacity: 0.5; }
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 25px;
            border: 2px solid #457b9d;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {
            border-color: #1d3557;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 64, 107, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .submit-button {
            background-color: #1d3557;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .submit-button:hover {
            background-color: #457b9d;
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .submit-button:active {
            transform: scale(0.98);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .header-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: contain;
            margin: 0 auto 30px auto;
            background-color: rgba(255, 255, 255, 0.8);
            display: block;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }
    </style>
</head>
<body>
    <img src="karnatakapolicelogo copy.jpg" alt="logo" class="header-logo">
    <div class="container">
        <h2>Crime Reporting Form</h2>
        <form action="case_allocation.php" method="POST"> 
            <label for="fir_id">FIR ID:</label>
            <input type="text" id="fir_id" name="fir_id" placeholder="Enter FIR ID" required><br><br>

            <label for="complaint_given_by">Complainant Name:</label>
            <input type="text" id="complaint_given_by" name="complaint_given_by"  required><br><br>

            <label for="crime_id">Crime ID:</label>
            <input type="text" id="crime_id" name="crime_id" placeholder="Enter crime ID" required><br><br>

            <label for="crime_type">Crime Type:</label>
            <select id="crime_type" name="crime_type">
                <option value="">Select Crime Type</option>
                <option value="theft">Theft</option>
                <option value="assault">Assault</option>
                <option value="fraud">Fraud</option>
                <option value="burglary">Burglary</option>
                <option value="robbery">Robbery</option>
                <option value="homicide">Homicide</option>
                <option value="kidnapping">Kidnapping</option>
                <option value="arson">Arson</option>
                <option value="vandalism">Vandalism</option>
                <option value="cybercrime">Cybercrime</option>
                <option value="domestic_violence">Domestic Violence</option>
                <option value="sexual_assault">Sexual Assault</option>
                <option value="other">Other</option>
            </select><br><br>

            <label for="case_status">Case Status:</label>
            <select id="case_status" name="case_status">
                <option value="">Select Case Status</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="investigating">Under Investigation</option>
                <option value="solved">Solved</option>
                <option value="pending_trial">Pending Trial</option>
            </select><br><br>

            <label for="no_of_casualties">Number of Casualties:</label><br>
            <input type="number" id="no_of_casualties" name="no_of_casualties" value="0" min="0"><br><br>

            <label for="deceased">Deceased (If Any):</label><br>
            <input type="text" id="deceased" name="deceased" placeholder="Enter names if any"><br><br>

            <label for="suspects">Suspects:</label><br>
            <input type="text" id="suspects" name="suspects" placeholder="Enter suspect details"><br><br>

            <label for="complaint_in_brief">Complaint in Brief:</label><br>
            <textarea id="complaint_in_brief" name="complaint_in_brief" rows="4" cols="50" placeholder="Enter complaint details"></textarea><br><br>

            <input type="submit" value="Submit Report" class="submit-button">
        </form>
    </div>
</body>
</html>
