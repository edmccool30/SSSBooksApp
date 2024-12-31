<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Daniel's Book Application - All Authors</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light py-5">
        <div class="container">
            <h1 class="text-center mb-4">All Authors</h1>
            <ul class="list-group">
                @foreach($authors as $author)
                    <li class="list-group-item">
                        <h2 class="text-decoration-underline">{{ $author->name }}</h2>
                        <p><strong>Nationality:</strong> {{ $author->nationality }}</p>
                        <p><strong>Born:</strong> {{ $author->birthdate }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>