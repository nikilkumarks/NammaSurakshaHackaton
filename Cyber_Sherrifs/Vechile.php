<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vehicle Database - Crime Reporting System</title>
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
            max-width: 1200px;
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
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
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
            font-size: 1em;
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

        .vehicle-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .vehicle-table th,
        .vehicle-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .vehicle-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #555;
        }

        .vehicle-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .vehicle-table tbody tr:hover {
            background-color: #e6f7ff;
        }

        .vehicle-table .action-buttons button {
            background-color: #27ae60;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
            margin-right: 5px;
            transition: background-color 0.3s ease;
        }

        .vehicle-table .action-buttons button:hover {
            background-color: #219653;
        }

        .add-vehicle-button {
            background-color: #2ecc71;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .add-vehicle-button:hover {
            background-color: #27ae60;
        }

        .no-vehicles {
            color: #777;
            text-align: center;
            padding: 20px;
        }

        /* Modal for adding/editing vehicle */
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
            margin: 5% auto; /* Adjust top margin for better centering */
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            border-radius: 8px;
            position: relative;
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
        }

        .modal-content input[type="text"],
        .modal-content select,
        .modal-content input[type="date"],
        .modal-content input[type="number"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 1em;
        }

        .modal-actions button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            margin-right: 10px;
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
        <h1>Vehicle Database</h1>

        <div class="search-filter-bar">
            <label for="licensePlate">License Plate:</label>
            <input type="text" id="licensePlate" placeholder="Enter License Plate">

            <label for="vin">VIN:</label>
            <input type="text" id="vin" placeholder="Enter VIN">

            <label for="make">Make:</label>
            <input type="text" id="make" placeholder="Enter Make">

            <label for="model">Model:</label>
            <input type="text" id="model" placeholder="Enter Model">

            <label for="color">Color:</label>
            <select id="color">
                <option value="">All</option>
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="silver">Silver</option>
                <option value="grey">Grey</option>
                <option value="other">Other</option>
            </select>

            <label for="year">Year:</label>
            <input type="number" id="year" placeholder="Enter Year">

            <label for="involvedInCrime">Involved in Crime:</label>
            <select id="involvedInCrime">
                <option value="">All</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>

            <button onclick="filterVehicles()">Filter</button>
        </div>

        
        <p id="noVehicles" class="no-vehicles" style="display: none;">No vehicles found.</p>

        <button class="add-vehicle-button" onclick="openAddVehicleModal()">Add New Vehicle</button>

        <div id="vehicleModal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeVehicleModal()">&times;</span>
                <h2>Add/Edit Vehicle</h2>
                <form id="vehicleForm">
                    <input type="hidden" id="modalVehicleId">
                    <label for="modalLicensePlate">License Plate:</label>
                    <input type="text" id="modalLicensePlate" required>

                    <label for="modalVin">VIN:</label>
                    <input type="text" id="modalVin">

                    <label for="modalMake">Make:</label>
                    <input type="text" id="modalMake" required>

                    <label for="modalModel">Model:</label>
                    <input type="text" id="modalModel" required>

                    <label for="modalColor">Color:</label>
                    <select id="modalColor" required>
                        <option value="">Select Color</option>
                        <option value="red">Red</option>
                        <option value="blue">Blue</option>
                        <option value="black">Black</option>
                        <option value="white">White</option>
                        <option value="silver">Silver</option>
                        <option value="grey">Grey</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="modalYear">Year:</label>
                    <input type="number" id="modalYear" required>

                    <label for="modalRegistrationDate">Registration Date:</label>
                    <input type="date" id="modalRegistrationDate">

                    <label for="modalEngineType">Engine Type:</label>
                    <select id="modalEngineType">
                        <option value="">Select Engine Type</option>
                        <option value="petrol">Petrol</option>
                        <option value="diesel">Diesel</option>
                        <option value="electric">Electric</option>
                        <option value="hybrid">Hybrid</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="modalInvolvedInCrime">Involved in Crime:</label>
                    <select id="modalInvolvedInCrime" required>
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>

                    <label for="modalAssociatedReportIds">Associated Report IDs (comma-separated):</label>
                    <input type="text" id="modalAssociatedReportIds">

                    <div class="modal-actions">
                        <button type="submit">Save Vehicle</button>
                        <button type="button" class="cancel" onclick="closeVehicleModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const vehicleData = [
            { licensePlate: 'KA01AB1234', vin: 'ABCDEFGHIJKLMN123', make: 'Maruti Suzuki', model: 'Swift', color: 'white', year: 2022, registrationDate: '2022-03-15', engineType: 'petrol', involvedInCrime: 'no', associatedReportIds: [] },
            { licensePlate: 'TN02XY5678', vin: 'ZYXWVUTSRQPONM456', make: 'Hyundai', model: 'Creta', color: 'blue', year: 2023, registrationDate: '2023-01-20', engineType: 'diesel', involvedInCrime: 'yes', associatedReportIds: ['CR2025-005'] },
            { licensePlate: 'KL07BA9876', vin: '1234567890ABCDEF', make: 'Tata', model: 'Nexon', color: 'grey', year: 2024, registrationDate: '2024-05-10', engineType: 'petrol', involvedInCrime: 'no', associatedReportIds: [] },
            { licensePlate: 'KA05CD3456', vin: 'GHIJKLMNOPQRST789', make: 'Mahindra', model: 'Scorpio', color: 'black', year: 2021, registrationDate: '2021-11-01', engineType: 'diesel', involvedInCrime: 'yes', associatedReportIds: ['CR2025-007', 'CR2025-008'] },
        ];

        const vehicleTableBody = document.getElementById('vehicleTableBody');
        const noVehiclesElement = document.getElementById('noVehicles');
        const vehicleModal = document.getElementById('vehicleModal');
        const modalForm = document.getElementById('vehicleForm');
        const modalVehicleIdInput = document.getElementById('modalVehicleId');
        const modalLicensePlateInput = document.getElementById('modalLicensePlate');
        const modalVinInput = document.getElementById('modalVin');
        const modalMakeInput = document.getElementById('modalMake');
        const modalModelInput = document.getElementById('modalModel');
        const modalColorSelect = document.getElementById('modalColor');
        const modalYearInput = document.getElementById('modalYear');
        const modalRegistrationDateInput = document.getElementById('modalRegistrationDate');
        const modalEngineTypeSelect = document.getElementById('modalEngineType');
        const modalInvolvedInCrimeSelect = document.getElementById('modalInvolvedInCrime');
        const modalAssociatedReportIdsInput = document.getElementById('modalAssociatedReportIds');

        let currentVehicleData = [...vehicleData];

        function renderVehicleTable(data) {
            vehicleTableBody.innerHTML = '';
            if (data.length === 0) {
                noVehiclesElement.style.display = 'block';
                return;
            }
            noVehiclesElement.style.display = 'none';
            data.forEach(vehicle => {
                const row = vehicleTableBody.insertRow();
                row.insertCell().textContent = vehicle.licensePlate;
                row.insertCell().textContent = vehicle.vin || '-';
                row.insertCell().textContent = vehicle.make;
                row.insertCell().textContent = vehicle.model;
                row.insertCell().textContent = vehicle.color;
                row.insertCell().textContent = vehicle.year;
                row.insertCell().textContent = vehicle.registrationDate || '-';
                row.insertCell().textContent = vehicle.engineType || '-';
                row.insertCell().textContent = vehicle.involvedInCrime;
                row.insertCell().textContent = vehicle.associatedReportIds.join(', ') || '-';
                const actionsCell = row.insertCell();
                actionsCell.classList.add('action-buttons');
                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.onclick = () => openEditVehicleModal(vehicle.licensePlate);
                actionsCell.appendChild(editButton);
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.onclick = () => deleteVehicle(vehicle.licensePlate);
                actionsCell.appendChild(deleteButton);
            });
        }

        function filterVehicles() {
            const licensePlate = document.getElementById('licensePlate').value.toLowerCase();
            const vin = document.getElementById('vin').value.toLowerCase();
            const make = document.getElementById('make').value.toLowerCase();}