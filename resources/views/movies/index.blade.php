<!-- resources/views/movies/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Phim</title>
    <!-- Link to CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <a href="{{ route('movies.index') }}"><h1 class="mb-4">Danh sách Phim</h1></a>
        @if (session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <!-- Tìm kiếm -->
        <form action="{{ route('movies.index') }}" method="GET" class="mb-3">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Tìm kiếm tên Phim..." value="{{ old('search', $search) }}">
            </div>
            <button type="submit" class="btn btn-success">Tìm kiếm</button>
        </form>
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">Thêm Phim mới</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Poster</th>
                    <th>Intro</th>
                    <th>Release Date</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($movies as $movie)
                    <tr>
                        <td>{{ $movie->title }}</td>
                        <td>
                            @if ($movie->poster)
                                <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" width="100">
                            @else
                                N/A
                            @endif
                        </td>
                        <td>{{ $movie->intro }}</td>
                        <td>{{ $movie->release_date }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Bạn có muốn xóa ko?')" type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination links -->
        <div class="d-flex justify-content-center">
            {{ $movies->links() }}
        </div>
    </div>
</body>
</html>
