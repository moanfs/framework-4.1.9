<?= $this->extend("layouts/admin") ?>

<?= $this->section("content") ?>

<div class="container">
    <div class="card mt-5 p-3">
        <h2>Memasukan data produk</h2>
        <!-- pesan error -->
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">X</button>
                    <b>Error !</b>
                    <?= session()->getFlashdata('error'); ?>
                </div>
            </div>
        <?php endif; ?>
        <form method="POST" action="<?= base_url("Admin/admin/save"); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputnama">Nama Rumah</label>
                <input type="text" class="form-control" id="inputnama" name="nama" placeholder="rumah wawan">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Jl.rawa city">
            </div>
            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="rumah ini adalah.....">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Kota</label>
                    <input type="text" class="form-control" name="kota" id="inputCity">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Jenis</label>
                    <select id="inputState" class="form-control" name="jenis">
                        <option selected>Choose...</option>
                        <option value="ruko">Ruko</option>
                        <option value="rumah">Rumah</option>
                        <option value="kos">Kos</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" name="zip" id="inputZip">
                </div>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <button type="submit" class="btn btn-success btn-block">Input</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>