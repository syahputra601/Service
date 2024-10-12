<html>
<head>
    <title>Cetak Struk Antrian</title>
</head>
<body>
<?php
foreach ($Antrian as $row) {
    $Vid_antrian = $row["id_antrian"];
    $Vkode_antrian= $row["kode_antrian"];
    $Vusername = $row["username"];
    $Vtanggal_masuk = $row["tanggal_masuk"];
    $Vwaktu_masuk = $row["waktu_masuk"];
    $Vstatus = $row["status"];
}
if($Vstatus == 0){
    $Status = "Belum Terlayani";
}elseif($Vstatus == 1){
    $Status = "Terlayani";
}elseif ($Vstatus == 2) {
    $Status = "Tidak Terlayani";
}else{
    $Status = "Undinifed";
}
?>
<h1 style="text-align: center;">Struk Antrian</h1>
<center>
<?php
    $print_antrian = base_url('Antrian/cetak_pdf?id_antrian='.$Vid_antrian);
?>
    <a href="<?= @$print_antrian ?>">Cetak Data</a><br><br>
</center>
<div style="padding-left: 35%; padding-right: 35%;">
    <div style="border: 1px solid; padding: 5px;">
        <div style="border: 1px solid;">
            <table border="0" width="">
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= @$Vtanggal_masuk ?></td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td><?= @$Vwaktu_masuk ?></td>
                </tr>
            </table>
        </div>
        <div style="height: 5px;"></div>
        <div style="border: 1px solid;">
            <table border="0" style="text-align: center;">
                <tr>
                    <td style="padding-left: 145px; padding-top: 10px;">Kode Antrian :</td>
                </tr>
                <tr>
                    <td style="padding-left: 145px; padding-top: 10px;"><?= @$Vkode_antrian ?></td>
                </tr>
                <tr>
                    <td style="padding-top: 10px;"></td>
                </tr>
            </table>
        </div>
        <div style="height: 5px;"></div>
        <div style="border: 1px solid;">
            <table border="0" style="text-align: center;">
                <tr>
                    <td style="padding-left: 65px;">Silahkan Menunggu Kode Aantrian Anda.</td>
                </tr>
                <tr>
                    <td style="padding-left: 65px;">Terimakasih.</td>
                </tr>
            </table>
        </div>
    </div>
</div>
</body>
</html>