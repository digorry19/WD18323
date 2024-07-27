<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sách Mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Thêm Sách Mới
                    </div>
                    <a class="btn btn-primary" href="{{ route('books.index') }}">Danh sách</a>
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" id="title" name="title" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Ảnh</label>
                                <input type="text" id="author" name="thumbnail" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="author">Tác giả:</label>
                                <input type="text" id="author" name="author" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="publisher">Nhà xuất bản:</label>
                                <input type="text" id="publisher" name="publisher" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="publication">Năm xuất bản:</label>
                                <input type="date" id="publication" name="publication" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="price">Giá:</label>
                                <input type="number" id="price" name="price" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="quantity">Số lượng:</label>
                                <input type="number" id="quantity" name="quantity" class="form-control" >
                            </div>

                            <div class="form-group">
                                <label for="category_id">Loại sách ID:</label>
                                <select id="category_id" name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                            <button type="submit" class="btn btn-primary">Thêm Sách</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
