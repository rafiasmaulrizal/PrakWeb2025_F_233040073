<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pengguna</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container user-list-page my-5">
    <h2 class="mb-4">Daftar Pengguna</h2>
    <div class="card shadow-sm">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-striped align-middle user-table mb-0">
            <thead class="table-light">
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($users) && is_array($users)) : ?>
                <?php foreach ($users as $user) : ?>
                  <tr>
                    <td><?= htmlspecialchars($user['name']); ?></td>
                    <td><?= htmlspecialchars($user['email']); ?></td>
                    <td>
                      <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="btn btn-info btn-sm">Detail</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else : ?>
                <tr>
                  <td colspan="3" class="text-center">Data pengguna tidak tersedia</td>
                </tr>
              <?php endif; ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </div>
</body>

</html>