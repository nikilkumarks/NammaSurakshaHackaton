<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Glossary of Terms - Crime Reporting System</title>
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
            max-width: 800px;
            margin-top: 20px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        .search-bar {
            margin-bottom: 20px;
            width: 100%;
            display: flex;
        }

        .search-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px 0 0 5px;
            font-size: 1em;
        }

        .search-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease;
        }

        .search-button:hover {
            background-color: #2980b9;
        }

        .glossary-list {
            padding: 0;
            list-style: none;
        }

        .glossary-item {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .glossary-item:last-child {
            border-bottom: none;
        }

        .term {
            font-weight: bold;
            color: #34495e;
            margin-bottom: 5px;
            font-size: 1.1em;
        }

        .definition {
            color: #555;
            line-height: 1.6;
        }

        .category-title {
            color: #777;
            font-style: italic;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 1px dashed #ccc;
            padding-bottom: 5px;
        }

        .no-results {
            color: #777;
            text-align: center;
            padding: 20px;
        }

        .google-search-link {
            color: #1a0dab;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6i3ntEYZoC5TD0DDAUM43iIKY0SbKU91ZJA&s" alt="Karnataka Police Logo" class="logo">
    <div class="container">
        <h1>Glossary of Terms</h1>
        <p>This page provides definitions for terms, codes, and abbreviations used within the Crime Reporting System. If a term is not found, you can search Google.</p>

        <div class="search-bar">
            <input type="text" id="searchInput" class="search-input" placeholder="Search for a term">
            <button class="search-button" onclick="searchGlossary()">Search</button>
        </div>

        <div id="glossary">
            <h2 class="category-title">Crime Codes</h2>
            <ul class="glossary-list">
                <li class="glossary-item">
                    <div class="term">IPC 379</div>
                    <div class="definition">Indian Penal Code, Section 379: Punishment for theft.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">IPC 302</div>
                    <div class="definition">Indian Penal Code, Section 302: Punishment for murder.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">POCSO Act</div>
                    <div class="definition">Protection of Children from Sexual Offences Act, 2012.</div>
                </li>
            </ul>

            <h2 class="category-title">Department Units</h2>
            <ul class="glossary-list">
                <li class="glossary-item">
                    <div class="term">CID</div>
                    <div class="definition">Criminal Investigation Department.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">EOW</div>
                    <div class="definition">Economic Offences Wing.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">Cyber Cell</div>
                    <div class="definition">Specialized unit dealing with cybercrime.</div>
                </li>
            </ul>

            <h2 class="category-title">Data Fields</h2>
            <ul class="glossary-list">
                <li class="glossary-item">
                    <div class="term">FIR Number</div>
                    <div class="definition">First Information Report number: A unique identification number assigned to a reported crime.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">IO</div>
                    <div class="definition">Investigating Officer: The police officer assigned to investigate a particular case.</div>
                </li>
                <li class="glossary-item">
                    <div class="term">GPS Coordinates</div>
                    <div class="definition">Geographic Positioning System coordinates: Latitude and longitude values indicating a specific location.</div>
                </li>
            </ul>

            <p id="noResults" class="no-results" style="display: none;">Please Click here <a id="googleSearchLink" href="#" target="_blank" class="google-search-link">Search on Google</a></p>
        </div>
    </div>

    <script>
    const glossaryTerms = [
        { term: 'IPC 379', definition: 'Indian Penal Code, Section 379: Punishment for theft.', category: 'Crime Codes' },
        { term: 'IPC 302', definition: 'Indian Penal Code, Section 302: Punishment for murder.', category: 'Crime Codes' },
        { term: 'POCSO Act', definition: 'Protection of Children from Sexual Offences Act, 2012.', category: 'Crime Codes' },
        { term: 'CID', definition: 'Criminal Investigation Department.', category: 'Department Units' },
        { term: 'EOW', definition: 'Economic Offences Wing.', category: 'Department Units' },
        { term: 'Cyber Cell', definition: 'Specialized unit dealing with cybercrime.', category: 'Department Units' },
        { term: 'FIR Number', definition: 'First Information Report number: A unique identification number assigned to a reported crime.', category: 'Data Fields' },
        { term: 'IO', definition: 'Investigating Officer: The police officer assigned to investigate a particular case.', category: 'Data Fields' },
        { term: 'GPS Coordinates', definition: 'Geographic Positioning System coordinates: Latitude and longitude values indicating a specific location.', category: 'Data Fields' }
    ];

    const glossaryDiv = document.getElementById('glossary');
    const searchInput = document.getElementById('searchInput');
    const noResults = document.getElementById('noResults');
    const googleSearchLink = document.getElementById('googleSearchLink');

    function displayGlossary(terms) {
        glossaryDiv.innerHTML = '';

        const categorizedTerms = {};
        terms.forEach(item => {
            if (!categorizedTerms[item.category]) {
                categorizedTerms[item.category] = [];
            }
            categorizedTerms[item.category].push(item);
        });

        let foundResults = false;

        for (const category in categorizedTerms) {
            foundResults = true;
            const categoryTitle = document.createElement('h2');
            categoryTitle.classList.add('category-title');
            categoryTitle.textContent = category;

            const ul = document.createElement('ul');
            ul.classList.add('glossary-list');

            categorizedTerms[category].forEach(termItem => {
                const li = document.createElement('li');
                li.classList.add('glossary-item');
                li.innerHTML = `<div class="term">${termItem.term}</div><div class="definition">${termItem.definition}</div>`;
                ul.appendChild(li);
            });

            glossaryDiv.appendChild(categoryTitle);
            glossaryDiv.appendChild(ul);
        }

        if (!foundResults && searchInput.value.trim() !== "") {
            glossaryDiv.appendChild(noResults);
            noResults.style.display = 'block';
            googleSearchLink.href = `https://www.google.com/search?q=${encodeURIComponent(searchInput.value)}`;
        } else {
            noResults.style.display = '';
        }
    }

    function searchGlossary() {
        const searchTerm = searchInput.value.toLowerCase();
        const results = glossaryTerms.filter(termItem =>
            termItem.term.toLowerCase().includes(searchTerm) || termItem.definition.toLowerCase().includes(searchTerm)
        );
        displayGlossary(results);
    }

    // Initial display
    displayGlossary(glossaryTerms);
</script>

</body>
</html>