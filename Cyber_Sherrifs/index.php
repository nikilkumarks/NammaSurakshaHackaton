<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Namma Suraksha</title>
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="karnatakapolicelogo copy.jpg">
    
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background: #222;
            color: white;
            padding: 10px 0;
        }
        

        nav {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 90%;
            margin: 0 auto;
        }

        .logo {
            font-size: 32px;
            font-weight: bold;
            background: linear-gradient(90deg, #ff9900, #ff0000);
            -webkit-background-clip: text;
            color: transparent;
            text-shadow: 2px 2px 10px rgba(255, 0, 0, 0.8);
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        .hero {
            background: url('https://images.hindustantimes.com/rf/image_size_630x354/HT/p2/2018/05/20/Pictures/yeddyurappa-personnel-government-legislative-confidence-karnataka-bharatiya_7da1da3a-5be5-11e8-b87b-3dd7d8bd63e9.jpg') no-repeat center center/cover;
            text-align: center;
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 3.5em;
            margin-bottom: 10px;
            color: yellow;
            text-shadow: 3px 3px 8px rgba(255, 255, 0, 0.8);
        }

        .red-line {
            width: 50%;
            height: 5px;
            background: red;
            margin: 0 auto;
            animation: expand 2s infinite alternate;
        }
        .active{
            background-color: red;
        }

        @keyframes expand {
            from {
                width: 50%;
            }
            to {
                width: 70%;
            }
        }

        .hero p {
            font-size: 1.5em;
            margin-bottom: 30px;
            color: red;
            font-weight: bolder;
        }

        .report-button {
            background: linear-gradient(90deg, #ff0000, #ff9900);
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 5px;
            font-size: 1.2em;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            position: relative;
            box-shadow: 0px 0px 15px rgba(255, 0, 0, 0.8);
        }

        .report-button::before {
            content: "⚠ ";
        }

        .report-button:hover {
            background: linear-gradient(90deg, #ff6600, #ff0000);
            transform: scale(1.1);
            box-shadow: 0px 0px 20px rgba(255, 0, 0, 1);
        }

        .features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 50px 20px;
            text-align: center;
            background-color: #fff;
        }

        .feature-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .feature-card img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .feature-card h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #333;
        }

        .feature-card p {
            font-size: 1.1em;
            color: #555;
        }

        footer {
            background: #222;
            color: white;
            text-align: center;
            padding: 15px 0;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <div class="logo">Namma Suraksha</div>
        <ul>
            <li><a href="index.php" class="index">Home</a></li>
            <li><a href="officers.php">Register Officers</a></li>
            <li><a href="location_register.php">Register Location</a></li>
            <li><a href="station_register.php">Register Station</a></li>
            <li><a href="Guidelines.php">Guidelines</a></li>
            <li><a href="more.php">More</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<section class="hero">
    <div class="hero-content">
        <h1>Welcome to Namma Suraksha</h1>
        <div class="red-line"></div>
        <p>Your safety is our priority. We are committed to serving and protecting our community.</p>
        <a href="crime_reporting.php" class="report-button">Report a Crime</a>
    </div>
</section>

<section class="features">
        <div class="feature-card">
            <img src="crimereport.jpg" alt="Crime Reporting">
            <h3>Easy Crime Reporting</h3>
            <p>Report crimes quickly and easily through our online portal.</p>
        </div>
        <div class="feature-card">
            <img src="blue.jpg" alt="Data Accuracy">
            <h3>Data Accuracy</h3>
            <p>Ensuring accuracy and completeness in crime data for better analysis.</p>
        </div>
        <div class="feature-card">
             <img src="csupport.jpg" alt="Community Support">
            <h3>Community Support</h3>
            <p>Working together with the community to maintain law and order.</p>
        </div>
    </section>

<footer>
    <p>&copy; 2025 Namma Suraksha. All rights reserved.</p>
</footer>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
        const heroContent = document.querySelector('.hero-content');
        heroContent.style.opacity = 0;
        heroContent.style.transform = 'translateY(20px)';
        setTimeout(() => {
            heroContent.style.opacity = 1;
            heroContent.style.transform = 'translateY(0)';
            heroContent.style.transition = 'opacity 1s ease, transform 1s ease';
        }, 500);
    });
</script>

</body>
</html>
