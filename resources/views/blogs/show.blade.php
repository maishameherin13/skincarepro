<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 20px auto;
        }
        h1 {
            color: #333;
        }
        p {
            color: #555;
        }
        .blog-meta {
            padding: 10px;
            font-size: 14px;
            color: #999;
            background-color: #f8f8f8;
            text-align: right;
        }
        .blog-content {
            padding: 20px 0;
        }
        .blog-date {
            color: #888;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $blog['title'] }}</h1>
        <p class="blog-date">{{ $blog['date'] }}</p>
        <div class="blog-content">
            <p>{{ $blog['description'] }}</p>
        </div>
        <div class="blog-meta">
            <span>Written by: {{ $blog['author'] }}</span>
        </div>
        <a href="{{ route('blogs.index') }}">Back to Blogs</a>
    </div>
</body>
</html>
