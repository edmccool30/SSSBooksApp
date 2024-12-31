<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daniel's Book Application - All Books</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light py-5">
        <div class="container">
            <h1 class="text-center mb-4">All Books</h1>
            <ul class="list-group">
                @foreach($books as $book)
                    <li class="list-group-item">
                        <h2 class="text-decoration-underline">{{ $book->title }}</h2>
                        <p><strong>Written by:</strong> {{ $book->author->name ?? 'an unknown author' }}</p>
                        <p><strong>Released on:</strong> {{ $book->dateReleased->format('d-m-Y') }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
