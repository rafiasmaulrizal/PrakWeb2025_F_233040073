<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="card shadow rounded-4 border-0">
      <div class="card-header bg-primary text-white text-center rounded-top-4">
        <h4 class="mb-0"> Daftar Pengguna</h4>
      </div>

      <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
          <h6 class="text-muted mb-0">Total: <?= count($data['users'] ?? []); ?> pengguna</h6>
          <a href="<?= BASEURL; ?>/user/create" class="btn btn-success rounded-pill px-3">
            + Tambah Pengguna
          </a>
        </div>

        <div class="table-responsive">
          <table class="table table-hover align-middle text-center mb-0">
            <thead class="table-primary text-white">
              <tr>
                <th style="width: 35%">Nama</th>
                <th style="width: 35%">Email</th>
                <th style="width: 30%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($data['users'])) : ?>
                <?php foreach ($data['users'] as $user) : ?>
                  <tr>
                    <td class="fw-semibold"><?= htmlspecialchars($user['nama'] ?? $user['name'] ?? '-'); ?></td>
                    <td><?= htmlspecialchars($user['email'] ?? '-'); ?></td>
                    <td>
                      <div class="d-flex justify-content-center gap-2">
                        <a href="<?= BASEURL; ?>/user/detail/<?= htmlspecialchars($user['id'] ?? ''); ?>" class="btn btn-sm btn-primary rounded-pill px-3">
                          Detail
                        </a>
                        <a href="<?= BASEURL; ?>/user/delete/<?= htmlspecialchars($user['id'] ?? ''); ?>"
                          class="btn btn-sm btn-danger rounded-pill px-3"
                          onclick="return confirm('Yakin ingin menghapus pengguna ini?');">
                          Hapus
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="3" class="text-muted py-4"> Tidak ada data pengguna.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>