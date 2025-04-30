<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Pages</title>
    <link rel="icon" href="karnatakapolicelogo copy.jpg">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
        }

        .logo {
            width: 50px; /* Adjust as needed */
            height: auto;
            margin-right: 20px;
        }

        nav {
            overflow: hidden;
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
        }

        nav ul li {
            flex: 1;
        }

        nav ul li a {
            color: white;
            text-align: center;
            padding: 14px;
            display: block;
            text-decoration: none;
        }

        nav ul li a:hover {
            background-color: #575757;
        }

        nav ul li a.active {
            background-color: #4CAF50;
            color: white;
        }

        .container {
            padding: 20px;
            text-align: center;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 768px) {
            nav ul {
                flex-direction: column;
            }
            nav ul li {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <header>
        <img src="karnatakapolicelogo copy.jpg" alt="Karnataka Police Logo" class="logo">
        <nav>
            <ul>
                <li><a href="Evidence.php">Evidence Tracking</a></li>
                <li><a href="Feedback.php">Feedback on Reporting</a></li>
                <li><a href="Vechile.php">Vehicle Database</a></li>
                <li><a href="Wanted.php">Wanted Person</a></li>
                <li><a href="Glossary.php">Glossary</a></li>
                <li><a href="retrive/index.html">Officer Details</a></li>
                <li><a href="Fir/fir_lookup.html">Fir Details</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>More Pages</h2>
        <p>This page provides navigation to other important sections of the Crime Reporting System.</p>
    </div>
</body>
</html>