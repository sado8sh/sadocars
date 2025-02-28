<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    margin: 20px 0;
    color: #f9d342;
}

.sports-cars {
    padding: 20px;
}

.cards-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.card {
    border: 1px solid #f9d342;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 300px;
    text-align: center;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: scale(1.05);
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
    font-size: 20px;
    margin-bottom: 10px;
    color:#f9d342;
}

.card-content p {
    margin: 5px 0;
    color: #fff;
}

</style>
<section class="sports-cars">
    <h1>{{$category['title']}} Cars</h1>
    <div class="cards-container">
        @foreach ($cars as $car)
        <a href="{{ route('car.show', ['id' => $car->id]) }}">
            <div class="card">
                <img src="{{ Storage::url($car->main_image) }}" alt="{{ $car->brand }} {{ $car->model }}" class="card-image">
                <div class="card-content">
                    <h2>{{ $car->brand }} {{ $car->model }}</h2>
                    <p>Category: {{ $car->category }}</p>
                    <p>Price: ${{ $car->price }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>