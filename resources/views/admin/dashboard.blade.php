<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #1a1a1a;
            color: #ffffff;
        }

        /* Navbar Styles */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2d2d2d;
            padding: 10px 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        nav h1 {
            margin: 0;
            color: #ffcc00;
            font-size: 1.5em;
        }

        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 20px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: #ffcc00;
            text-decoration: none;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #ffcc00;
            color: #1a1a1a;
        }

        /* Content Styles */
        p {
            padding: 20px;
            text-align: center;
            font-size: 1.2em;
        }

        h2 {
            color: #ffcc00;
            margin-top: 20px;
            padding-left: 20px;
        }

        /* Hidden Sections */
        .hidden {
            display: none;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            nav {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }

            nav ul li {
                display: block;
            }
        }
    </style>
</head>
<body>
    <nav>
        <h1>Admin Dashboard</h1>
        <ul>
            <li><a href="#cars" onclick="showSection('cars')">Cars</a></li>
            <li><a href="#users" onclick="showSection('users')">Users</a></li>
        </ul>
    </nav>
    <p>Welcome to the admin dashboard</p>
    
    <div id='cars' class="hidden">
        <h2>Cars Management</h2>
        @include('partials.cars')
    </div>
    <div id='users' class="hidden">
        <h2>Users Management</h2>
        @include('partials.users')
    </div>

    <script>
        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('div[id]').forEach(div => {
                div.classList.add('hidden');
            });

            // Show the selected section
            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.remove('hidden');
            }

            // Prevent default link behavior
            return false;
        }
    </script>
</body>
</html>