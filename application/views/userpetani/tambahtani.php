<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Petani
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama_pupuk">Username</label>
                            <input type="text" name="username" class="form-control" id="username">
                            <small class="form-text text-danger"><?= form_error('username') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nama_petani">Nama Petani</label>
                            <input type="text" name="nama_petani" class="form-control" id="nama_petani">
                            <small class="form-text text-danger"><?= form_error('nama_petani') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kelompok_tani">Kelompok Tani</label>
                            <input type="text" name="kelompok_tani" class="form-control" id="kelompok_tani">
                            <small class="form-text text-danger"><?= form_error('kelompok_tani') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email">
                            <small class="form-text text-danger"><?= form_error('email') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="no_hp">Nomor Hp</label>
                            <input type="text" name="no_hp" class="form-control" id="no_hp">
                            <small class="form-text text-danger"><?= form_error('no_hp') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                            <small class="form-text text-danger"><?= form_error('alamat') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="password_tani">Password</label>
                            <input type="text" name="password_tani" class="form-control" id="password_tani">
                            <small class="form-text text-danger"><?= form_error('password_tani') ?></small>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                                <label class="form-check-label" for="is_active">
                                    Aktif?
                                </label>
                            </div>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data Petani</button>
                    </form>
                </div>
            </div>
        </div>
    </div>