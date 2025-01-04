<!-- resources/views/favorites.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h1>Your Favorite Products</h1>
    </x-slot>

    <div class="container">
        @if(count($favorites) > 0)
            <div class="row">
                @foreach($favorites as $product_id => $product)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card">
                            <!-- Product Image -->
                            <img src="data:image/jpeg;base64,{{ base64_encode($product['image']) }}" class="card-img-top" alt="Product Image">
                            <div class="card-body">
                                <!-- Product Name -->
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <!-- Product Price -->
                                <p class="card-text">${{ number_format($product['price'], 2) }}</p>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Your favorites list is empty.</p>
        @endif
    </div>

    @section('styles')
        <style>
            /* Body styling */
            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                background-color: #f9f9f9;
                margin: 0;
                padding: 0;
            }

            .container {
                margin: 40px auto;
                background-color: #fff;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                width: 80%;
                max-width: 1200px;
            }

            h1 {
                font-size: 28px;
                color: #333;
                margin-bottom: 20px;
                text-align: center;
            }

            /* Product card styling */
            .card {
                border: 1px solid #ddd;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-10px);
            }

            .card-img-top {
                width: 100%;
                height: 200px;
                object-fit: cover;
            }

            .card-body {
                padding: 15px;
            }

            .card-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .card-text {
                font-size: 16px;
                color: #333;
            }

            /* Grid layout for responsive product cards */
            .row {
                display: flex;
                flex-wrap: wrap;
                gap: 15px;
            }

            .col-md-4 {
                flex: 1 0 31%;
            }

            .col-sm-6 {
                flex: 1 0 48%;
            }

            /* Message when favorites are empty */
            p {
                font-size: 18px;
                color: #7f8c8d;
                text-align: center;
                font-weight: bold;
            }
        </style>
    @endsection
</x-app-layout>
