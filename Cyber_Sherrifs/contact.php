<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="karnatakapolicelogo copy.jpg">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #a8dadc, #457b9d);
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
            max-width: 600px;
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

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 8px;
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
        input[type="email"],
        textarea {
            width: calc(100% - 20px);
            padding: 12px;
            border: 2px solid #457b9d;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #1d3557;
            outline: none;
            box-shadow: 0 0 5px rgba(30, 64, 107, 0.5);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        button {
            background-color: #1d3557;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s ease, transform 0.2s ease-in-out, box-shadow 0.3s ease;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        button:hover {
            background-color: #457b9d;
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        button:active {
            transform: scale(0.98);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .contact-info {
            margin-top: 40px;
            text-align: center;
            color: #777;
            animation: fadeInUp 1s ease-out;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-info h3 {
            color: #1d3557;
            margin-bottom: 15px;
        }

        .contact-info p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Contact Us</h2>
        <form id="contactForm">
            <div class="form-group">
                <label for="name">Name <span>*</span>:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email <span>*</span>:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Message <span>*</span>:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="button" id="sendBtn">Send Message</button>
        </form>

        <div class="contact-info">
            <h3>Our Contact Information</h3>
            <p>Email: NammaSuraksha@gmail.com</p>
            <p>Phone: +91 9876543210</p>
            <p>Address: 123 Main Street, Bengaluru, Karnataka, India</p>
        </div>
    </div>

    <script>
        document.getElementById("sendBtn").addEventListener("click", function () {
            const form = document.getElementById("contactForm");
            if (form.checkValidity()) {
                // Optional: send data to server here using AJAX
                window.location.href = "thanks.html";
            } else {
                form.reportValidity();
            }
        });
    </script>
</body>
</html>