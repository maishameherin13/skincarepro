<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Shopping Cart') }}
      </h2>
  </x-slot>

  <style>
      /* Basic Styles */
      body {
          font-family: Arial, sans-serif;
          background-color: #f9f9f9;
          color: #333;
          margin: 0;
          padding: 0;
      }

      .cart-items {
          padding: 20px;
          background-color: #fff;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          margin: 30px 0;
          border-radius: 10px;
      }

      .cart-item {
          display: flex;
          gap: 20px;
          padding: 20px;
          border-bottom: 1px solid #ddd;
          align-items: center;
          margin-bottom: 20px;
      }

      .cart-item img {
          width: 150px;
          height: auto;
          border-radius: 8px;
          transition: transform 0.3s ease;
      }

      .cart-item img:hover {
          transform: scale(1.05);
      }

      .item-details h3 {
          font-size: 1.6rem;
          margin-bottom: 10px;
          color: #333;
          font-weight: 600;
      }

      .item-details p {
          font-size: 1.2rem;
          margin-bottom: 5px;
          color: #666;
      }

      .item-actions {
          display: flex;
          flex-direction: column;
          gap: 10px;
          align-items: flex-start;
      }

      .item-actions button {
          display: flex;
          align-items: center;
          gap: 5px;
          padding: 10px 15px;
          font-size: 1rem;
          background-color: #3f51b5;
          color: white;
          border-radius: 5px;
          border: none;
          cursor: pointer;
          transition: background-color 0.3s ease, transform 0.2s ease;
          text-transform: uppercase;
          font-weight: bold;
      }

      .item-actions button:hover {
          background-color: #303f9f;
          transform: translateY(-2px);
      }

      .item-actions button:active {
          background-color: #1a237e;
      }

      .item-actions input[type="number"] {
          width: 60px;
          padding: 5px;
          border: 1px solid #ddd;
          border-radius: 5px;
          text-align: center;
      }

      /* Icons */
      .item-actions .icon {
          font-size: 1.2rem;
      }

      .cart-total {
          text-align: right;
          font-size: 1.6rem;
          font-weight: bold;
          margin-top: 20px;
          color: #e91e63;
      }

      /* Button Styles */
      .checkout-button {
          display: grid;
          margin-top: 30px;
          padding: 15px 15px;
          background-color: #28a745;
          color: white;
          text-align: center;
          text-decoration: none;
          font-size: 1.2rem;
          border-radius: 5px;
          transition: background-color 0.3s ease, transform 0.2s ease;
          font-weight: bold;
          width: 100%;
      }

      .checkout-button:hover {
          background-color: #218838;
          transform: translateY(-2px);
      }

      .checkout-button:active {
          background-color: #1e7e34;
      }

      /* Responsive Styles */
      @media (max-width: 768px) {
          .cart-item {
              flex-direction: column;
              align-items: center;
          }

          .cart-item img {
              width: 100%;
              max-width: 120px;
              margin-bottom: 20px;
          }

          .item-details {
              text-align: center;
          }

          .cart-total {
              font-size: 1.4rem;
          }

          .checkout-button {
              width: auto;
          }
      }
  </style>

  <main>
      <div class="cart-items">
        
          
          @if(session()->has('cart') && count(session()->get('cart')) > 0)
              <ul>
                  @foreach(session()->get('cart') as $product_id => $product)
                      <li>
                          <div class="cart-item">
                              <img src="{{ route('product.image', $product_id) }}" alt="{{ $product['name'] }}">
    
                              <div class="item-details">
                                  <h3>{{ $product['name'] }}</h3>
                                  <p>Price: ${{ $product['price'] }}</p>
                                  <p>Quantity: {{ $product['quantity'] }}</p>
                              </div>
                              <div class="item-actions">
                                  <form action="{{ route('cart.remove', $product_id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit">
                                          <span class="icon">🗑️</span> 
                                      </button>
                                  </form>
                                  <form action="{{ route('cart.update', $product_id) }}" method="POST">
                                      @csrf
                                      <div style="display: flex; align-items: center; gap: 5px;">
                                          <input type="number" name="quantity" min="1" value="{{ $product['quantity'] }}">
                                          <button type="submit">
                                              <span class="icon">✏️</span> 
                                          </button>
                                      </div>
                                  </form>
                              </div>
                          </div>
                      </li>
                  @endforeach
              </ul>
              <div class="cart-total">
                  <p>Total: ${{ array_sum(array_map(function($product) { return $product['price'] * $product['quantity']; }, session()->get('cart'))) }}</p>
              </div>
          @else
              <p>Your cart is empty.</p>
          @endif
      </div>

      @if(session()->has('cart') && count(session()->get('cart')) > 0)
          <a href="{{ route('checkout') }}" class="checkout-button">Proceed to Checkout</a>
      @endif
  </main>
</x-app-layout>
