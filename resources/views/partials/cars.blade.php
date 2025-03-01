<style>
    /* General Styling */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 20px;
        background-color: #1a1a1a; /* Dark background */
        color: #e6e6e6; /* Light text for contrast */
    }
    
    h1 {
        color: #ffcc00; /* Yellow heading */
    }
    
    .btn-add {
        display: inline-block;
        padding: 10px 20px;
        background-color: #ffcc00; /* Yellow button */
        color: #1a1a1a; /* Dark text */
        text-decoration: none;
        border-radius: 5px;
        margin-bottom: 20px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    
    .btn-add:hover {
        background-color: #e6b800; /* Darker yellow on hover */
    }
    
    /* Carousel Container */
    .carousel-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }
    
    /* Cards Container */
    .cards-container {
        display: flex;
        overflow-x: auto;
        scroll-behavior: smooth;
        gap: 20px;
        padding: 20px 0;
        width: 80%;
        margin: 0 auto;
    }
    
    /* Individual Card Styling */
    .card {
        flex: 0 0 auto;
        width: 300px;
        background-color: #333; /* Dark card background */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
    
    .card-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    
    .card-content {
        padding: 15px;
    }
    
    .card-content h2 {
        margin: 0 0 10px;
        font-size: 1.5em;
        color: #ffcc00; /* Yellow heading */
    }
    
    .card-content p {
        margin: 5px 0;
        color: #e6e6e6; /* Light text */
    }
    
    .btn-update {
        display: inline-block;
        padding: 8px 16px;
        background-color: #ffcc00; /* Yellow button */
        color: #1a1a1a; /* Dark text */
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        font-weight: bold;
        transition: background-color 0.3s ease;
    }
    
    .btn-update:hover {
        background-color: #e6b800; /* Darker yellow on hover */
    }
    
    /* Navigation Buttons */
    .nav-button {
        background-color: rgba(255, 204, 0, 0.8); /* Semi-transparent yellow */
        color: #1a1a1a; /* Dark text */
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 50%;
        font-size: 1.5em;
        z-index: 1;
        transition: background-color 0.3s ease;
    }
    
    .nav-button:hover {
        background-color: rgba(255, 204, 0, 1); /* Solid yellow on hover */
    }
    
    .prev-button {
        position: absolute;
        left: 10px;
    }
    
    .next-button {
        position: absolute;
        right: 10px;
    }
    </style>
    <a href="/cars/create" class="btn-add">Add a Car</a>
    
    <div class="carousel-container">
        <button class="nav-button prev-button">&lt;</button>
        <div class="cards-container">
            <?php $cars = DB::table('table_cars')->get(); ?>
            @foreach ($cars as $car)
            <a href="{{ route('car.show', ['id' => $car->id]) }}" class="card-link">
                <div class="card">
                    <img src="{{ Storage::url($car->main_image) }}" alt="{{ $car->brand }} {{ $car->model }}" class="card-image">
                    <div class="card-content">
                        <h2>{{ $car->brand }} {{ $car->model }}</h2>
                        <p>Category: {{ $car->category }}</p>
                        <p>Price: ${{ $car->price }}</p>
                        <a href="/cars/{{$car->id}}/edit" class="btn-update">Update the Car</a>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <button class="nav-button next-button">&gt;</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const cardsContainer = document.querySelector('.cards-container');
        const prevButton = document.querySelector('.prev-button');
        const nextButton = document.querySelector('.next-button');
    
        prevButton.addEventListener('click', () => {
            cardsContainer.scrollBy({
                left: -300, // Adjust this value based on card width + gap
                behavior: 'smooth'
            });
        });
    
        nextButton.addEventListener('click', () => {
            cardsContainer.scrollBy({
                left: 300, // Adjust this value based on card width + gap
                behavior: 'smooth'
            });
        });
    });
    </script>