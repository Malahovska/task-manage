<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    <!-- Add your CSS and JS files or include them using Laravel's asset() function -->
</head>
<body>
    <header>
        <!-- Add your header content here -->
    </header>

    <nav>
        <!-- Add your navigation menu here -->
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Add your footer content here -->
    </footer>
</body>
</html>
