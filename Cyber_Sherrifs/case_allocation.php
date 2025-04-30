<?php
// Database connection settings
$servername = "localhost";
$username = "root";         // Your DB username
$password = "";             // Your DB password
$dbname = "web";            // Your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use null coalescing to avoid undefined key warnings
    $officer_id = $_POST['officer_id'] ?? null;
    $station_id = $_POST['station_id'] ?? null;
    $fir_id = $_POST['fir_id'] ?? null;
    $case_status = $_POST['case_status'] ?? null;

    // Check if all fields are filled
    if ($officer_id && $station_id && $fir_id && $case_status) {
        // Prepare SQL insert statement
        $stmt = $conn->prepare("INSERT INTO case_allocation (officer_id, station_id, firid, case_status) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $officer_id, $station_id, $fir_id, $case_status);

        if ($stmt->execute()) {
            echo "✅ Case successfully allocated!";
        } else {
            echo "❌ Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "⚠️ Please fill in all fields.";
    }
}

$conn->close();
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Case Allocation</title>
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
            padding: 30px;
            margin: 0;
            min-height: 100vh;
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
            max-width: 700px;
            text-align: center;
            margin-top: 20px;
            animation: slideIn 0.8s ease-out;
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }

        h2 {
            color: #1d3557;
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
        }

        input[type="text"],
        select {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 25px;
            border: 2px solid #457b9d;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #1d3557;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 64, 107, 0.5);
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
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .submit-button:hover {
            background-color: #457b9d;
            transform: scale(1.02);
        }

        .submit-button:active {
            transform: scale(0.98);
        }

        .header-logo {
            width: 100px;
            height: auto;
            display: block;
            border-radius: 50%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 30px;
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 30px;
            }

            h2 {
                font-size: 2em;
            }

            label {
                font-size: 1em;
            }

            input[type="text"],
            select {
                font-size: 0.9em;
            }

            .submit-button {
                font-size: 1em;
            }

            .header-logo {
                width: 80px;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="karnatakapolicelogo copy.jpg" alt="logo" class="header-logo">
        <h2>Case Allocation Form</h2>
        <form action="thankyou.html" method="POST">
            <label for="officer_id">Officer ID:</label>
            <input type="text" id="officer_id" name="officer_id" placeholder="Enter officer ID"><br><br>

            <label for="station_id">Station ID:</label>
            <input type="text" id="station_id" name="station_id" placeholder="Enter station ID" required><br><br>

            <label for="fir_id">FIR ID:</label>
            <input type="text" id="fir_id" name="fir_id" placeholder="Enter FIR ID"><br><br>

            <label for="case_status">Case Status:</label>
            <select id="case_status" name="case_status">
                <option value="">Select Case Status</option>
                <option value="open">Open</option>
                <option value="closed">Closed</option>
                <option value="investigating">Under Investigation</option>
                <option value="solved">Solved</option>
                <option value="pending_trial">Pending Trial</option>
            </select><br><br>

            <input type="submit" value="Allocate Case" class="submit-button">
        </form>
    </div>
</body>
</html>
