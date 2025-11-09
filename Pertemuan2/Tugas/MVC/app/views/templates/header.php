<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web App</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-light">

    <style>
        * {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-white animate__animated animate__fadeInDown" href="<?= BASEURL; ?>">
                PHP MVC
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse animate__animated animate__fadeIn" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == BASEURL . '/') ? 'active fw-semibold' : ''; ?>"
                        href="<?= BASEURL; ?>"> Home</a>
                    <a class="nav-link <?= (str_contains($_SERVER['REQUEST_URI'], '/user')) ? 'active fw-semibold' : ''; ?>"
                        href="<?= BASEURL; ?>/user"> Users</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/user/create"> Tambah</a>
                </div>
            </div>
        </div>
    </nav>

    <script src="<?= BASEURL; ?>/js/bootstrap.bundle.min.js"></script>
</body>

</html>