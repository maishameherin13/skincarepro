<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Checkout') }}
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

      .checkout-section {
          background-color: #fff;
          padding: 30px;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
          border-radius: 10px;
          margin: 40px auto;
          max-width: 600px;
      }

      .checkout-title {
          font-size: 2rem;
          margin-bottom: 20px;
          font-weight: 600;
          color: #333;
      }

      .total-bill {
          font-size: 1.5rem;
          font-weight: bold;
          margin-bottom: 20px;
          color: #e91e63;
          text-align: right;
      }

      .checkout-form input,
      .checkout-form select,
      .checkout-form textarea {
          width: 100%;
          padding: 12px;
          margin-bottom: 15px;
          border-radius: 8px;
          border: 1px solid #ddd;
          font-size: 1rem;
          transition: border 0.3s ease;
      }

      .checkout-form input:focus,
      .checkout-form select:focus,
      .checkout-form textarea:focus {
          border-color: #3f51b5;
      }

      .checkout-form button {
          background-color: #3f51b5;
          color: #fff;
          padding: 12px 20px;
          border-radius: 5px;
          font-weight: bold;
          transition: background-color 0.3s, transform 0.3s;
          width: 100%;
          border: none;
          cursor: pointer;
      }

      .checkout-form button:hover {
          background-color: #303f9f;
          transform: scale(1.05);
      }

      .checkout-form button:active {
          background-color: #1a237e;
      }
  </style>

  <main>
      <div class="checkout-section">
          <h3 class="checkout-title">Checkout</h3>
          @if(session('success'))
              <div style="background-color: #4caf50; color: white; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                  {{ session('success') }}
              </div>
          @endif
          
          @php
              $totalBill = array_sum(array_map(function($product) {
                  return $product['price'] * $product['quantity'];
              }, session()->get('cart', [])));
          @endphp

          <div class="total-bill">
              Total Bill: ${{ $totalBill }}
          </div>


          <form class="checkout-form" action="{{ route('checkout.complete') }}" method="POST">
              @csrf

              <div>
                  <label for="name">Full Name</label>
                  <input type="text" id="name" name="name" required placeholder="Enter your full name">
              </div>

              <div>
                  <label for="email">Email Address</label>
                  <input type="email" id="email" name="email" required placeholder="Enter your email address">
              </div>

              <div>
                  <label for="address">Shipping Address</label>
                  <textarea id="address" name="address" required placeholder="Enter your shipping address"></textarea>
              </div>

              <div>
                  <label for="payment_method">Payment Method</label>
                  <select id="payment_method" name="payment_method" required>
                      <option value="credit_card">Credit Card</option>
                      <option value="paypal">PayPal</option>
                      <option value="bank_transfer">Bank Transfer</option>
                  </select>
              </div>

              <button type="submit">Complete Purchase</button>
          </form>
      </div>
  </main>
</x-app-layout>
