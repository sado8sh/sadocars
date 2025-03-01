<head>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/profile.css"> 
</head>
<style>
    #nav {
        background-color: #000;
    }
</style>
<div id="nav">@include('partials.nav')</div>
<div class="profile-page">
    <div class="container">
        <h2>Profile Page</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(!$userInfo)
            <h4>Complete Your Profile</h4>
            <form action="{{ route('profile.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <input type="text" name="state" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="zip" class="form-label">ZIP Code</label>
                    <input type="text" name="zip" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        @else
            <h4>Your Profile Information</h4>
            <ul>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>First Name:</strong> {{ $userInfo->first_name }}</li>
                <li><strong>Last Name:</strong> {{ $userInfo->last_name }}</li>
                <li><strong>Phone:</strong> {{ $userInfo->phone ?? 'Not provided' }}</li>
                <li><strong>Address:</strong> {{ $userInfo->address ?? 'Not provided' }}</li>
                <li><strong>City:</strong> {{ $userInfo->city ?? 'Not provided' }}</li>
                <li><strong>State:</strong> {{ $userInfo->state ?? 'Not provided' }}</li>
                <li><strong>ZIP Code:</strong> {{ $userInfo->zip ?? 'Not provided' }}</li>
            </ul>
            <a href="{{ route('profile.edit') }}" class="btn btn-secondary">Edit Profile</a>
        @endif
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="js/index.js"></script>