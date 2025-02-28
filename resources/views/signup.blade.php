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
                <h1>Welcome to Sado Cars</h1>
                <p>Rev up your experience log in now and hit the road to unbeatable car deals!</p>
            </div>

            <!-- Step 1: Personal Information -->
            <form id="multi-step-form" action="" method="POST">
                @csrf
                <div class="form-step active" id="step-1">
                    <h2>Personal Information</h2>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                    </div>
                    <p>If you already have an account click here 👉🏻 <a class="signin" href="/login">Log in</a></p>
                    <button type="button" class="next-button" onclick="nextStep(2)">Next</button>
                </div>

                <div class="form-step" id="step-2">
                    <h2>Personal Information</h2>
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" id="first-name" name="first_name" placeholder="Enter your first name" required>
                    </div>
                    <div class="form-group">
                        <label for="last-name">Last Name</label>
                        <input type="text" id="last-name" name="last_name" placeholder="Enter your last name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
                    </div>
                    <button type="button" class="next-button" onclick="nextStep(3)">Next</button>
                </div>

                <!-- Step 2: Address Information -->
                <div class="form-step" id="step-3">
                    <h2>Address Information</h2>
                    <div class="form-group">
                        <label for="address">Street Address</label>
                        <input type="text" id="address" name="address" placeholder="123 Main St" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" id="state" name="state" placeholder="State" required>
                    </div>
                    <div class="form-group">
                        <label for="zip">ZIP Code</label>
                        <input type="text" id="zip" name="zip" placeholder="12345" required>
                    </div>
                    <button type="button" class="next-button" onclick="nextStep(4)">Next</button>
                </div>

                <!-- Step 3: Credit Card Information -->
                <div class="form-step" id="step-4">
                    <h2>Credit Card Information</h2>
                    <div class="form-group">
                        <label for="card-number">Card Number</label>
                        <input type="text" id="card-number" name="card_number" placeholder="1234 5678 9012 3456" required>
                    </div>
                    <div class="form-group">
                        <label for="card-holder">Cardholder Name</label>
                        <input type="text" id="card-holder" name="card_holder" placeholder="Card Holder" required>
                    </div>
                    <div class="form-group">
                        <label for="expiry-date">Expiry Date</label>
                        <input type="text" id="expiry-date" name="expiry_date" placeholder="MM/YY" required>
                    </div>
                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" placeholder="123" required>
                    </div>
                    <button type="submit" class="submit-button">Submit</button>
                </div>
            </form>
        </div>

        <!-- Right Side: Image -->
        <div class="image-container">
        </div>
    </div>

    <script>
        function nextStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach((step) => {
                step.classList.remove('active');
            });

            // Show the selected step
            document.getElementById(`step-${step}`).classList.add('active');
        }
    </script>
</body>
</html>