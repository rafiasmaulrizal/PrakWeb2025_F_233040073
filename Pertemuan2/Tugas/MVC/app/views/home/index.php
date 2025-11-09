<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body class="bg-light">
    <div class="container my-5">
        <div class="p-5 bg-white rounded-4 shadow-lg text-center animate__animated animate__fadeIn">
            <h1 class="fw-bold text-primary mb-3 animate__animated animate__fadeInDown">
                👋 Selamat Datang
            </h1>

            <p class="col-md-8 mx-auto fs-5 text-muted animate__animated animate__fadeInUp">
                Halo <span class="fw-semibold text-dark"><?= htmlspecialchars($data['nama'] ?? 'Pengguna'); ?></span>,
                kelola daftar pelanggan Laundry Anda dengan mudah dan cepat!
            </p>

            <div class="d-flex justify-content-center gap-3 mt-4 animate__animated animate__zoomIn">
                <a href="<?= BASEURL; ?>/user" class="btn btn-primary btn-lg rounded-pill px-4 shadow-sm">
                    Lihat Daftar Pelanggan
                </a>
                <a href="<?= BASEURL; ?>/user/create" class="btn btn-success btn-lg rounded-pill px-4 shadow-sm">
                    + Tambah Pelanggan
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>