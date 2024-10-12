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
<div style="padding-left: 0%; padding-right: 0%;">
    <div style="border: 1px solid; padding: 5px;">
        <div style="border: 1px solid;">
            <table border="0" style="width: 100%;">
                <tr>
                    <td>
                        <div style="width: 100%;">
                            <h1 style="text-align: center;">Tanda Terima Penitipan Motor</h1>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="height: 2px; border: 0px solid;"></div>
        <div style="height: 7px; border: 1px solid;"></div>
        <div style="height: 25px;"></div>
        <div style="padding-left: 2%; padding-right: 5%;">
            <div style="width: 100%;">
               <table border="0" style="width: 100%;">
                    <tr>
                        <td style="width: 27%;">Telah Diterima Motor dengan Nomor Polisi</td>
                        <td style="width: 2%;"><center>:</center></td>
                        <td><?= @$no_kendaraan ?></td>
                    </tr>
                    <tr>
                        <td>Pemilik/Atas Nama</td>
                        <td><center>:</center></td>
                        <td><?= @$nama_pemilik ?></td>
                    </tr>
                    <tr>
                        <td colspan="2">Untuk dilakukan perbaikan di Bengkel ADI MOTOR</td>
                        <!-- <td></td> -->
                        <td></td>
                    </tr>
                    <tr>
                        <td>Yang Menerima</td>
                        <td><center>:</center></td>
                        <td><?= @$nama_penerima ?></td>
                    </tr>
                </table> 
            </div>
            <div style="height: 35px;"></div>
            <div style="width: 100%;">
               <table border="0" style="width: 100%;">
                    <tr>
                        <td></td>
                        <td style="width: 55%;"></td>
                        <td style="text-align: center; width: 12%;">Pemilik Motor</td>
                        <td style="text-align: center; width: 12%;">Yang Menerima</td>
                    </tr>
                    
                </table>
                <div style="height: 45px;"></div>
                <table border="0" style="width: 100%;">
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="text-align: center; "><?= @$nama_pemilik ?></td>
                        <td style="text-align: center;"><?= @$nama_penerima ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">
                            <small>
                                <p>
                                    <i>Estimasi Perbaikan paling lama 3 hari</i>
                                </p>
                            </small>
                        </td>
                        <td style="width: 56%;"></td>
                        <td style="width: 12%;"></td>
                        <td></td>
                    </tr>
                </table> 
            </div>
        </div>
        <div style="height: 5px;"></div>
    </div>
</div>
</body>
</html>