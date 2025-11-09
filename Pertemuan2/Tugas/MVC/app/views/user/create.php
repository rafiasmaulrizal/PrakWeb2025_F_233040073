<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">

        <div class="card shadow rounded-4 border-0">
          <div class="card-header bg-success text-white text-center rounded-top-4">
            <h4 class="mb-0">Tambah Pengguna</h4>
          </div>

          <div class="card-body text-center">

            <form action="<?= BASEURL; ?>/user/store" method="post" class="text-start px-3">

              <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control form-control-lg rounded-3"
                  placeholder="Masukkan nama lengkap" required>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control form-control-lg rounded-3"
                  placeholder="Masukkan email pengguna" required>
              </div>

              <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="<?= BASEURL; ?>/user" class="btn btn-outline-secondary rounded-pill px-4">Batal</a>
                <button type="submit" class="btn btn-success rounded-pill px-4">Simpan</button>
              </div>

            </form>

          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>