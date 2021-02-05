<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Informasi Kios Tani Ramadhani</h1>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Penghasilan Pupuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Rp." . $total_transaksi . ",-" ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Petani</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $user_petani ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_transaksi ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Pesanan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pesanan ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
                    <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myChart"></canvas>
                        <?php
                        //Inisialisasi nilai variabel awal
                        $nama_pupuk = "";
                        $jumlah = null;
                        foreach ($hasil as $item) {
                            $pupuk = $item->id_pupuk;
                            $nama_pupuk .= "'$pupuk'" . ", ";
                            $jum = $item->jumlah_pupuk;
                            $jumlah .= "$jum" . ", ";
                        }
                        ?>
                        <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'bar',
                                // The data for our dataset
                                data: {
                                    labels: [<?php echo $nama_pupuk; ?>],
                                    datasets: [{
                                        label: 'Data Jumlah Pupuk',
                                        backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)', 'rgb(175, 238, 239)'],
                                        borderColor: ['rgb(255, 99, 132)'],
                                        data: [<?php echo $jumlah; ?>]
                                    }]
                                },
                                // Configuration options go here
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                    <script src="<?= base_url('assets/'); ?>js/Chart.js"></script>
                </div>
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="mytglChart"></canvas>
                        <?php
                        //Inisialisasi nilai variabel awal
                        $tgl_transaksi = "";
                        $status_transaksi = null;
                        foreach ($transaksi as $item) {
                            $hari = $item->tgl_bayar;
                            $tgl_transaksi .= "'$hari'" . ", ";
                            $status = $item->status_transaksi;
                            $status_transaksi .= "$status" . ", ";
                        }
                        ?>
                        <script>
                            var ctx = document.getElementById('mytglChart').getContext('2d');
                            var chart = new Chart(ctx, {
                                // The type of chart we want to create
                                type: 'line',
                                // The data for our dataset
                                data: {
                                    labels: [<?php echo $tgl_transaksi; ?>],
                                    datasets: [{
                                        label: 'Data Transaksi Per Hari',
                                        fillColor: "rgba(220,220,220,0.2)",
                                        strokeColor: "rgba(220,220,220,1)",
                                        pointColor: "rgba(220,220,220,1)",
                                        pointStrokeColor: "#fff",
                                        pointHighlightFill: "#fff",
                                        pointHighlightStroke: "rgba(220,220,220,1)",
                                        data: [<?php echo $status_transaksi; ?>]
                                    }]
                                },
                                // Configuration options go here
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                        </script>
                    </div>
                    <hr>
                </div>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->