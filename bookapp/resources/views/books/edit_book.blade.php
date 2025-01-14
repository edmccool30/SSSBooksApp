<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daniel's Book Application - Edit Book</title>
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
            <h1 class="text-center mb-4">Edit a Book</h1>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- The following code is to refer to any errors in the code -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="author_id">Author</label>
                    <select name="author_id" class="form-control" required>
                        @foreach($authors as $author)
                            <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                                {{ $author->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Book Image</label>
                    
                    <!-- Check if the book has an existing image -->
                    @if ($book->image_path)
                        <div class="mb-3">
                            <!-- Make the image clickable, linking to the full-size image -->
                            <a href="{{ asset('storage/' . $book->image_path) }}" target="_blank">
                                <img src="{{ asset('storage/' . $book->image_path) }}" alt="Current Book Image" class="img-thumbnail" style="max-width: 200px;">
                            </a>
                        </div>
                    @endif
                
                    <!-- Input for new image (optional) -->
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dateReleased">Publication Date</label>
                    <input type="date" name="dateReleased" value="{{ old('dateReleased', $book->dateReleased ? $book->dateReleased->format('Y-m-d') : '') }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Update Book</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>