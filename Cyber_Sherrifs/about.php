<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Namma Suraksha</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="karnatakapolicelogo copy.jpg">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
            overflow-x: hidden;
        }

        header {
            background: #222;
            color: white;
            padding: 10px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            margin: 0 auto;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #00a0c6;
        }

        nav ul {
            list-style: none;
            display: flex;
            padding-left: 0;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            display: flex;
            align-items: center;
        }

        nav ul li a i {
            margin-right: 5px;
        }

        nav ul li a:hover {
            background-color: #555;
            transform: translateY(-2px);
        }

        .about-section {
            padding: 50px 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            max-width: 800px;
            border-radius: 8px;
        }

        .about-section h2 {
            color: #00a0c6;
            text-align: center;
            margin-bottom: 30px;
            font-size: 2em;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.5s;
        }

        .about-section p {
            font-size: 1.1em;
            color: #555;
            margin-bottom: 20px;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards 0.8s;
        }

        .team-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin: 30px auto;
            border-radius: 8px;
            max-width: 1100px;
            opacity: 0;
            animation: fadeIn 1s forwards 1.2s;
        }

        .team-section h2 {
            width: 100%;
            text-align: center;
            color: #00a0c6;
            margin-bottom: 30px;
            font-size: 1.8em;
        }

        .team-member {
            width: 220px;
            margin: 15px;
            text-align: center;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .team-member img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .team-member h3 {
            color: #007b93;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 0.9em;
            color: #777;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #222;
            color: white;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        /* Animations */
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* Responsive */
        @media screen and (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: center;
            }
            nav ul {
                margin-top: 10px;
                flex-direction: column;
            }
            nav ul li {
                margin: 10px 0;
            }
            .about-section {
                padding: 30px 15px;
            }
            .team-member {
                width: 80%;
            }
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <div class="logo"><i class="fas fa-info-circle"></i> About Us</div>
            <ul>
                <li><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="contact.php"><i class="fas fa-envelope"></i> Contact</a></li>
            </ul>
        </nav>
    </header>

    <section class="about-section">
        <h2>About Namma Suraksha</h2>
        <p>
            Welcome to Namma Suraksha, your trusted partner in ensuring community safety and security. We are committed to providing a reliable and efficient platform for crime reporting and data management, empowering both citizens and law enforcement to work together seamlessly.
        </p>
        <p>
            Our mission is to enhance the accuracy and completeness of crime data, enabling effective analysis and decision-making. By leveraging modern technology, we strive to create a safer environment for everyone.
        </p>
    </section>

    <section class="team-section">
        <h2>Maintaining Law And Order</h2>

        <div class="team-member">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/P_Vijayan_IPS.jpg/800px-P_Vijayan_IPS.jpg" alt="Team Member 1">
            <h3>John Doe</h3>
            <p>Director General Of Police</p>
        </div>

        <div class="team-member">
            <img src="https://w0.peakpx.com/wallpaper/180/266/HD-wallpaper-ladies-police-officer-sitting-on-chair-police-officer-sitting-on-chair-indian-police.jpg" alt="Team Member 2">
            <h3>Jane Smith</h3>
            <p>Inspector General Of Police</p>
        </div>

        <div class="team-member">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBZYUZWdg2g9l7RXbJUKahVunmgTFpw6w9sr-WQmYuFvtKWsrL59loxX09aGBt9k3Wzlc&usqp=CAU" alt="Team Member 3">
            <h3>Jane</h3>
            <p>Constable</p>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Namma Suraksha. All rights reserved.</p>
    </footer>

</body>
</html>
