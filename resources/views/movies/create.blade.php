<!-- resources/views/movies/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Phim</title>
    <!-- Link to CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thêm Phim</h1>
        <a href="{{ route('movies.index') }}" class="btn btn-primary">Trang chủ</a>
        <form action="{{ route('movies.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="poster">Poster URL</label>
                <input type="url" class="form-control" id="poster" name="poster">
            </div>
            <div class="form-group">
                <label for="intro">Introduction</label>
                <input type="text" class="form-control" id="intro" name="intro" required>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" required>
            </div>
            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select class="form-control" id="genre_id" name="genre_id" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Thêm Phim</button>
        </form>
    </div>
</body>
</html>
