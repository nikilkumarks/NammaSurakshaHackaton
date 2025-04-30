<?php
// Handle form submission
$response = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection settings
    $servername = "localhost";
    $username = "root"; // your DB username
    $password = "";     // your DB password
    $database = "web"; // your DB name

    // Connect to DB
    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        $response = "Connection failed: " . $conn->connect_error;
    } else {
        // Collect POST data
        $reportId = $_POST['report_id'];
        $description = $_POST['description'];
        $collectedBy = $_POST['collected_by'];
        $status = $_POST['status'];

        // Generate unique Evidence ID
        $evidenceId = 'EV' . time();

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO evidence_tracking ( reportid, description, collectedby,  status)
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $evidence_name, $collected_on, $location, $custodian);

        if ($stmt->execute()) {
            $response = "Evidence saved successfully with ID: $evidenceId";
        } else {
            $response = "Error saving evidence: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Evidence Tracking - Crime Reporting System</title>
    <style>



.search-filter-bar {
            margin-bottom: 20px;
            width: 100%;
            display: grid;
            /* Modified grid-template-columns for better responsiveness */
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 10px;
            align-items: center;
        }

        .search-filter-bar label {
            font-weight: bold;
            color: #34495e;
            /* Ensure labels don't take up too much space in the grid */
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
            width: 100%; /* Make input elements take full width of their grid cell */
            box-sizing: border-box; /* Ensure padding and border are included in the width */
        }

       










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
            max-width: 1000px;
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
            grid-template-columns: auto auto auto auto auto auto minmax(100px, auto);
            gap: 10px;
            align-items: center;
        }

        .search-filter-bar label {
            font-weight: bold;
            color: #34495e;
        }

        .search-filter-bar input[type="text"],
        .search-filter-bar select,
        .search-filter-bar button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
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

        .evidence-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            overflow: hidden;
        }

        .evidence-table th,
        .evidence-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .evidence-table th {
            background-color: #f0f0f0;
            font-weight: bold;
            color: #555;
        }

        .evidence-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .evidence-table tbody tr:hover {
            background-color: #e6f7ff;
        }

        .evidence-table .action-buttons button {
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

        .evidence-table .action-buttons button:hover {
            background-color: #219653;
        }

        .add-evidence-button {
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

        .add-evidence-button:hover {
            background-color: #27ae60;
        }

        .no-evidence {
            color: #777;
            text-align: center;
            padding: 20px;
        }

        /* Modal for adding/editing evidence */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
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
        .modal-content input[type="date"],
        .modal-content textarea,
        .modal-content select {
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
        <h1>Evidence Tracking</h1>

        <div class="search-filter-bar">
            <label for="evidenceId">Evidence ID:</label>
            <input type="text" id="evidenceId" placeholder="Enter Evidence ID">

            <label for="reportId">Report ID:</label>
            <input type="text" id="reportId" placeholder="Enter Report ID">

            <label for="itemDescription">Description:</label>
            <input type="text" id="itemDescription" placeholder="Enter Item Description">

            <label for="collectedBy">Collected By:</label>
            <input type="text" id="collectedBy" placeholder="Officer Name/ID">

            <label for="status">Status:</label>
            <select id="status">
                <option value="">All</option>
                <option value="collected">Collected</option>
                <option value="analyzed">Analyzed</option>
                <option value="stored">Stored</option>
                <option value="released">Released</option>
            </select>

            <button onclick="filterEvidence()">Filter</button>
        </div>


        <p id="noEvidence" class="no-evidence" style="display: none;">No evidence items found.</p>

        <button class="add-evidence-button" onclick="openAddEvidenceModal()">Add New Evidence</button>

        <div id="evidenceModal" class="modal">
            <div class="modal-content">
                <span class="close-button" onclick="closeEvidenceModal()">&times;</span>
                <h2>Add/Edit Evidence</h2>
                <form id="evidenceForm">
                    <input type="hidden" id="modalEvidenceId"> <label for="modalReportId">Report ID:</label>
                    <input type="text" id="modalReportId" required>

                    <label for="modalItemDescription">Item Description:</label>
                    <textarea id="modalItemDescription" required></textarea>

                    <label for="modalCollectedOn">Collected On:</label>
                    <input type="date" id="modalCollectedOn" required>

                    <label for="modalCollectedBy">Collected By:</label>
                    <input type="text" id="modalCollectedBy" required>

                    <label for="modalLocationCollected">Location Collected:</label>
                    <input type="text" id="modalLocationCollected">

                    <label for="modalCurrentCustodian">Current Custodian:</label>
                    <input type="text" id="modalCurrentCustodian">

                    <label for="modalStatus">Status:</label>
                    <select id="modalStatus" required>
                        <option value="collected">Collected</option>
                        <option value="analyzed">Analyzed</option>
                        <option value="stored">Stored</option>
                        <option value="released">Released</option>
                    </select>

                    <div class="modal-actions">
                        <button type="submit">Save Evidence</button>
                        <button type="button" class="cancel" onclick="closeEvidenceModal()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const evidenceData = [
            { id: 'EV001', reportId: 'CR2025-001', description: 'Broken glass shard', collectedOn: '2025-04-28', collectedBy: 'Officer Sharma', location: 'Living Room Window', custodian: 'Evidence Locker A', status: 'stored' },
            { id: 'EV002', reportId: 'CR2025-001', description: 'Fingerprint lift (Door)', collectedOn: '2025-04-28', collectedBy: 'Officer Verma', location: 'Front Door', custodian: 'Lab Tech Singh', status: 'analyzed' },
            { id: 'EV003', reportId: 'CR2025-002', description: 'Blood sample', collectedOn: '2025-04-29', collectedBy: 'Officer Khan', location: 'Sidewalk', custodian: 'Evidence Locker B', status: 'collected' },
            { id: 'EV004', reportId: 'CR2025-003', description: 'Surveillance footage (USB)', collectedOn: '2025-04-29', collectedBy: 'Officer Sharma', location: 'Street Corner Camera', custodian: 'IT Dept', status: 'analyzed' },
        ];

        const evidenceTableBody = document.getElementById('evidenceTableBody');
        const noEvidenceElement = document.getElementById('noEvidence');
        const evidenceModal = document.getElementById('evidenceModal');
        const modalForm = document.getElementById('evidenceForm');
        const modalEvidenceIdInput = document.getElementById('modalEvidenceId');
        const modalReportIdInput = document.getElementById('modalReportId');
        const modalItemDescriptionInput = document.getElementById('modalItemDescription');
        const modalCollectedOnInput = document.getElementById('modalCollectedOn');
        const modalCollectedByInput = document.getElementById('modalCollectedBy');
        const modalLocationCollectedInput = document.getElementById('modalLocationCollected');
        const modalCurrentCustodianInput = document.getElementById('modalCurrentCustodian');
        const modalStatusSelect = document.getElementById('modalStatus');

        let currentEvidence = [...evidenceData]; // Copy of the data for filtering

        function renderEvidenceTable(data) {
            evidenceTableBody.innerHTML = '';
            if (data.length === 0) {
                noEvidenceElement.style.display = 'block';
                return;
            }
            noEvidenceElement.style.display = 'none';
            data.forEach(evidence => {
                const row = evidenceTableBody.insertRow();
                row.insertCell().textContent = evidence.id;
                row.insertCell().textContent = evidence.reportId;
                row.insertCell().textContent = evidence.description;
                row.insertCell().textContent = evidence.collectedOn;
                row.insertCell().textContent = evidence.collectedBy;
                row.insertCell().textContent = evidence.location;
                row.insertCell().textContent = evidence.custodian;
                row.insertCell().textContent = evidence.status;
                const actionsCell = row.insertCell();
                actionsCell.classList.add('action-buttons');
                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.onclick = () => openEditEvidenceModal(evidence.id);
                actionsCell.appendChild(editButton);
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Delete';
                deleteButton.onclick = () => deleteEvidence(evidence.id);
                actionsCell.appendChild(deleteButton);
            });
        }

        function filterEvidence() {
            const evidenceId = document.getElementById('evidenceId').value.toLowerCase();
            const reportId = document.getElementById('reportId').value.toLowerCase();
            const description = document.getElementById('itemDescription').value.toLowerCase();
            const collectedBy = document.getElementById('collectedBy').value.toLowerCase();
            const status = document.getElementById('status').value;

            const filteredData = currentEvidence.filter(evidence =>
                evidence.id.toLowerCase().includes(evidenceId) &&
                evidence.reportId.toLowerCase().includes(reportId) &&
                evidence.description.toLowerCase().includes(description) &&
                evidence.collectedBy.toLowerCase().includes(collectedBy) &&
                (status === '' || evidence.status === status)
            );
            renderEvidenceTable(filteredData);
        }

        function openAddEvidenceModal() {
            modalForm.reset();
            modalEvidenceIdInput.value = ''; // Ensure it's empty for adding
            document.querySelector("#evidenceModal h2").textContent = "Add New Evidence";
            evidenceModal.style.display = "block";
        }

        function openEditEvidenceModal(evidenceId) {
            const evidenceToEdit = currentEvidence.find(e => e.id === evidenceId);
            if (evidenceToEdit) {
                document.querySelector("#evidenceModal h2").textContent = "Edit Evidence";
                modalEvidenceIdInput.value = evidenceToEdit.id;
                modalReportIdInput.value = evidenceToEdit.reportId;
                modalItemDescriptionInput.value = evidenceToEdit.description;
                modalCollectedOnInput.value = evidenceToEdit.collectedOn;
                modalCollectedByInput.value = evidenceToEdit.collectedBy;
                modalLocationCollectedInput.value = evidenceToEdit.location || '';
                modalCurrentCustodianInput.value = evidenceToEdit.custodian || '';
                modalStatusSelect.value = evidenceToEdit.status;
                evidenceModal.style.display = "block";
            }
        }

        function closeEvidenceModal() {
            evidenceModal.style.display = "none";
        }

        modalForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const isEdit = modalEvidenceIdInput.value !== '';
            const newEvidence = {
                id: isEdit ? modalEvidenceIdInput.value : EV${Date.now().toString().slice(-5)}, // Simple ID generation
                reportId: modalReportIdInput.value,
                description: modalItemDescriptionInput.value,