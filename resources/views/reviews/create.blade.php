<!-- resources/views/reviews/create.blade.php -->
<x-app-layout>
    <div class="container">
        <h3 class="page-title">Submit Your Review</h3>

        <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" value="{{ Auth::user()->name }}" readonly required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <select id="product_name" name="product_name" class="form-control" required>
                    <option value="" disabled selected>Select a product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->product_name }}">{{ $product->product_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="review">Review</label>
                <textarea id="review" name="review" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="submit-btn">Submit Review</button>
            </div>
        </form>

        @if(session('success'))
            <p class="success-message">{{ session('success') }}</p>
        @endif

        <h3 class="reviews-title">All Reviews:</h3>
        <div class="reviews-list">
            @foreach($reviews as $review)
                <div class="review">
                    <strong>{{ $review->username }}</strong> for {{ $review->product_name }}:
                    <p>{{ $review->review }}</p>

                    <!-- Like Button -->
                    <form action="{{ route('reviews.like', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-like">Like ({{ $review->likes }})</button>
                    </form>

                    <!-- Dislike Button -->
                    <form action="{{ route('reviews.dislike', $review->id) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-dislike">Dislike ({{ $review->dislikes }})</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <style>
        .container {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .page-title {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .review-form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group textarea {
            min-height: 100px;
        }

        .submit-btn {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #218838;
        }

        .success-message {
            color: green;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
        }

        .reviews-title {
            margin-top: 40px;
            font-size: 24px;
            text-align: center;
        }

        .reviews-list {
            margin-top: 20px;
        }

        .review {
            background-color: #f0f0f0;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .review strong {
            font-size: 18px;
            color: #333;
        }

        .review p {
            font-size: 16px;
            color: #555;
        }

        .btn-like,
        .btn-dislike {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-like:hover {
            background-color: #0056b3;
        }

        .btn-dislike {
            background-color: #dc3545;
            cursor: pointer;
        }

        .btn-dislike:hover {
            background-color: #c82333;
        }
    </style>
</x-app-layout>
