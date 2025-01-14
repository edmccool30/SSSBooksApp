<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daniel's Book Application - All Books</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light py-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container">
                <a class="navbar-brand text-white" href="#">Book & Author Management</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('books') }}">Books</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('authors') }}">Authors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('book.add.form') }}">Add Book</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('author.add.form') }}">Add Author</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <h1 class="text-center mb-4">All Books</h1>
            <ul class="list-group">
                @foreach($books as $book)
                    <li class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h2><a href="{{ route('book.show', $book->id) }}" class="text-decoration-underline">{{ $book->title }}</a></h2>
                                <p><strong>Written by:</strong> {{ $book->author->name ?? 'an unknown author' }}</p>
                                <p><strong>Released on:</strong> {{ $book->dateReleased->format('d-m-Y') }}</p>
                            </div>
                            @if ($book->image_path)
                                <img src="{{ asset('storage/' . $book->image_path) }}" alt="Book Cover" class="img-thumbnail" style="max-width: 200px; margin-left: 15px;">
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
