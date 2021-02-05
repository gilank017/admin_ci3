<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <a href="<?= base_url(); ?>userpetani/tambahtani" class="btn btn-primary mb-3">Tambah Data Petani</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Nama Petani</th>
                <th scope="col">Kelompok Tani</th>
                <th scope="col">Email</th>
                <th scope="col">No Hp</th>
                <th scope="col">Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_user_tani as $tut) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $tut['username']; ?></td>
                    <td><?= $tut['nama_petani']; ?></td>
                    <td><?= $tut['kelompok_tani']; ?></td>
                    <td><?= $tut['email']; ?></td>
                    <td><?= $tut['no_hp']; ?></td>
                    <td><?= $tut['alamat']; ?></td>
                    <td>
                        <a href="<?= base_url(); ?>userpetani/edit/<?= $tut['id_tani']; ?>" class="badge badge-primary">Edit</a>
                        <a href="<?= base_url(); ?>userpetani/hapus/<?= $tut['id_tani']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Hapus</a>
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