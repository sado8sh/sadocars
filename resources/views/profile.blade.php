<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/nav.css">
    <style>
        body {
            background: #0f172a;
            color: #fff;
            font-family: 'Inter', sans-serif;
        }

        #nav {
            background-color: #000;
        }

        .profile-page {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .profile-header {
            background: #1e293b;
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .profile-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 120px;
            background: linear-gradient(45deg, #3b82f6, #8b5cf6);
            z-index: 0;
        }

        .profile-content {
            position: relative;
            z-index: 1;
            display: flex;
            align-items: flex-end;
            gap: 30px;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #1e293b;
            border: 4px solid #1e293b;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: #fff;
            text-transform: uppercase;
            margin-top: -60px;
        }

        .profile-info {
            flex: 1;
        }

        .profile-name {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 0 0 5px 0;
            color: #fff;
        }

        .profile-email {
            color: #94a3b8;
            font-size: 1rem;
        }

        .profile-sections {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        .profile-card {
            background: #1e293b;
            border-radius: 16px;
            padding: 25px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #fff;
            margin: 0 0 20px 0;
            padding-bottom: 15px;
            border-bottom: 1px solid #334155;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .info-label {
            color: #94a3b8;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #fff;
            font-size: 1rem;
        }

        .profile-actions {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 0.9rem;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn-edit {
            background: #3b82f6;
            color: #fff;
        }

        .btn-edit:hover {
            background: #2563eb;
        }

        .btn-logout {
            background: #ef4444;
            color: #fff;
        }

        .btn-logout:hover {
            background: #dc2626;
        }

        /* Form Styles */
        .profile-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            color: #94a3b8;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #334155;
            background: #1e293b;
            color: #fff;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.1);
        }

        .alert {
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .alert-success {
            background: #10b981;
            color: #fff;
        }

        @media (max-width: 768px) {
            .profile-sections {
                grid-template-columns: 1fr;
            }

            .profile-content {
                flex-direction: column;
                align-items: center;
                text-align: center;
            }

            .profile-avatar {
                margin-top: -80px;
            }

            .profile-actions {
                justify-content: center;
            }
        }
    </style>
</head>

<div id="nav">@include('partials.nav')</div>

<div class="profile-page">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="profile-header">
        <div class="profile-content">
            <div class="profile-avatar">
                {{ substr($user->email, 0, 1) }}
            </div>
            <div class="profile-info">
                <h1 class="profile-name">
                    {{ $userInfo ? $userInfo->first_name . ' ' . $userInfo->last_name : 'Complete Your Profile' }}
                </h1>
                <p class="profile-email">{{ $user->email }}</p>
            </div>
        </div>
    </div>

    <div class="profile-sections">
        <div class="profile-card">
            <h2 class="card-title">Personal Information</h2>
            @if(!$userInfo)
                <form action="{{ route('profile.store') }}" method="POST" class="profile-form">
                    @csrf
                    <div class="form-group">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="state" class="form-label">State</label>
                        <input type="text" name="state" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="zip" class="form-label">ZIP Code</label>
                        <input type="text" name="zip" class="form-control">
                    </div>
                    <div class="form-group" style="grid-column: 1 / -1;">
                        <button type="submit" class="btn btn-edit">Save Profile</button>
                    </div>
                </form>
            @else
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">First Name</span>
                        <span class="info-value">{{ $userInfo->first_name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Last Name</span>
                        <span class="info-value">{{ $userInfo->last_name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Phone</span>
                        <span class="info-value">{{ $userInfo->phone ?? 'Not provided' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">Address</span>
                        <span class="info-value">{{ $userInfo->address ?? 'Not provided' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">City</span>
                        <span class="info-value">{{ $userInfo->city ?? 'Not provided' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">State</span>
                        <span class="info-value">{{ $userInfo->state ?? 'Not provided' }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">ZIP Code</span>
                        <span class="info-value">{{ $userInfo->zip ?? 'Not provided' }}</span>
                    </div>
                </div>
            @endif
        </div>

        <div class="profile-card">
            <h2 class="card-title">Account Actions</h2>
            <div class="profile-actions">
                @if($userInfo)
                    <a href="{{ route('profile.edit') }}" class="btn btn-edit">
                        <i class='bx bx-edit'></i> Edit Profile
                    </a>
                @endif
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class='bx bx-log-out'></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="js/index.js"></script>