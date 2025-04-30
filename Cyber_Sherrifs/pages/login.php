<?php
include('../includes/db.php');  // Include the database connection
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare the SQL query
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Successful login
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        header("Location: ../index.php"); // Redirect to the main page
        exit();
    } else {
        // Invalid login
        $error_message = "Invalid email or password.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="karnatakapolicelogo.jpg">
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

    .container {
        background-color: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        width: 80%;
        max-width: 400px;
        text-align: center;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
    }

form {
    text-align: left;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

input[type="email"],
input[type="password"] {
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
    }

    a {
        color: #4c96af;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
    .slide-enter {
      opacity: 0;
      transform: translateX(50px);
      transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .slide-enter-active {
      opacity: 1;
      transform: translateX(0);
    }
   

    </style>


</head>
<body>
    <img src="karnatakapolicelogo.jpg" alt="logo" class="header-logo">
    <div class="container">
        <h2>Login</h2>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <button type="submit" name="login">Login</button>
            <p>Don't have an account? <a href="register.php">Register Here</a></p>
            <p>Forgot password ? <a href="forgot_password.php">Click Here</a></p>

        </form>
        <?php if (isset($error_message)): ?>
            <p class="error-message"><?= htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
    </div>
</body>
</html>