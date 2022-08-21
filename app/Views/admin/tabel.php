<?= $this->extend("layouts/admin") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="card mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nama</th>
                    <th scope="col">alamat</th>
                    <th scope="col">jenis</th>
                    <th scope="col">kota</th>
                    <th scope="col">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produk as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?= $key + 1; ?></th>
                        <td><?= $value['nama']; ?></td>
                        <td><?= $value['alamat']; ?></td>
                        <td><?= $value['jenis']; ?></td>
                        <td><?= $value['kota']; ?></td>
                        <td><a href="<?= base_url("Admin/admin/show/" . $value['id_produk']); ?>" class="btn btn-info btn-sm">show</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>