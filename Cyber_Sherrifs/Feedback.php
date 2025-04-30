<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback on Crime Reporting</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        select,
        textarea,
        button {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }

        textarea {
            min-height: 100px;
        }

        button {
            background-color: #4c96af;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            padding: 10px 15px;
            font-size: 16px;
        }

        button:hover {
            background-color: #3b7d8e;
        }

        .previous-feedback {
            margin-top: 30px;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }

        .feedback-item {
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f9f9f9;
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .feedback-type {
            font-weight: bold;
            color: #777;
        }

        .no-feedback {
            color: #777;
        }
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6i3ntEYZoC5TD0DDAUM43iIKY0SbKU91ZJA&s" alt="Karnataka Police Logo" class="logo">
    <div class="container">
        <h1>Feedback on Crime Reporting</h1>
        <p>Please share your feedback to help us improve.</p>

        <form action="process_feedback.php" method="POST">
            <label for="feedback_type">Type of Feedback:</label>
            <select id="feedback_type" name="feedback_type">
                <option value="">Select Type</option>
                <option value="form_usability">Form Usability</option>
                <option value="clarity_instructions">Clarity of Instructions</option>
                <option value="technical_issues">Technical Issues</option>
                <option value="suggestion">Suggestion</option>
                <option value="other">Other</option>
            </select>

            <label for="feedback_comment">Your Feedback:</label>
            <textarea id="feedback_comment" name="feedback_comment" placeholder="Enter your feedback"></textarea>

            <button type="submit">Submit Feedback</button>
        </form>

        <div class="previous-feedback">
            <h2>Previous Feedback</h2>
            <ul id="feedbackList">
                </ul>
            <p id="noFeedback" class="no-feedback">No feedback yet.</p>
        </div>
    </div>

    <script>
        // In a real application, you would fetch this data from a server.
        const previousFeedback = [
            { type: 'Suggestion', comment: 'Add an auto-save feature to the reporting form.' },
            { type: 'Technical Issues', comment: 'The system occasionally experiences slowdowns during peak hours.' },
            { type: 'Clarity of Instructions', comment: 'Could the guidelines for describing involved parties be more detailed?' }
        ];

        const feedbackListElement = document.getElementById('feedbackList');
        const noFeedbackElement = document.getElementById('noFeedback');

        if (previousFeedback.length > 0) {
            noFeedbackElement.style.display = 'none';
            previousFeedback.forEach(feedback => {
                const listItem = document.createElement('li');
                listItem.classList.add('feedback-item');
                listItem.innerHTML = <span class="feedback-type">${feedback.type}:</span> ${feedback.comment};
                feedbackListElement.appendChild(listItem);
            });
        } else {
            noFeedbackElement.style.display = 'block';
        }
    </script>
</body>
</html>