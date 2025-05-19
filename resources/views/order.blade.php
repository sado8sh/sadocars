<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Car Shop</title>
</head>
<style>
    body {
    font-family: 'Arial', sans-serif;
    background-color: #000000; /* Black background */
    color: #ffffff; /* White text */
    margin: 0;
    padding: 20px;
}

.confirmation-container {
    max-width: 800px;
    margin: 0 auto;
    background-color: #1a1a1a; /* Dark gray background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(255, 223, 0, 0.5); /* Yellow shadow */
}

.confirmation-header {
    text-align: center;
    margin-bottom: 20px;
}

.confirmation-header h1 {
    color: #ffdf00; /* Yellow */
    font-size: 2.5em;
    margin: 0;
}

.confirmation-header p {
    color: #cccccc; /* Light gray */
}

.order-details, .customer-details, .payment-details {
    margin-bottom: 30px;
}

.order-details h2, .customer-details h2, .payment-details h2 {
    color: #ffdf00; /* Yellow */
    border-bottom: 2px solid #ffdf00;
    padding-bottom: 5px;
    margin-bottom: 15px;
}

.order-summary {
    display: flex;
    align-items: center;
    background-color: #262626; /* Darker gray */
    padding: 15px;
    border-radius: 8px;
}

.order-image {
    width: 150px;
    height: auto;
    border-radius: 8px;
    margin-right: 20px;
}

.order-info h3 {
    margin: 0;
    color: #ffdf00; /* Yellow */
}

.order-info p {
    margin: 5px 0;
    color: #cccccc; /* Light gray */
}

.confirmation-footer {
    text-align: center;
    margin-top: 20px;
}

.confirmation-footer a {
    color: #ffdf00; /* Yellow */
    text-decoration: none;
}

.confirmation-footer a:hover {
    text-decoration: underline;
}

.print-button {
    background-color: #ffdf00; /* Yellow */
    color: #000000; /* Black */
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    margin-top: 10px;
}

.print-button:hover {
    background-color: #e6c200; /* Darker yellow */
}
@media print {
    /* Hide the print button when printing */
    .print-button {
        display: none;
    }

    /* Adjust background and text colors for better print readability */
    body {
        background-color: #ffffff !important;
        color: #000000 !important;
    }

    .confirmation-container {
        background-color: #ffffff !important;
        box-shadow: none !important;
    }

    .confirmation-header h1, .order-details h2, .customer-details h2, .payment-details h2 {
        color: #000000 !important;
        border-bottom: 2px solid #000000 !important;
    }

    .order-info h3 {
        color: #000000 !important;
    }

    .order-info p {
        color: #000000 !important;
    }

    .confirmation-footer a {
        color: #000000 !important;
    }
}
</style>
<body>
    <div class="confirmation-container">
        <div class="confirmation-header">
            <h1>Order Confirmation</h1>
            <p>Thank you for your purchase! Here are your order details.</p>
        </div>

        <div class="order-details">
            <h2>Your Order</h2>
            <div class="order-summary">
                <div class="order-item">
                    <img src="{{ Storage::url($order->car->main_image ?? 'images/default-car.jpg') }}" alt="{{ $order->car->brand ?? 'Car' }} {{ $order->car->model ?? 'Model' }}" class="order-image">
                    <div class="order-info">
                        <h3>{{ $order->car->brand ?? 'N/A' }} {{ $order->car->model ?? 'N/A' }}</h3>
                        <p><strong>Category:</strong> {{ $order->car->category }}</p>
                        <p><strong>Price:</strong> ${{ number_format($order->price, 2) ?? 'N/A' }}</p>
                        <p><strong>Delivery Date:</strong> October 25, 2023</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="customer-details">
            <h2>Customer Information</h2>
            <p><strong>Name:</strong> {{ $order->user->userInfo->first_name ?? $order->user->name ?? 'N/A' }} {{ $order->user->userInfo->last_name ?? '' }}</p>
            <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $order->user->userInfo->phone ?? 'N/A' }}</p>
            <p><strong>Shipping Address:</strong> 
                 {{ $order->user->userInfo->address ?? 'N/A' }}, 
                 {{ $order->user->userInfo->city ?? '' }}, 
                 {{ $order->user->userInfo->state ?? '' }}, 
                 {{ $order->user->userInfo->zip ?? '' }}
            </p>
        </div>

        <div class="payment-details">
            <h2>Payment Information</h2>
            <p><strong>Payment Method:</strong> Credit Card (**** **** **** 1234)</p>
            <p><strong>Total Amount:</strong> ${{ number_format($order->price, 2) ?? 'N/A' }}</p>
            <p><strong>Payment Status:</strong> Pending</p>
        </div>

        <div class="confirmation-footer">
            <p>If you have any questions, contact us at <a href="mailto:sadocars@gmail.com">sadocars@gmail.com</a>.</p>
            <button class="print-button" onclick="printConfirmation()">Print Confirmation</button>
        </div>
    </div>
</body>
<script>
    function printConfirmation() {
        window.print();
    }
</script>
</html>