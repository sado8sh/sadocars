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

    /* Responsive Design */
    @media (max-width: 768px) {
        nav {
            flex-direction: column;
            align-items: flex-start;
        }

        nav ul .nav-links{
            flex-direction: column;
            gap: 10px;
        }

        nav ul li {
            display: block;
        }
    }
</style>
<nav>
    <h1>Admin Dashboard</h1>
    <ul class="nav-links">
        <li><a href="#cars">Cars</a></li>
        <li><a href="#users">Users</a></li>
    </ul>
</nav>