<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row mt-3">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPesananModal">Tambah Pesanan Baru</a>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">ID Tani</th>
                <th scope="col">Tanggal Pesanan</th>
                <th scope="col">Tanggal Pembayaran</th>
                <th scope="col">Total Pembayaran</th>
                <th scope="col">Status Bayar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $t['kode_transaksi']; ?></td>
                    <td><?= $t['id_tani']; ?></td>
                    <td><?= $t['tgl_pesanan']; ?></td>
                    <td><?= $t['tgl_bayar']; ?></td>
                    <td><?= $t['total_bayar']; ?></td>
                    <td><?php if ($t['status_bayar'] == 1) {
                            echo "Lunas";
                        } else {
                            echo "Belum Lunas";
                        } ?></td>
                    <td>
                        <a href="<?= base_url(); ?>transaksi/detail_pesanan/<?= $t['kode_transaksi']; ?>" class="badge badge-primary">Detail</a>
                        <a href="<?= base_url(); ?>transaksi/hapus/<?= $t['kode_transaksi']; ?>" class="badge badge-danger" onclick="javasciprt : return confirm('Are You Sure ?')">Hapus</a>
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

<!-- Modal -->
<div class="modal fade" id="newPesananModal" tabindex="-1" role="dialog" aria-labelledby="newPesananLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newPesananModalLabel">Tambah Pesanan Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('transaksi/pesanan_add'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_tani">ID Petani</label>
                        <select name="id_tani" id="id_tani" class="form-control" required />
                        <option value="">Pilih ID</option>
                        <?php foreach ($tani as $t) : ?>
                            <option value="<?= $t['id_tani']; ?>"><?= $t['username']; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pupuk">Pupuk</label>
                        <select name="id_pupuk" id="id_pupuk" class="form-control" required>
                            <option value="">Pilih Pupuk</option>
                            <?php foreach ($pupuk as $p) : ?>
                                <option value="<?= $p['id_pupuk']; ?>" harga="<?= $p['harga_pupuk']; ?>"><?= $p['nama_pupuk'] . " Rp." . $p['harga_pupuk']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="harga_pupuk">Harga Pupuk</label>
                        <input type="number" name="harga_pupuk" class="form-control" id="harga_pupuk" required />
                    </div>
                    <div class="form-group">
                        <label for="tgl_pesanan">Tanggal Pesanan</label>
                        <input type="date" name="tgl_pesanan" class="form-control" id="tgl_pesanan" required />
                    </div>
                    <div class="form-group">
                        <label for="jumlah_pupuk">Jumlah Pupuk</label>
                        <input type="number" name="jumlah_pupuk" class="form-control" id="jumlah_pupuk" onchange="return totalbayar()" required />
                        <div class="form-group">
                            <label for="total_bayar">Total Bayar</label>
                            <input type="number" name="total_bayar" class="form-control" id="total_bayar" />
                        </div>
                        <div class="form-group">
                            <label for="status_bayar">Status Pembayaran</label>
                            <select class="form-control" name="status_bayar" id="status_bayar">
                                <option value="0" <?php if ('status_bayar' == 0) echo "selected" ?>>Belum Lunas</option>
                                <option value="1" <?php if ('status_bayar' == 1) echo "selected" ?>>Lunas</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function totalbayar() {
        var select = document.getElementById("id_pupuk");
        var selected = select.options[select.selectedIndex];
        var harga = parseInt(selected.getAttribute('harga'));
        var jumlah = parseInt(document.getElementById("jumlah_pupuk").value);


        console.log(harga);
        console.log(jumlah);

        var total = document.getElementById("total_bayar");
        total.value = harga * jumlah;
    }
</script>