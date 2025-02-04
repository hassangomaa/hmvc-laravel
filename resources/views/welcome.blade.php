<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome - HMVC & Laravel Testing</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="hero-section">
            <div>
                <h1 class="display-4 text-primary fw-bold">Welcome to My Laravel Demo</h1>
                <p class="lead text-secondary">
                    This project demonstrates **HMVC Architecture, Unit & Feature Testing,** and **Advanced Laravel
                    Techniques.**
                    Built with a modular approach to enhance scalability and maintainability.
                </p>

                <div class="mt-4">
                    <h2 class="fw-bold">Hassan Gomaa Hassan</h2>
                    <p class="fs-5"><i class="bi bi-telephone"></i> Contact: <strong>+201277785111</strong></p>
                </div>

                <a href="{{ url('/docs') }}" class="btn btn-primary btn-lg mt-3">Explore the Documentation</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional for interactive components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
