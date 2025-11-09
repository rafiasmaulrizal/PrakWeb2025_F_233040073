<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow rounded-4">
          <div class="card-header bg-primary text-white text-center rounded-top-4">
            <h4 class="mb-0">Detail Pengguna</h4>
          </div>

          <div class="card-body text-center">

            <?php if (!empty($data['user'])) : ?>
              <div class="rounded-circle bg-secondary bg-opacity-25 d-flex justify-content-center align-items-center mx-auto mb-3"
                style="width: 90px; height: 90px; font-size: 36px; font-weight: 600; color: #0d6efd;">
                <?= strtoupper(substr($data['user']['nama'], 0, 1)); ?>
              </div>

              <h5 class="fw-semibold"><?= htmlspecialchars($data['user']['nama']); ?></h5>
              <p class="text-muted"><?= htmlspecialchars($data['user']['email']); ?></p>

              <div class="d-flex justify-content-center gap-3 mt-3">
                <a href="<?= BASEURL; ?>/user" class="btn btn-outline-secondary rounded-pill px-4">Kembali</a>
                <a href="<?= BASEURL; ?>/user/update/<?= htmlspecialchars($data['user']['id']); ?>"
                  class="btn btn-warning rounded-pill px-4 text-white">Edit</a>
              </div>

            <?php else : ?>
              <div class="alert alert-warning mt-3">
                Data pengguna tidak ditemukan.
              </div>
              <a href="<?= BASEURL; ?>/user" class="btn btn-outline-secondary rounded-pill mt-2 px-4">Kembali</a>
            <?php endif; ?>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>