!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daniel's Book Application - Homepage</title>
    </head>
    <body>
    <h1>Welcome to the Book and Author Management System</h1>

    <ul>
        <li><a href="{{ route('books') }}">Books</a></li>
        <li><a href="{{ route('authors') }}">Authors</a></li>
        <li><a href="{{ route('book.add') }}">Add Book</a></li>
        <li><a href="{{ route('author.add') }}">Add Author</a></li>
    </ul>
</body>
</html>