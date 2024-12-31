<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daniel's Book Application - Add Author</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    </head>
    <body class="bg-light py-5">

        <div class="container">
            <h1 class="text-center mb-4">Add a New Author</h1>

            <!-- Display success message if any -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('author.add') }}" method="POST">
                @csrf <!-- CSRF token for security -->

                <div class="form-group">
                    <label for="name">Author Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="nationality">Author's Nationality</label>
                    <input type="text" name="nationality" id="nationality" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="birthDate">Date of Birth</label>
                    <input type="date" name="birthDate" id="birthDate" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Add Author</button>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>