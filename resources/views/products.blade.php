<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Products') }}
      </h2>
  </x-slot>

  <style>
      /* Basic reset */
      * {
          margin: 0;
          padding: 0;
          box-sizing: border-box;
      }

      body {
          font-family: Arial, sans-serif;
          background-color: #f9f9f9;
          color: #333;
      }

      main {
          padding: 40px 20px;
      }

      .product-grid {
          display: grid;
          grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
          gap: 20px;
          justify-items: center;
      }

      .product-card {
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          text-align: center;
          transition: transform 0.3s, box-shadow 0.3s;
          width: 100%;
          max-width: 300px;
      }

      .product-card:hover {
          transform: translateY(-10px);
          box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
      }

      .product-card img {
          width: 100%;
          height: auto;
          border-radius: 8px;
          object-fit: cover;
          margin-bottom: 15px;
      }

      .product-card h2 {
          font-size: 1.8rem;
          color: #333;
          margin-bottom: 10px;
      }

      .product-card p {
          font-size: 1.2rem;
          margin-bottom: 10px;
      }

      .product-card .price {
          font-size: 1.5rem;
          font-weight: bold;
          color: #e91e63;
          margin-bottom: 20px;
      }

      /* Button */
      .button {
          background-color: #3f51b5;
          color: #fff;
          padding: 10px 20px;
          border-radius: 5px;
          text-decoration: none;
          font-weight: bold;
          transition: background-color 0.3s;
          margin-top: 15px;
          display: inline-block;
      }

      .button:hover {
          background-color: #303f9f;
      }
        /* Search bar styles */
        .search-bar {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-bottom: 30px;
      }

      .search-bar input {
          width: 60%;
          padding: 12px 15px;
          font-size: 1.1rem;
          border: 2px solid #ccc;
          border-right: none;
          border-radius: 8px 0 0 8px;
          outline: none;
          transition: all 0.3s;
      }

      .search-bar input:focus {
          border-color: #3f51b5;
          box-shadow: 0 0 5px rgba(63, 81, 181, 0.5);
      }

      .search-bar button {
          padding: 12px 20px;
          font-size: 1.1rem;
          border: none;
          background-color: #3f51b5;
          color: #fff;
          border-radius: 0 8px 8px 0;
          cursor: pointer;
          transition: all 0.3s;
      }

      .search-bar button:hover {
          background-color: #303f9f;
      }
  </style>

  <main>
        <!-- Search bar -->
        
        <div class="search-bar">
            <form method="GET" action="{{ route('products') }}">
                <input type="text" name="search" placeholder="Search for products..." value="{{ request('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>

      <div class="product-grid">
          @foreach($products as $product)
              <div class="product-card">
                  <!-- Display product image -->
                  <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}">

                  <!-- Display product name -->
                  <h2>{{ $product->product_name }}</h2>

                  <!-- Display product price -->
                  <p class="price">${{ $product->product_price }}</p>
                  <a href="{{ route('product.details', ['product_id' => $product->product_id]) }}" class="button">Details</a>
                </div>
          @endforeach
      </div>
  </main>
</x-app-layout>
