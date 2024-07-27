<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    img{
        width: 150px;
    }
</style>
<body>
    <div class="container">
        <H1 class="">Danh sách sách</H1>
    <a href="{{ route('books.create') }}" class="btn btn-primary mb-2">Thêm mới</a>
    <div class="scrollable-table">
        <table class="table table-striped table-hover">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Author</th>
                <th>Publisher</th>
                <th>Publication</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td><img src="{{$book->thumbnail}}" alt=""></td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->publisher}}</td>
                    <td>{{$book->publication}}</td>
                    <td>{{$book->price}}</td>
                    <td>{{$book->quantity}}</td>
                    {{-- <td>{{$book->category_id}}</td> --}}
                    <td>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="del-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mb-2">Xóa</button>
                        </form>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Sửa</a>
                    </td>
                </tr>
            @endforeach
        </table>
    {{-- <div class="pagination">
        {{ $books->links() }}
    </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
         document.querySelectorAll('.del-form').forEach(function(button) {
            button.addEventListener('click', function() {
                if (confirm('Bạn có chắc muốn xóa?')) {
                    this.closest('.del-form').submit();
                }
            });
        });
        document.getElementById('delete-all-button').addEventListener('click', function() {
            if (confirm('Bạn có chắc muốn xóa tất cả sách?')) {
                document.getElementById('delete-all-form').submit();
            }
        });
    </script>
</body>
</html>