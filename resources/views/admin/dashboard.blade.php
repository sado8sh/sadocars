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

        /* Added style for the logout button to look like a link */
        nav ul li form button {
            color: #ffcc00; /* Match link color */
            background: none; /* No background */
            border: none; /* No border */
            cursor: pointer; /* Pointer cursor on hover */
            text-decoration: none; /* No underline by default */
            font-weight: bold; /* Match link weight */
            padding: 5px 10px; /* Match link padding */
            border-radius: 5px; /* Match link border radius */
            transition: background-color 0.3s ease, color 0.3s ease; /* Add transition */
        }

         nav ul li form button:hover {
             background-color: #ffcc00; /* Match link hover background */
             color: #1a1a1a; /* Match link hover color */
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

        .dashboard-content { /* Added wrapper for section content */
            padding: 20px;
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
             /* Adjust button style for responsive nav if needed */
             nav ul li form button {
                 padding: 10px; /* Adjust padding for block display */
                 width: 100%; /* Make button full width */
                 text-align: left; /* Align text left */
             }
        }

        /* Add new styles for the users section */
        .users-container {
            padding: 20px;
            background: #1a1d21;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .users-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 2px solid #2d3238;
        }

        .users-title {
            font-size: 1.5rem;
            color: #fff;
            font-weight: 600;
        }

        .users-count {
            background: #2d3238;
            padding: 8px 16px;
            border-radius: 20px;
            color: #fff;
            font-size: 0.9rem;
        }

        .user-card {
            background: #2d3238;
            border-radius: 10px;
            margin-bottom: 20px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            border: 1px solid #3a3f45;
        }

        .user-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .user-content {
            display: grid;
            grid-template-columns: auto 1fr auto;
            gap: 20px;
            padding: 20px;
            align-items: center;
        }

        .user-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #3a3f45;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.5rem;
            font-weight: 600;
            border: 2px solid #4a4f55;
        }

        .user-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .detail-label {
            color: #8b8f94;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            color: #fff;
            font-size: 1rem;
            font-weight: 500;
        }

        .user-role {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            text-align: center;
            min-width: 100px;
        }

        .role-admin { 
            background: #8e44ad; 
            color: #fff; 
        }

        .role-user { 
            background: #2c3e50; 
            color: #ecf0f1; 
        }

        .user-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .btn-view {
            background: #3498db;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s ease;
        }

        .btn-view:hover {
            background: #2980b9;
        }

        .btn-delete {
            background: #e74c3c;
            color: #fff;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-delete:hover {
            background: #c0392b;
        }

        .no-users {
            text-align: center;
            padding: 40px;
            background: #2d3238;
            border-radius: 10px;
            color: #8b8f94;
            font-size: 1.1rem;
        }

        @media (max-width: 768px) {
            .user-content {
                grid-template-columns: 1fr;
            }

            .user-avatar {
                margin: 0 auto;
            }

            .user-details {
                grid-template-columns: 1fr;
            }

            .user-actions {
                justify-content: flex-start;
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
            <li><a href="#orders" onclick="showSection('orders')">Orders</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    <p id="welcome-message">Welcome to the admin dashboard</p>
    
    <div class="dashboard-content">
        <div id='cars' class="hidden">
            <h2>Cars Management</h2>
            @include('partials.cars')
        </div>
        <div id='users' class="hidden">
            <div class="users-container">
                <div class="users-header">
                    <h2 class="users-title">Users Management</h2>
                    <div class="users-count">Total Users: {{ $users->count() }}</div>
                </div>

                @if($users->isEmpty())
                    <div class="no-users">
                        <p>No users found.</p>
                    </div>
                @else
                    @foreach($users as $user)
                        <div class="user-card">
                            <div class="user-content">
                                <div class="user-avatar">
                                    {{ strtoupper(substr($user->name ?? $user->email, 0, 1)) }}
                                </div>

                                <div class="user-details">
                                    <div class="detail-item">
                                        <span class="detail-label">Name</span>
                                        <span class="detail-value">{{ $user->name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Email</span>
                                        <span class="detail-value">{{ $user->email }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">First Name</span>
                                        <span class="detail-value">{{ $user->userInfo->first_name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Last Name</span>
                                        <span class="detail-value">{{ $user->userInfo->last_name ?? 'N/A' }}</span>
                                    </div>
                                    <div class="detail-item">
                                        <span class="detail-label">Phone</span>
                                        <span class="detail-value">{{ $user->userInfo->phone ?? 'Not provided' }}</span>
                                    </div>
                                </div>

                                <div class="user-actions">
                                    <div class="user-role role-{{ strtolower($user->role ?? 'user') }}">
                                        {{ ucfirst($user->role ?? 'user') }}
                                    </div>
                                    @if($user->role !== 'admin')
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-delete" 
                                                    onclick="return confirm('Are you sure you want to delete this user?')">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div id='orders' class="hidden">
            <h2>Orders Management</h2>
            @include('partials.admin.orders', ['orders' => $orders])
        </div>
    </div>

    <script>
        function showSection(sectionId) {
            const welcomeMessage = document.getElementById('welcome-message');
            if(welcomeMessage) {
                welcomeMessage.classList.add('hidden');
            }

            document.querySelectorAll('.dashboard-content > div').forEach(div => {
                div.classList.add('hidden');
            });

            const section = document.getElementById(sectionId);
            if (section) {
                section.classList.remove('hidden');
            }

            return false;
        }
    </script>
</body>
</html>