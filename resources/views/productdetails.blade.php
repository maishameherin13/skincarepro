<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Product Details') }}
      </h2>
  </x-slot>

  <style>
      /* General Page Styling */
      body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
      }

      .product-details {
          display: flex;
          flex-wrap: wrap;
          gap: 20px;
          padding: 20px;
          background-color: #fff;
      }

      .product-details img {
          max-width: 300px;
          border-radius: 10px;
          box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      }

      .product-info {
          flex: 1;
          padding: 20px;
      }

      .product-info h2 {
          font-size: 1.5rem;
          margin-bottom: 10px;
      }

      .product-info p.price {
          font-size: 1.25rem;
          color: #3f51b5;
          font-weight: bold;
      }

      .product-info button {
          padding: 10px 20px;
          background-color: #3f51b5;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1rem;
          margin-right: 10px;
      }

      .product-info button:hover {
          background-color: #303f9f;
      }

      /* Review Form Styling */
      .review-section {
          margin-top: 50px;
          padding: 20px;
          background-color: #f9f9f9;
          box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          width: 90%;
          max-width: 800px;
          margin: 50px auto;
      }

      .review-section h3 {
          font-size: 1.5rem;
          margin-bottom: 20px;
          text-align: center;
      }

      .review-section form textarea {
          width: 100%;
          padding: 10px;
          border-radius: 5px;
          border: 1px solid #ccc;
          font-size: 1rem;
          margin-bottom: 15px;
          resize: vertical;
      }

      .review-section form button {
          background-color: #3f51b5;
          color: #fff;
          padding: 12px 20px;
          border-radius: 5px;
          font-weight: bold;
          cursor: pointer;
          border: none;
          display: block;
          margin: 0 auto;
      }

      .review-section form button:hover {
          background-color: #303f9f;
      }

      /* Rating Section */
      .rating-form {
          margin-top: 30px;
          padding: 15px;
          background-color: #f1f1f1;
          border-radius: 10px;
          text-align: center;
      }

      .rating-form label {
          font-size: 1.25rem;
          margin-right: 10px;
      }

      .rating-form select {
          padding: 5px;
          font-size: 1rem;
          border: 1px solid #ccc;
          border-radius: 5px;
      }

      .rating-button {
          padding: 10px 20px;
          background-color: #3f51b5;
          color: #fff;
          border: none;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1rem;
          margin-bottom: 20px;
      }

      .rating-button:hover {
          background-color: #303f9f;
      }

      /* Favorite Button Styling */
      .favorite-button {
          padding: 10px 20px;
          background-color: transparent;
          border: 2px solid #3f51b5;
          color: #3f51b5;
          border-radius: 5px;
          cursor: pointer;
          font-size: 1rem;
          margin-top: 10px;
          display: flex;
          align-items: center;
      }

      .favorite-button i {
          margin-right: 5px;
      }

      .favorite-button:hover {
          background-color: #3f51b5;
          color: #fff;
      }
  </style>

  <main>
      <div class="product-details">
          <!-- Product Image -->
          <img src="{{ route('product.image', $product->product_id) }}" alt="{{ $product->product_name }}">

          <div class="product-info">
              <!-- Product Name -->
              <h2>{{ $product->product_name }}</h2>

              <!-- Product Price -->
              <p class="price">${{ $product->product_price }}</p>

              <h2>Product Description </h2>
              <p>{{ $product->product_description ?? 'No description available.' }}</p>
              
              <h2>Ingredients:</h2>
              <p>{{ $product->product_ingredients ?? 'No Ingredients available.' }}</p>

              <h2>How to use:</h2>
              <p>{{ $product->how_to_use ?? 'No description available.' }}</p>

              <!-- Buttons -->
              <button id="buyButton" class="buy-button" data-product-id="{{ $product->product_id }}">Add to cart</button>

              <!-- Favorite Button -->
              <button id="favoriteButton" class="favorite-button" data-product-id="{{ $product->product_id }}">
                  <i class="fas fa-heart"></i> Add to favorites
              </button>
          </div>
      </div>

      
  </main>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <script>
    document.addEventListener('DOMContentLoaded', function () {
        const buyButton = document.getElementById('buyButton');
        const favoriteButton = document.getElementByID('favoriteButton')

        // Add to cart button logic
        if (buyButton) {
            buyButton.addEventListener('click', function () {
                const productId = buyButton.dataset.productId;

                fetch(`/product/${productId}/add-to-cart`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ product_id: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product added to cart successfully!');
                    } else {
                        alert('Failed to add product to cart. ' + (data.message || 'Please try again.'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        }

        // Favorite button logic
        if (favoriteButton) {
            favoriteButton.addEventListener('click', function () {
                const productId = favoriteButton.dataset.productId;

                fetch(`/product/${productId}/add-to-favorites`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ product_id: productId }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Product added to favorites successfully!');
                    } else {
                        alert('Failed to add product to favorites. ' + (data.message || 'Please try again.'));
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        }
    });
  </script>
</x-app-layout>
