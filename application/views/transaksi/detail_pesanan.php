<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="box-header with-border">
    </div>

    <div class="box-body">

        <table class="table">
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td>Kode Transaksi</td>
                    <td><?= $t['kode_transaksi']; ?></td>
                </tr>
                <tr>
                    <td>Nama Petani</td>
                    <td><?= $t['nama_petani']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pemesanan</td>
                    <td><?= $t['tgl_pesanan']; ?></td>
                </tr>
                <tr>
                    <td>Tanggal Pembayaran</td>
                    <td><?= $t['tgl_bayar']; ?></td>
                </tr>
                <tr>
                    <td>Total Pembayaran</td>
                    <td>Rp .<?= $t['total_bayar']; ?></td>
                </tr>
                <tr>
                    <td>Status Pembayaran</td>
                    <td><?php if ($t['status_bayar'] == 0) {
                            echo "Menunggu Pembayaran";
                        } else {
                            echo "Sudah Dibayar";
                        } ?></td>
                </tr>
                <tr>
                    <td>Status Transaksi</td>
                    <td><?php if ($t['status_transaksi'] == 0) {
                            echo "Menunggu Diproses";
                        } else {
                            echo "Selesai";
                        } ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br><br><br>
        <table class='table table-bordered table-striped' id='mytable'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pupuk</th>
                    <th>Harga Pupuk</th>
                    <th>Jumlah Pupuk</th>
                    <th>Total Pupuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $start = 0;
                foreach ($detail_transaksi as $dt) : ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?= $dt['nama_pupuk']; ?></td>
                        <td>Rp.<?= $dt['harga_pupuk']; ?></td>
                        <td><?= $dt['jumlah_pupuk']; ?></td>
                        <td>Rp.<?= $dt['total_pupuk']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>transaksi/confirm/<?= $dt['kode_transaksi']; ?>"><button class="btn btn-primary btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')">Confirm</button></a>
                            <a href="<?= base_url(); ?>transaksi/cancel/<?= $dt['kode_transaksi']; ?>"><button class="btn btn-danger btn-sm" onclick="javasciprt: return confirm('Are You Sure ?')">Cancel</button></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
</div>
<!--/.col (right) -->
</div>
</section><!-- /.content -->
</div><!-- /.content-wrapper -->



<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var t = $("#mytable").dataTable({
            "scrollX": true
        });
    });
</script>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->