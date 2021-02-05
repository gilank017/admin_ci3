<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Edit Data Pupuk
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id_pupuk" value="<?= $tb_pupuk['id_pupuk']; ?>">
                        <div class="form-group">
                            <label for="nama_pupuk">Nama Pupuk</label>
                            <input type="text" name="nama_pupuk" class="form-control" id="nama_pupuk" value="<?= $tb_pupuk['nama_pupuk']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama_pupuk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="harga_pupuk">Harga Pupuk</label>
                            <input type="number" name="harga_pupuk" class="form-control" id="harga_pupuk" value="<?= $tb_pupuk['harga_pupuk']; ?>">
                            <small class="form-text text-danger"><?= form_error('harga_pupuk') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok_pupuk">Stok Pupuk</label>
                            <input type="text" name="stok_pupuk" class="form-control" id="stok_pupuk" value="<?= $tb_pupuk['stok_pupuk']; ?>">
                            <small class="form-text text-danger"><?= form_error('stok_pupuk') ?></small>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="status_pupuk" id="status_pupuk" checked>
                                <label class="form-check-label" for="status_pupuk">
                                    Stock Pupuk
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary float-right">Edit Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->