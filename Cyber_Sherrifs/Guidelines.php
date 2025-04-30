<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Entry Guidelines - Crime Reporting System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6i3ntEYZoC5TD0DDAUM43iIKY0SbKU91ZJA&s');
            background-repeat: no-repeat;
            background-position: top center; /* Adjust as needed: top, bottom, center, left, right */
            background-attachment: fixed; /* Optional: Keeps the background fixed while scrolling */
            background-size: contain; /* Ensures the entire image is visible and scaled proportionally */
            background-color: rgba(240, 242, 245, 0.8); /* Slightly less transparent fallback */
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 95%;
            max-width: 900px;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent container for better readability */
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        h2 {
            color: #34495e;
            margin-top: 25px;
            margin-bottom: 15px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }

        h3 {
            color: #555;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        p {
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .important {
            color: #c0392b;
            font-weight: bold;
        }

        .example-correct {
            background-color: #e6f9e8;
            color: #27ae60;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #d4edda;
        }

        .example-incorrect {
            background-color: #fdecea;
            color: #c0392b;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            border: 1px solid #f8d7da;
        }

        ul {
            list-style-type: disc;
            margin-left: 20px;
            margin-bottom: 15px;
        }

        li {
            margin-bottom: 8px;
        }

        .section {
            margin-bottom: 30px;
        }

        .tip {
            background-color: #f0f8ff;
            color: #007bff;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
            border: 1px solid #b8daff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crime Reporting System - Data Entry Guidelines</h1>

        <section class="section">
            <h2>Introduction</h2>
            <p>These guidelines are designed to assist all police personnel in accurately and completely filling out crime reports within the system. Consistent and high-quality data is crucial for effective crime analysis, resource allocation, and strategic planning. Please read these instructions carefully and refer to them as needed.</p>
            <p class="important">Remember: Accuracy and completeness in reporting directly impact the safety and security of our community.</p>
        </section>

        <section class="section">
            <h2>General Guidelines</h2>
            <ul>
                <li><span class="important">Fill all mandatory fields.</span> These are typically marked with an asterisk (*) in the reporting form.</li>
                <li>Use clear and concise language. Avoid jargon or abbreviations that might not be universally understood.</li>
                <li>Be objective and factual. Report what you know and avoid making assumptions or personal opinions.</li>
                <li>Ensure legibility if entering information manually (if applicable in any backup systems).</li>
                <li>Record the date and time of the incident accurately.</li>
                <li>Provide specific locations whenever possible. Use addresses, landmarks, or GPS coordinates.</li>
                <li>If unsure about any field, consult your supervisor or refer to the system's help documentation.</li>
            </ul>
        </section>

        <section class="section">
            <h2>Guidelines for Specific Fields</h2>

            <div class="subsection">
                <h3>Incident Details</h3>
                <ul>
                    <li><strong>Date and Time of Incident:</strong> Record the exact date and time the crime occurred. If the exact time is unknown, provide the best possible estimate and indicate it as such (e.g., "Believed to have occurred between 22:00 and 06:00").</li>
                    <li><strong>Location of Incident:</strong> Be as specific as possible. Include the street address, building name, floor number, or nearby landmarks. For open areas, use GPS coordinates if available or describe the location in detail (e.g., "Northwest corner of the park near the oak tree").
                        <div class="example-correct">Correct: 123 Main Street, Bengaluru, Karnataka.</div>
                        <div class="example-incorrect">Incorrect: Somewhere on Main Street.</div>
                    </li>
                    <li><strong>Type of Crime:</strong> Select the most accurate category from the provided dropdown list. If the crime doesn't fit any of the listed categories, use "Other" and provide a detailed description in the "Narrative" section.</li>
                </ul>
            </div>

            <div class="subsection">
                <h3>Parties Involved (Victims, Suspects, Witnesses)</h3>
                <ul>
                    <li><strong>Names:</strong> Record full names (Last Name, First Name, Middle Initial) if known. Verify spelling if possible.</li>
                    <li><strong>Addresses:</strong> Obtain and record complete addresses, including street number, street name, city, state, and postal code.</li>
                    <li><strong>Contact Information:</strong> Include phone numbers and email addresses if available and relevant.</li>
                    <li><strong>Descriptions:</strong> Provide detailed physical descriptions (age, sex, race, height, weight, distinguishing marks, clothing worn at the time of the incident).</li>
                    <li><strong>Roles:</strong> Clearly identify each individual's role (Victim, Suspect, Witness).</li>
                </ul>
            </div>

            <div class="subsection">
                <h3>Property/Evidence Details</h3>
                <ul>
                    <li><strong>Description:</strong> Provide a thorough description of any property involved (stolen, damaged, recovered). Include make, model, serial number, color, and any unique identifying features.</li>
                    <li><strong>Value:</strong> Estimate the monetary value of any stolen or damaged property as accurately as possible.</li>
                    <li><strong>Evidence:</strong> Document all evidence collected at the scene, including its location and how it was collected and preserved. Follow established evidence handling protocols.</li>
                </ul>
            </div>

            <div class="subsection">
                <h3>Narrative of Incident</h3>
                <ul>
                    <li>Provide a chronological and detailed account of what happened, based on your investigation and statements from involved parties.</li>
                    <li>Include all relevant details, such as the sequence of events, actions taken by individuals involved, and any statements made.</li>
                    <li>Be specific about times, locations, and the involvement of each party.</li>
                    <li>Avoid personal opinions or interpretations. Stick to the facts.</li>
                    <li>If using direct quotes, enclose them in quotation marks and attribute them to the speaker.</li>
                </ul>
            </div>
        </section>

        <section class="section">
            <h2>Mandatory Fields</h2>
            <p>The following fields <span class="important">must</span> be completed for every crime report:</p>
            <ul>
                <li>Date and Time of Incident <span class="important">*</span></li>
                <li>Location of Incident <span class="important">*</span></li>
                <li>Type of Crime <span class="important">*</span></li>
                <li>Reporting Officer ID <span class="important">*</span></li>
                <li>Narrative of Incident <span class="important">*</span></li>
            </ul>
            <p class="tip">The system will highlight any mandatory fields that are left blank upon submission.</p>
        </section>

        <section class="section">
            <h2>Review and Submission</h2>
            <ul>
                <li>Before submitting the report, review all entered information carefully for accuracy and completeness.</li>
                <li>Ensure all mandatory fields are filled.</li>
                <li>Double-check names, addresses, dates, and times.</li>
                <li>Read through the narrative to ensure it is clear, concise, and factual.</li>
                <li>If you identify any errors, correct them before submitting.</li>
            </ul>
        </section>

        <section class="section">
            <h2>Further Assistance</h2>
            <p>If you have any questions or require further clarification on these guidelines or any aspect of the crime reporting system, please contact your supervisor or the IT support team at <a href="mailto:itsupport@police.gov.in">itsupport@police.gov.in</a> or call extension 555.</p>
        </section>
    </div>
</body>
</html>