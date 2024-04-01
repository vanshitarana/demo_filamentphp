<!-- resources/views/components/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Website</title>
    <!-- Add your CSS stylesheets and JavaScript scripts here -->
</head>
<body>
    <!-- Common header or navigation bar -->
    <header>
        <!-- Your header content goes here -->
    </header>

    <!-- Main content area for Livewire page components -->
    <main>
        {{ $slot }}
    </main>

    <!-- Common footer -->
    <footer>
        <!-- Your footer content goes here -->
    </footer>
</body>
</html>
