<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách</title>
</head>
<body>
    <H1>Danh sách danh mục</H1>
    <table>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>
                <a href="">Thêm mới</a>
            </th>
        </tr>
        @foreach ($categories as $cate)
            <tr>
                <td>{{$cate->id}}</td>
                <td>{{$cate->name}}</td>
                <td>
                    EDIT
                    DEL
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>