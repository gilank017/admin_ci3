<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mt-3">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url(); ?>pupuk/tambah" class="btn btn-primary mb-3">Tambah Data Pupuk</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pupuk</th>
                <th scope="col">Harga Pupuk</th>
                <th scope="col">Stok Pupuk</th>
                <th scope="col">Status Pupuk</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_pupuk as $tp) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $tp['nama_pupuk']; ?></td>
                    <td><?= $tp['harga_pupuk']; ?></td>
                    <td><?= $tp['stok_pupuk']; ?></td>
                    <td><?php if ($tp['status_pupuk'] == 1) {
                            echo "Tersedia";
                        } else {
                            echo "Tidak Tersedia";
                        } ?></td>
                    <td>
                        <a href="<?= base_url(); ?>pupuk/edit/<?= $tp['id_pupuk']; ?>" class="badge badge-primary">Edit</a>
                        <a href="<?= base_url(); ?>pupuk/hapus/<?= $tp['id_pupuk']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
                    </td>
                </tr>
                <?php $i++;  ?>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->