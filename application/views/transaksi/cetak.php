<?php

$tb_detail_transaksi = $this->db->get('tb_detail_transaksi')->result_array();


$html .= ' 
<!DOCTYPE html>
<html lang="en">
<body>
<h1>Daftar Penjualan Ramadhani Pupuk</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Kode Transaksi</th>
                <th>Id Pupuk</th>
                <th>Harga Pupuk</th>
                <th>Jumlah Pupuk</th>
                <th>Total Pupuk</th>
                <th>Status</th>
            </tr>';
$i = 1;
foreach ($tb_detail_transaksi as $row) {
    $html .= '<tr>
                <td>' . $i++ . '</td>
                <td>' . $row["kode_transaksi"] . '</td>
                <td>' . $row["id_pupuk"] . '</td>
                <td>' . $row["harga_pupuk"] . '</td>
                <td>' . $row["jumlah_pupuk"] . '</td>
                <td>' . $row["total_pupuk"] . '</td>
                <td>' . $row["status"] . '</td>
            </tr>';
}

$html .= '</table>
</body>
</html>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output('data-penjualan.pdf', 'I');
