<style>
    /* Profile Page Styles */
body {
    background-color: #000000;
}
.profile-page {
    font-family: 'Arial', sans-serif;
    background-color: #000000; /* Black background */
    color: #ffffff; /* White text */
    margin: 0;
    padding: 20px;
}

.profile-page .container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #1a1a1a; /* Dark gray background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 223, 0, 0.5); /* Yellow shadow */
}

.profile-page h2 {
    color: #ffdf00; /* Yellow */
    font-size: 2em;
    margin-bottom: 20px;
    border-bottom: 2px solid #ffdf00; /* Yellow underline */
    padding-bottom: 5px;
}

.profile-page .form-label {
    color: #ffdf00; /* Yellow */
    font-weight: 500;
    margin-bottom: 8px;
    display: block;
}

.profile-page .form-control {
    background-color: #262626; /* Darker gray */
    color: #ffffff; /* White text */
    border: 1px solid #ffdf00; /* Yellow border */
    border-radius: 6px;
    padding: 10px;
    margin-bottom: 15px;
    width: 100%;
    font-size: 14px;
    transition: border-color 0.3s ease;
}

.profile-page .form-control:focus {
    border-color: #ffdf00; /* Yellow border on focus */
    outline: none;
    box-shadow: 0 0 0 3px rgba(255, 223, 0, 0.1); /* Subtle yellow focus shadow */
}

.profile-page .btn {
    background-color: #ffdf00; /* Yellow button background */
    color: #000000; /* Black text */
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    cursor: pointer;
    font-weight: 500;
    font-size: 14px;
    transition: background-color 0.3s ease;
}

.profile-page .btn:hover {
    background-color: #e6c200; /* Darker yellow on hover */
}

.profile-page .btn-secondary {
    background-color: #262626; /* Dark gray background for secondary button */
    color: #ffdf00; /* Yellow text */
    border: 1px solid #ffdf00; /* Yellow border */
}

.profile-page .btn-secondary:hover {
    background-color: #333333; /* Slightly lighter gray on hover */
}
</style>
<div class="profile-page">
    <div class="container">
        <h2>Edit Profile</h2>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $userInfo->first_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $userInfo->last_name ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $userInfo->phone ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $userInfo->address ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $userInfo->city ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" name="state" value="{{ old('state', $userInfo->state ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="zip" class="form-label">ZIP Code</label>
                <input type="text" class="form-control" id="zip" name="zip" value="{{ old('zip', $userInfo->zip ?? '') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('profile') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>