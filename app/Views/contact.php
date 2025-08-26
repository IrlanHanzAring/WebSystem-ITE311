<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Web System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary rounded mb-4">
            <div class="container-fluid">
                <a class="navbar-brand text-white" href="<?= base_url() ?>">Web System</a>
                <div class="navbar-nav">
                    <a class="nav-link text-white" href="<?= base_url() ?>">Home</a>
                    <a class="nav-link text-white" href="<?= base_url('about') ?>">About</a>
                    <a class="nav-link active text-white bg-secondary rounded" href="<?= base_url('contact') ?>">Contact</a>
                </div>
            </div>
        </nav>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-primary">
                    <div class="card-body bg-light">
                        <h1 class="card-title text-primary">Contact Page</h1>
                        <p class="card-text">Welcome to the Contact page of my Web System!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>