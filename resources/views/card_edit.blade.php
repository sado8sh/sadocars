<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Card</title>
    <!-- Add your CSS stylesheets here -->
</head>
<body>
    <h1>Edit Card Information</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('updateCard') }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" value="{{ $card->card_number ?? '' }}" required>
        </div>

        <div>
            <label for="card_holder">Card Holder:</label>
            <input type="text" id="card_holder" name="card_holder" value="{{ $card->card_holder ?? '' }}" required>
        </div>

        <div>
            <label for="expiry_date">Expiry Date:</label>
            <input type="date" id="expiry_date" name="expiry_date" value="{{ $card->expiry_date ?? '' }}" required>
        </div>

        <div>
            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" value="{{ $card->cvv ?? '' }}" required>
        </div>

        <button type="submit">Update Card</button>
    </form>

    <a href="{{ route('profile') }}">Back to Profile</a>
</body>
</html>