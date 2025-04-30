<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wanted Persons Database - Crime Reporting System</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f2f5, #e2e8f0);
            color: #333;
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
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 95%;
            max-width: 1400px;
            margin-top: 20px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        .search-filter-bar {
            margin-bottom: 20px;
            width: 100%;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            align-items: center;
        }

        .search-filter-bar label {
            font-weight: bold;
            color: #34495e;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .search-filter-bar input[type="text"],
        .search-filter-bar select,
        .search-filter-bar button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 0.9em;
            width: 100%;
            box-sizing: border-box;
        }

        .search-filter-bar button {
            background-color: #3498db;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-filter-bar button:hover {
            background-color: #2980b9;
        }

        .wanted-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow-x: auto;
            display: block;
        }

        .wanted-table th,
        .wanted-table td {
            padding: 8px 10px;
            text-align: left;
            border-bottom: 1px solid #eee;
            white-space: nowrap;
            font-size: 0.9em;
        }

        .wanted-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #555;
        }

        .wanted-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .wanted-table tbody tr:hover {
            background-color: #e6f7ff;
        }

        .wanted-table .photo-cell {
            width: 60px;
        }

        .wanted-table .photo {
            max-width: 100%;
            height: auto;
            border-radius: 3px;
        }

        .wanted-table .action-buttons {
            display: flex;
            gap: 5px;
        }

        .wanted-table .action-buttons button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 6px 8px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 0.8em;
            transition: background-color 0.3s ease;
        }

        .wanted-table .action-buttons button:hover {
            background-color: #c0392b;
        }

        .add-wanted-button {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .add-wanted-button:hover {
            background-color: #27ae60;
        }

        .no-wanted {
            color: #777;
            text-align: center;
            padding: 20px;
        }

        /* Modal for adding/editing wanted person */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 2% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 900px;
            border-radius: 8px;
            position: relative;
            overflow-y: auto;
            max-height: 90vh;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-content label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #34495e;
            font-size: 0.9em;
        }

        .modal-content input[type="text"],
        .modal-content select,
        .modal-content input[type="date"],
        .modal-content input[type="number"],
        .modal-content input[type="file"],
        .modal-content textarea {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 0.9em;
        }

        .modal-content .photo-upload {
            margin-bottom: 10px;
        }

        .modal-content .modal-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            margin-bottom: 10px;
        }

        .modal-content .modal-row > div {
            display: flex;
            flex-direction: column;
        }

        .modal-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-actions button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            margin-left: 10px;
            transition: background-color 0.3s ease;
        }

        .modal-actions button:hover {
            background-color: #2980b9;
        }

        .modal-actions button.cancel {
            background-color: #e74c3c;
        }

        .modal-actions button.cancel:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6i3ntEYZoC5TD0DDAUM43iIKY0SbKU91ZJA&s" alt="Karnataka Police Logo" class="logo">
    <div class="container">
        <h1>Wanted Persons Database</h1>

        <div class="search-filter-bar">
            <label for="name">Name:</label>
            <input type="text" id="name" placeholder="Enter Name">

            <label for="aliases">Aliases:</label>
            <input type="text" id="aliases" placeholder="Enter Aliases">

            <label for="crime">Crime Committed:</label>
            <input type="text" id="crime" placeholder="Enter Crime">

            <label for="gender">Gender:</label>
            <select id="gender">
                <option value="">All</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="race">Race:</label>
            <input type="text" id="race" placeholder="Enter Race">

            <label for="ageRange">Age Range:</label>
            <select id="ageRange">
                <option value="">All</option>
                <option value="18-25">18-25</option>
                <option value="26-35">26-35</option>
                <option value="36-45">36-45</option>
                <option value="46+">46+</option>
            </select>

            <label for="lastKnownLocation">Last Known Location:</label>
            <input type="text" id="lastKnownLocation" placeholder="Enter Last Known Location">

            <label for="status">Status:</label>
            <select id="status">
                <option value="">All</option>
                <option value="active">Active</option>
                <option value="apprehended">Apprehended</option>
            </select>

            <button onclick="filterWanted()">Filter</button>
        </div>

        

        <p id="noWanted" class="no-wanted" style="display: none;">No wanted persons found.</p>

        <button class="add-wanted-button" onclick="openAddWantedModal()">Add New Wanted Person</button>

        <div id="wantedModal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeWantedModal()">&times;</span>
                <h2>Add/Edit Wanted Person</h2>
                <form id="wantedForm">
                    <div class="modal-row">
                        <div>
                            <label for="modalPhoto">Photo:</label>
                            <input type="file" id="modalPhoto" accept="image/*">
                            <img id="modalPhotoPreview" src="#" alt="Preview" style="max-width: 100px; max-height: 100px; display: none;">
                        </div>
                        <div>
                            <label for="modalName">Name:</label>
                            <input type="text" id="modalName" required>
                        </div>
                        <div>
                            <label for="modalAliases">Aliases:</label>
                            <input type="text" id="modalAliases">
                        </div>
                    </div>
                    <div class="modal-row">
                        <div>
                            <label for="modalCrime">Crime Committed:</label>
                            <input type="text" id="modalCrime" required>
                        </div>
                        <div>
                            <label for="modalGender">Gender:</label>
                            <select id="modalGender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div>
                            <label for="modalRace">Race:</label>
                            <input type="text" id="modalRace">
                        </div>
                    </div>
                    <div class="modal-row">
                        <div>
                            <label for="modalAge">Age:</label>
                            <input type="number" id="modalAge">
                        </div>
                        <div>
                            <label for="modalHeight">Height (in cm):</label>
                            <input type="number" id="modalHeight">
                        </div>
                        <div>
                            <label for="modalWeight">Weight (in kg):</label>
                            <input type="number" id="modalWeight">
                        </div>
                    </div>
                    <div class="modal-row">
                        <div>
                            <label for="modalEyeColor">Eye Color:</label>
                            <input type="text" id="modalEyeColor">
                        </div>
                        <div>
                            <label for="modalHairColor">Hair Color:</label>
                            <input type="text" id="modalHairColor">
                        </div>
                        <div>
                            <label for="modalDateWanted">Date Wanted:</label>
                            <input type="date" id="modalDateWanted">
                        </div>
                    </div>
                    <div>
                        <label for="modalDistinguishingMarks">Distinguishing Marks:</label>
                        <textarea id="modalDistinguishingMarks"></textarea>
                    </div>
                    <div>
                        <label for="modalLastKnownLocation">Last Known Location:</label>
                        <input type="text" id="modalLastKnownLocation">
                    </div>
                    <div>
                        <label for="modalIssuingAuthority">Issuing Authority:</label>
                        <input type="text" id="modalIssuingAuthority">
                    </div>
                    <div>
                        <label for="modalStatus">Status:</label>
                        <select id="modalStatus" required>
                            <option value="active">Active</option>
                            <option value="apprehended">Apprehended</option>
                        </select>
                    </div>

                    <div class="modal-actions">
                        <button type="submit">Save Wanted Person</button>
                        <button type="button" class="cancel" onclick="closeWantedModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const wantedPersonsData = [
            {
                id: 'WP001',
                name: 'John Doe',
                aliases: ['Johnny', 'JD'],
                crime: 'Armed Robbery',
                gender: 'male',
                race: 'Caucasian',
                age: 35,
                height: 180,
                weight: 85,
                eyeColor: 'blue',
                hairColor: 'brown',
                distinguishingMarks: 'Tattoo on left arm (skull)',
                lastKnownLocation: 'Bengaluru Central',
                dateWanted: '2025-04-20',
                issuingAuthority: 'Bengaluru Police',
                status: 'active',
                photo: 'placeholder_male.png'
            },
            {
                id: 'WP002',
                name: 'Jane Smith',
                aliases: ['Smitty'],
                crime: 'Fraud',
                gender: 'female',
                race: 'Asian',
                age: 42,
                height: 165,
                weight: 60,
                eyeColor: 'brown',
                hairColor: 'black',
                distinguishingMarks: 'Scar above right eyebrow',
                lastKnownLocation: 'Electronic City, Bengaluru',
                dateWanted: '2025-04-15',
                issuingAuthority: 'Cyber Crime Division',
                status: 'active',
                photo: 'placeholder_female.png'
            },
            // Add more wanted persons data here
        ];

        const wantedTableBody = document.getElementById('wantedTableBody');
        const noWantedElement = document.getElementById('noWanted');
        const wantedModal = document.getElementById