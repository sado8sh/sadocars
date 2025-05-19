<style>
    .orders-container {
        padding: 20px;
        background: #1a1d21;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .orders-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        padding-bottom: 15px;
        border-bottom: 2px solid #2d3238;
    }

    .orders-title {
        font-size: 1.5rem;
        color: #fff;
        font-weight: 600;
    }

    .orders-count {
        background: #2d3238;
        padding: 8px 16px;
        border-radius: 20px;
        color: #fff;
        font-size: 0.9rem;
    }

    .order-card {
        background: #2d3238;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        border: 1px solid #3a3f45;
    }

    .order-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }

    .order-content {
        display: grid;
        grid-template-columns: auto 1fr auto;
        gap: 20px;
        padding: 20px;
        align-items: center;
    }

    .order-image {
        width: 120px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #3a3f45;
    }

    .order-details {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 15px;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .detail-label {
        color: #8b8f94;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .detail-value {
        color: #fff;
        font-size: 1rem;
        font-weight: 500;
    }

    .order-status {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.85rem;
        font-weight: 500;
        text-align: center;
        min-width: 100px;
    }

    .status-pending { background: #2c3e50; color: #ecf0f1; }
    .status-confirmed { background: #27ae60; color: #fff; }
    .status-shipped { background: #2980b9; color: #fff; }
    .status-delivered { background: #16a085; color: #fff; }
    .status-canceled { background: #c0392b; color: #fff; }

    .order-actions {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .btn-view {
        background: #3498db;
        color: #fff;
        padding: 8px 16px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 0.9rem;
        transition: background 0.2s ease;
    }

    .btn-view:hover {
        background: #2980b9;
    }

    .no-orders {
        text-align: center;
        padding: 40px;
        background: #2d3238;
        border-radius: 10px;
        color: #8b8f94;
        font-size: 1.1rem;
    }

    @media (max-width: 768px) {
        .order-content {
            grid-template-columns: 1fr;
        }

        .order-image {
            width: 100%;
            height: 160px;
        }

        .order-details {
            grid-template-columns: 1fr;
        }

        .order-actions {
            justify-content: flex-start;
        }
    }
</style>

<div class="orders-container">
    <div class="orders-header">
        <h2 class="orders-title">Orders Management</h2>
        <div class="orders-count">Total Orders: {{ $orders->count() }}</div>
    </div>

    @if($orders->isEmpty())
        <div class="no-orders">
            <p>No orders found.</p>
        </div>
    @else
        @foreach($orders as $order)
            <div class="order-card">
                <div class="order-content">
                    <img src="{{ Storage::url($order->car->main_image ?? 'images/default-car.jpg') }}" 
                         alt="{{ $order->car->brand ?? 'Car' }} {{ $order->car->model ?? 'Model' }}" 
                         class="order-image">

                    <div class="order-details">
                        <div class="detail-item">
                            <span class="detail-label">Order ID</span>
                            <span class="detail-value">#{{ $order->id }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Customer</span>
                            <span class="detail-value">{{ $order->user->name ?? $order->user->email ?? 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Car</span>
                            <span class="detail-value">{{ $order->car->brand ?? 'N/A' }} {{ $order->car->model ?? 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Order Date</span>
                            <span class="detail-value">{{ $order->created_at ? $order->created_at->format('Y-m-d H:i') : 'N/A' }}</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Amount</span>
                            <span class="detail-value">${{ number_format($order->price, 2) ?? 'N/A' }}</span>
                        </div>
                    </div>

                    <div class="order-actions">
                        <div class="order-status status-{{ $order->status }}">
                            {{ ucfirst($order->status) }}
                        </div>
                        <a href="{{ route('orders.show', $order) }}" class="btn-view">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div> 