<?= $this->extend("layouts/admin") ?>

<?= $this->section("content") ?>

<div class="container-fluid">
    <div class="card mt-4 p-3">
        <!-- <form> -->
        <h4><?= $produk['jenis']; ?> dijual</h4>
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Rumah</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" value="<?= $produk['nama']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" value="<?= $produk['alamat']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col-7">
                <input type="text" class="form-control" value="<?= $produk['kota']; ?>" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?= $produk['jenis']; ?>" readonly>
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?= $produk['zip']; ?>" readonly>
            </div>
        </div>

        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" value="<?= $produk['keterangan']; ?>" readonly>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">foto</label>
            <div class="col-sm-10">
                <img src="<?= base_url('assest/foto/' . $produk['foto']); ?>" width="300" alt="">
                <!-- <input type="text" class="form-control" id="inputEmail3" value="<?= $produk['alamat']; ?>" readonly> -->
            </div>
        </div>
        <a href="<?= base_url('Admin/admin/table'); ?>" class="btn btn-warning btn-sm">back</a>
    </div>
</div>

<?= $this->endSection() ?>