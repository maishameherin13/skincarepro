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

      .review-section form .rating {
          display: flex;
          justify-content: center;
          gap: 10px;
          margin-bottom: 15px;
      }

      .review-section form .rating label {
          font-size: 1.25rem;
      }

      .review-section form .rating input {
          width: 20px;
          height: 20px;
          cursor: pointer;
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
          </div>
      </div>
  </main>

  <meta name="csrf-token" content="{{ csrf_token() }}">
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const buyButton = document.getElementById('buyButton');

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
    });
</script>
