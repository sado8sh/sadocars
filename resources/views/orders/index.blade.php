<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - Car Shop</title> {{-- Changed title --}}
    {{-- Link your CSS files here --}}
    <link rel="stylesheet" href="/css/index.css"> {{-- Example, use your actual CSS links --}}
    <link rel="stylesheet" href="/css/nav.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        /* Your existing CSS for the confirmation-container, etc. */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #000000; /* Black background */
            color: #ffffff; /* White text */
            margin: 0;
            padding: 20px;
        }

        .confirmation-container { /* Renamed for clarity, but keeping for now based on your CSS */
            max-width: 800px;
            margin: 20px auto; /* Added margin-top */
            background-color: #1a1a1a; /* Dark gray background */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 223, 0, 0.5); /* Yellow shadow */
        }

         .page-title {
             text-align: center;
             color: #ffdf00; /* Yellow */
             margin-bottom: 30px;
         }

        .order-item-summary { /* New class for individual order display */
            display: flex;
            align-items: center;
            background-color: #262626; /* Darker gray */
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px; /* Space between orders */
            justify-content: space-between; /* Space out content */
        }

        .order-image {
             width: 100px; /* Adjusted size for list view */
             height: auto;
             border-radius: 8px;
             margin-right: 20px;
             flex-shrink: 0; /* Prevent image from shrinking */
        }

        .order-info {
            flex-grow: 1; /* Allow info to take available space */
        }

        .order-info h3 {
            margin: 0 0 5px 0; /* Adjusted margin */
            color: #ffdf00; /* Yellow */
        }

        .order-info p {
            margin: 5px 0;
            color: #cccccc; /* Light gray */
        }

        .no-orders-message {
            text-align: center;
            color: #cccccc;
            font-size: 1.2em;
            padding: 40px 0;
        }

         /* Add styles for the button if you keep it */
        /* .print-button { display: none; } */ /* Hide print button on index page */

         @media print {
            /* Hide elements not needed for printing */
            .print-button, .page-title, .confirmation-footer {
                display: none !important;
            }
             /* Adjust styles for print */
             body { background-color: #ffffff !important; color: #000000 !important; }
             .confirmation-container, .order-item-summary {
                 background-color: #ffffff !important;
                 box-shadow: none !important;
                 border: 1px solid #ccc; /* Add border for clarity */
                 margin-bottom: 15px;
             }
             .order-info h3, .order-info p { color: #000000 !important; }
        }
    </style>
</head>
<body>
    @include('partials.nav') {{-- Include your navigation --}}

    <div class="confirmation-container"> {{-- Keeping this class name for now --}}
        <h1 class="page-title">My Orders</h1>

        @if($orders->isEmpty())
            {{-- Display message if no orders exist --}}
            <p class="no-orders-message">You have no orders yet.</p>
        @else
            {{-- Loop through each order and display its summary --}}
            @foreach($orders as $order)
                <div class="order-item-summary">
                     {{-- Display Car Image Dynamically --}}
                    <img src="{{ Storage::url($order->car->main_image ?? 'images/default-car.jpg') }}" alt="{{ $order->car->brand ?? 'Car' }} {{ $order->car->model ?? 'Model' }}" class="order-image">

                    <div class="order-info">
                        {{-- Display Car Brand and Model --}}
                        <h3>{{ $order->car->brand ?? 'N/A' }} {{ $order->car->model ?? 'N/A' }}</h3>
                        {{-- Display Order Details --}}
                        <p><strong>Order Date:</strong> {{ $order->created_at ? $order->created_at->format('Y-m-d') : 'N/A' }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($order->status) ?? 'N/A' }}</p>
                        <p><strong>Total Amount:</strong> ${{ number_format($order->price, 2) ?? 'N/A' }}</p>

                        {{-- Links and Actions Section --}}
                        <div style="margin-top: 10px;">
                            {{-- View Details Link (already added) --}}
                            <a href="{{ route('orders.show', $order) }}" style="color: #ffdf00; text-decoration: underline; margin-right: 15px;">View Details</a>

                            {{-- Delete Button Form --}}
                            {{-- Check if the order status allows deletion (e.g., pending or canceled) --}}
                            {{-- You might want to add more specific conditions based on your business logic --}}
                            {{-- For simplicity, we'll allow deletion if status is 'pending' --}}
                            @if($order->status === 'pending')
                                <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this order?');">
                                    @csrf
                                    @method('DELETE') {{-- This spoofs the DELETE method --}}
                                    <button type="submit" style="color: #ff0000; background: none; border: none; cursor: pointer; text-decoration: underline; padding: 0;">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        {{-- Keeping footer section, adjust as needed for index page --}}
        <div class="confirmation-footer">
            <p>If you have any questions, contact us at <a href="mailto:sadocars@gmail.com">sadocars@gmail.com</a>.</p>
             {{-- Removed print button as it's for a single order --}}
            {{-- <button class="print-button" onclick="printConfirmation()">Print Confirmation</button> --}}
        </div>
    </div>

    @include('partials.footer') {{-- Include your footer --}}

</body>
{{-- Include your JavaScript files here --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
<script src="/js/index.js"></script>
<script>
    // You might not need the printConfirmation function anymore if removing the button
    // function printConfirmation() {
    //     window.print();
    // }
    AOS.init(); // Initialize AOS if used on this page
</script>
</html> 