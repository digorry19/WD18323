<!-- resources/views/movies/show.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Phim</title>
    <!-- Link to CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">{{ $movie->title }}</h1>
        <div class="mb-3">
            @if ($movie->poster)
                <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" width="300">
            @else
                <p>No poster available</p>
            @endif
        </div>
        <p><strong>Introduction:</strong> {{ $movie->intro }}</p>
        <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
        <p><strong>Genre:</strong> {{ $movie->genre->name }}</p>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Trang chủ</a>
    </div>
</body>
</html>
