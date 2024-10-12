<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>

<center>
<?php
    $print_penitipan = base_url('PenitipanMotor/cetak_report_tandaterima_penitipan?id_penitipan='.@$id_penitipan);
?>
    <a href="<?= @$print_penitipan ?>" target="_blank">Cetak Data</a><br><br>
</center>
<?php
foreach ($Penitipan as $row) {
    $id_penitipan = $row["id_penitipan"];
    $no_penitipan = $row["no_penitipan"];
    $no_kendaraan = $row["no_kendaraan"];
    $nama_pemilik = $row["nama_pemilik"];
    $no_telp = $row["no_telp"];
    $nama_penerima = $row["nama_penerima"];
    $tgl_penitipan = $row["tgl_penitipan"];
    $tgl_ambil = $row["tgl_ambil"];
    $status = $row["status"];
}
if($status == 0){
    $StatusPenitipan = "Belum DiAmbil";
}elseif($status == 1){
    $StatusPenitipan = "Sudah DiAmbil";
}else{
    $StatusPenitipan = "Undifined";
}
?>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <table border="1" style="width: 100%; height: 80%;">
            <tr style="height: 5%;">
                <td>
                    <h1 style="text-align: center;">Tanda Terima Penitipan Motor</h1>
                </td>
            </tr>
            <tr style="height: 1%;"></tr>
            <tr style="height: 80%;">
                <td>
                    <table border="0" style="width: 100%; height: 80%; padding-left: 2%; padding-right: 2%;">
                        <tr style="height: 1%;"></tr>
                        <tr>
                            <td style="width: 28%;">Telah Diterima Motor dengan Nomor Polisi</td>
                            <td><center>:</center></td>
                            <td><?= @$no_kendaraan ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Pemilik/Atas Nama</td>
                            <td><center>:</center></td>
                            <td><?= @$nama_pemilik ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2">Untuk dilakukan perbaikan di Bengkel ADI MOTOR</td>
                            <!-- <td></td> -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 7%;"></tr>
                        <tr>
                            <td>Yang Menerima</td>
                            <td><center>:</center></td>
                            <td><?= @$nama_penerima ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style="height: 15%;"></tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;">Pemilik Motor</td>
                            <td></td>
                            <td style="text-align: center;">Yang Menerima</td>
                        </tr>
                        <tr style="height: 15%;"></tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style="text-align: center;"><?= @$nama_pemilik ?></td>
                            <td></td>
                            <td style="text-align: center;"><?= @$nama_penerima ?></td>
                        </tr>
                        <tr style="height: 0%;"></tr>
                        <tr>
                            <td colspan="2">
                                <small>
                                    <p>
                                        <i>Estimasi Perbaikan paling lama 3 hari</i>
                                    </p>
                                </small>
                            </td>
                            <!-- <td></td> -->
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>