<?php
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $crime_id = $_POST['crime_id'];
    $crime_type = $_POST['crime_type'];

    if (!empty($crime_id) && !empty($crime_type)) {
        $stmt = $conn->prepare("INSERT INTO crime_registration (cid, ctype) VALUES (?, ?)");
        $stmt->bind_param("is", $crime_id, $crime_type);

        if ($stmt->execute()) {
            $message = "Crime registered successfully!";
        } else {
            $message = "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $message = "Please fill all fields.";
    }

    $conn->close();
}
?>

<!-- ✅ HTML below is outside the PHP block -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crime Registration</title>
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

        .header-logo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: contain;
            margin-bottom: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 600px;
            text-align: center;
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
            animation: blink 1s infinite alternate;
        }

        @keyframes blink {
            from { opacity: 1; }
            to { opacity: 0.5; }
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
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        select:focus {
            border-color: #1d3557;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 64, 107, 0.5);
        }

        button[type="submit"] {
            background-color: #1d3557;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        button[type="submit"]:hover {
            background-color: #457b9d;
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        button[type="submit"]:active {
            transform: scale(0.98);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <img src="karnatakapolicelogo.jpg" alt="logo" class="header-logo">
    <div class="container">
        <h2>Crime Registration Form</h2>
        <?php if (!empty($message)) echo "<p style='color: green;'>$message</p>"; ?>
        <form action="crime_registration.php" method="POST">
            <label for="crime_id">Crime ID:</label>
            <input type="text" id="crime_id" name="crime_id" placeholder="Enter crime id" required><br><br>

            <label for="crime_type">Crime Type:</label><br>
            <select id="crime_type" name="crime_type" required>
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

            <input type="submit" value="Register Crime">
        </form>
    </div>
</body>
</html>
