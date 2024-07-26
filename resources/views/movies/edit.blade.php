<!-- resources/views/movies/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa thông tin Phim</title>
    <!-- Link to CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Sửa thông tin Phim</h1>
        <form action="{{ route('movies.update', $movie->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" required>
            </div>
            <div class="form-group">
                <label for="poster">Poster URL</label>
                <input type="url" class="form-control" id="poster" name="poster" value="{{ old('poster', $movie->poster) }}">
            </div>
            <div class="form-group">
                <label for="intro">Introduction</label>
                <input type="text" class="form-control" id="intro" name="intro" value="{{ old('intro', $movie->intro) }}" required>
            </div>
            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $movie->release_date) }}" required>
            </div>
            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select class="form-control" id="genre_id" name="genre_id" required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
        <a href="{{ route('movies.index') }}" class="btn btn-secondary mt-3">Trang chủ</a>
    </div>
</body>
</html>
