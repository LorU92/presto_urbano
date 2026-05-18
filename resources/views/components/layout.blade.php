
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ri-uso</title>
    <!-- Vite js e css -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Font code -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Google+Sans+Flex:opsz,wght@6..144,1..1000&family=Host+Grotesk:ital,wght@0,300..800;1,300..800&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- navbar -->
    <x-navbar></x-navbar>
    <!-- header -->
    <div class="container-fluid header-container">
        <div class="row">
            <x-hdtitle></x-hdtitle>
        </div>
    </div>
    
    
    {{ $slot }} 
    

</body>
</html>
