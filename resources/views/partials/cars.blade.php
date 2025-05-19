<style>
    .cars-container {
        padding: 20px;
        background: #1a1d21;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .cars-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #2d3238;
    }

    .cars-title {
        font-size: 1.5rem;
        color: #fff;
        font-weight: 600;
    }

    .btn-add {
        background: #27ae60;
        color: #fff;
        padding: 10px 20px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .btn-add:hover {
        background: #219a52;
    }

    .cars-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .car-card {
        background: #2d3238;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid #3a3f45;
    }

    .car-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .car-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #3a3f45;
    }

    .car-content {
        padding: 20px;
    }

    .car-title {
        font-size: 1.2rem;
        color: #fff;
        margin: 0 0 10px 0;
        font-weight: 600;
    }

    .car-details {
        display: grid;
        gap: 8px;
        margin-bottom: 15px;
    }

    .car-detail {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .detail-label {
        color: #8b8f94;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        color: #fff;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .car-actions {
        display: flex;
        gap: 10px;
        margin-top: 15px;
    }

    .btn-view {
        background: #3498db;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.2s ease;
        flex: 1;
        text-align: center;
    }

    .btn-view:hover {
        background: #2980b9;
    }

    .btn-update {
        background: #f1c40f;
        color: #2c3e50;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.2s ease;
        flex: 1;
        text-align: center;
    }

    .btn-update:hover {
        background: #f39c12;
    }

    .no-cars {
        text-align: center;
        padding: 40px;
        background: #2d3238;
        border-radius: 10px;
        color: #8b8f94;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        .cars-grid {
            grid-template-columns: 1fr;
        }

        .car-card {
            max-width: 100%;
        }
    }
</style>

<div class="cars-container">
    <div class="cars-header">
        <h2 class="cars-title">Cars Management</h2>
        <a href="/cars/create" class="btn-add">
            <i class="fas fa-plus"></i> Add New Car
        </a>
    </div>

    @if($cars->isEmpty())
        <div class="no-cars">
            <p>No cars found.</p>
        </div>
    @else
        <div class="cars-grid">
            @foreach($cars as $car)
                <div class="car-card">
                    <img src="{{ Storage::url($car->main_image) }}" 
                         alt="{{ $car->brand }} {{ $car->model }}" 
                         class="car-image">

                    <div class="car-content">
                        <h3 class="car-title">{{ $car->brand }} {{ $car->model }}</h3>
                        
                        <div class="car-details">
                            <div class="car-detail">
                                <span class="detail-label">Category</span>
                                <span class="detail-value">{{ $car->category }}</span>
                            </div>
                            <div class="car-detail">
                                <span class="detail-label">Price</span>
                                <span class="detail-value">${{ number_format($car->price, 2) }}</span>
                            </div>
                        </div>

                        <div class="car-actions">
                            <a href="{{ route('car.show', ['id' => $car->id]) }}" class="btn-view">View Details</a>
                            <a href="/cars/{{$car->id}}/edit" class="btn-update">Update</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>