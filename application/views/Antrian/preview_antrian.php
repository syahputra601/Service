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
    $Vtipe_antrian = $row["tipe_antrian"];
    $Vkode_jam_antrian= $row["kode_jam_antrian"];
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
if($Vtipe_antrian == 'Bengkel'){
    $TipeAntrian = "Bengkel";
}elseif($Vtipe_antrian == 'HomeService'){
    $TipeAntrian = "Online";
}else{
    $TipeAntrian = "Undinifed";
}
if($Vkode_jam_antrian == 'A1'){
    $JamAntrian = 'Jam 8-9 (08.00 - 08.30)';
}elseif($Vkode_jam_antrian == 'A2'){
    $JamAntrian = 'Jam 8-9 (08.30 - 09.00)';
}elseif($Vkode_jam_antrian == 'B1'){
    $JamAntrian = 'Jam 9-10 (09.00 - 09.30)';
}elseif($Vkode_jam_antrian == 'B2'){
    $JamAntrian = 'Jam 9-10 (09.30 - 10.00)';
}elseif($Vkode_jam_antrian == 'C1'){
    $JamAntrian = 'Jam 10-11 (10.00 - 10.30)';
}elseif($Vkode_jam_antrian == 'C2'){
    $JamAntrian = 'Jam 10-11 (10.30 - 11.00)';
}elseif($Vkode_jam_antrian == 'D1'){
    $JamAntrian = 'Jam 11-12 (11.00 - 11.30)';
}elseif($Vkode_jam_antrian == 'D2'){
    $JamAntrian = 'Jam 11-12 (11.30 - 12.00)';
}elseif($Vkode_jam_antrian == 'E1'){
    $JamAntrian = 'Jam 13-14 (13.00 - 13.30)';
}elseif($Vkode_jam_antrian == 'E2'){
    $JamAntrian = 'Jam 13-14 (13.30 - 14.00)';
}elseif($Vkode_jam_antrian == 'F1'){
    $JamAntrian = 'Jam 14-15 (14.00 - 14.30)';
}elseif($Vkode_jam_antrian == 'F2'){
    $JamAntrian = 'Jam 14-15 (14.30 - 15.00)';
}elseif($Vkode_jam_antrian == 'G1'){
    $JamAntrian = 'Jam 15-16 (15.00 - 15.30)';
}elseif($Vkode_jam_antrian == 'G2'){
    $JamAntrian = 'Jam 15-16 (15.30 - 16.00)';
}elseif($Vkode_jam_antrian == 'H1'){
    $JamAntrian = 'Jam 16-17 (16.00 - 16.30)';
}elseif($Vkode_jam_antrian == 'H2'){
    $JamAntrian = 'Jam 16-17 (16.30 - 17.00)';
}else{
    $JamAntrian = "Undifined Kode";
}
?>
<h1 style="text-align: center;">Struk Antrian</h1>
<center>
<?php
    $print_antrian = base_url('Antrian/cetak_pdf?id_antrian='.$Vid_antrian);
?>
    <a href="<?= @$print_antrian ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 35%; padding-right: 35%;">
    <div style="border: 1px solid; padding: 5px;">
        <div style="border: 1px solid;">
            <table border="0" width="">
                <tr>
                    <td>Tipe Antrian</td>
                    <td>:</td>
                    <td><?= @$TipeAntrian ?></td>
                </tr>
                <?php
                if($Vtipe_antrian == 'Bengkel'){
                ?>
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
                <?php 
                }elseif($Vtipe_antrian == 'HomeService'){
                ?>
                <tr>
                    <td>Tanggal Reservasi</td>
                    <td>:</td>
                    <td><?= @$Vtanggal_masuk ?></td>
                </tr>
                <tr>
                    <td>Waktu Reservasi</td>
                    <td>:</td>
                    <td><?= @$JamAntrian ?></td>
                </tr>
                <?php
                }else{
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php
                }
                ?>
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
                    <td style="padding-left: 65px;">Silahkan Menunggu Kode Antrian Anda.</td>
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