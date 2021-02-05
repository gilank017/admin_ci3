<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <a href="<?= base_url('transaksi/cetak'); ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"> Print Transaksi</i></a>

    <div class="row mt-3">
        <div class="col-lg-6">
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">ID Pupuk</th>
                <th scope="col">Harga Pupuk</th>
                <th scope="col">Jumlah Pupuk</th>
                <th scope="col">Total Pupuk</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($tb_detail_transaksi as $dt) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $dt['kode_transaksi']; ?></td>
                    <td><?= $dt['id_pupuk']; ?></td>
                    <td><?= $dt['harga_pupuk']; ?></td>
                    <td><?= $dt['jumlah_pupuk']; ?></td>
                    <td><?= $dt['total_pupuk']; ?></td>
                    <td><?php if ($dt['status'] == 1) {
                            echo "Lunas";
                        } else {
                            echo "Belum Lunas";
                        } ?></td>
                    <td>
                        <a href="<?= base_url(); ?>transaksi/detail_endtransaksi/<?= $dt['kode_transaksi']; ?>" class="badge badge-primary">Detail</a>
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