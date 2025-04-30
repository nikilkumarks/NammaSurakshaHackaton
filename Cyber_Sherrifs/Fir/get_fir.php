<?php
$host = "localhost";
$user = "root";
$pass = ""; // Change this if you have a password
$db = "web"; // Replace with your actual DB name

$code = $_GET['code'] ?? '';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(["error" => "Database connection failed"]);
  exit;
}

$stmt = $conn->prepare("SELECT * FROM crime_reporting WHERE firid = ?");
$stmt->bind_param("s", $code);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);

$stmt->close();
$conn->close();
?>
