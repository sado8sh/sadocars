<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sado Cars</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <!-- Left Side: Form -->
        <div class="form-container">
            <div class="form-header">
                <h1>Welcome Back to Sado Cars</h1>
                <p>Rev up your experience log in now and hit the road to unbeatable car deals!</p>
            </div>

            <!-- Step 1: Personal Information -->
            <form id="multi-step-form" action="" method="POST">
                @csrf
                <div class="form-step active">
                    <h2>Personal Information</h2>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <p>If you don't have an account click here 👉🏻 <a class="signin" href="/signup">Sign up</a></p>
                    <button type="submit" class="submit-button">Submit</button>
                </div>
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="image-container">
        </div>
    </div>
</body>
</html>