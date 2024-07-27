<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
</head>
<style>
 
/* public/css/styles.css */

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f0f2f5;
    color: #333;
}

h1 {
    text-align: center;
    color: #4a4a4a;
    font-size: 2.5em;
    margin-top: 20px;
}

h2 {
    color: #4a4a4a;
    margin-left: 20px;
    font-size: 1.8em;
    margin-top: 40px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 20px 0;
}

ul li {
    background-color: #fff;
    margin: 10px 20px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

ul li:hover {
    transform: translateY(-5px);
}

ul li a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

ul li a:hover {
    color: #0056b3;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.section {
    margin-bottom: 40px;
}


</style>
<body>
    <h1>Trang Chủ</h1>
    <ul>
        <li></li>
        <li></li>
    </ul>
    <h2>8 Sản phẩm có giá cao nhất</h2>
    <ul>
        @foreach($expensiveBooks as $book)
            <li><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a> - {{ $book->price }}   </li>
        @endforeach
    </ul>
    
    <h2>8 Sản phẩm có giá thấp nhất</h2>
    <ul>
        @foreach($cheapBooks as $book)
            <li><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a> - {{ $book->price }}</li>
        @endforeach
    </ul>
</body>
</html>
