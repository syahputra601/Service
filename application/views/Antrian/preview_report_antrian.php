<html>
<head>
    <title>Cetak Struk Antrian</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Antrian ADI MOTOR</h1>
<center>
<?php
    $print_antrian = base_url('Antrian/cetak_report_antrian?date_start='.@$date_start.'&date_end='.@$date_end);
?>
    <a href="<?= @$print_antrian ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>Kode Antrian</td>
                <td>Nama</td>
                <td>Tipe Antrian</td>
                <td>Tanggal</td>
                <td>Waktu</td>
                <td>Status</td>
            </tr>
            <?php
            $no=0;
            foreach($Antrian as $row){
              $no++;
            if($row->tipe_antrian == 'Bengkel'){
                $TipeAntrian = "Antrian Bengkel";
            }elseif($row->tipe_antrian == 'HomeService'){
                $TipeAntrian = "Antrian Online";
            }else{
                $TipeAntrian = "Undifined";
            }
            if($row->status == 0){
                $Status = "Belum Terlayani";
            }elseif($row->status == 1){
                $Status = "Terlayani";
            }else{
                $Status = "Undifined";
            }
            if($row->tipe_antrian == 'Bengkel'){
                $TipeAntrian = "Antrian Bengkel";
            }elseif($row->tipe_antrian == 'HomeService'){
                $TipeAntrian = "Antrian Online";
            }else{
                $TipeAntrian = "Undifined";
            }
            if($row->kode_jam_antrian == NULL || $row->kode_jam_antrian == ''){
                $JamAntrian = $row->waktu_masuk;
            }elseif ($row->kode_jam_antrian != NULL || $row->kode_jam_antrian != '') {
                if($row->kode_jam_antrian == 'A1'){
                    $JamAntrian = 'Jam 8-9 (08.00 - 08.30)';
                }elseif($row->kode_jam_antrian == 'A2'){
                    $JamAntrian = 'Jam 8-9 (08.30 - 09.00)';
                }elseif($row->kode_jam_antrian == 'B1'){
                    $JamAntrian = 'Jam 9-10 (09.00 - 09.30)';
                }elseif($row->kode_jam_antrian == 'B2'){
                    $JamAntrian = 'Jam 9-10 (09.30 - 10.00)';
                }elseif($row->kode_jam_antrian == 'C1'){
                    $JamAntrian = 'Jam 10-11 (10.00 - 10.30)';
                }elseif($row->kode_jam_antrian == 'C2'){
                    $JamAntrian = 'Jam 10-11 (10.30 - 11.00)';
                }elseif($row->kode_jam_antrian == 'D1'){
                    $JamAntrian = 'Jam 11-12 (11.00 - 11.30)';
                }elseif($row->kode_jam_antrian == 'D2'){
                    $JamAntrian = 'Jam 11-12 (11.30 - 12.00)';
                }elseif($row->kode_jam_antrian == 'E1'){
                    $JamAntrian = 'Jam 13-14 (13.00 - 13.30)';
                }elseif($row->kode_jam_antrian == 'E2'){
                    $JamAntrian = 'Jam 13-14 (13.30 - 14.00)';
                }elseif($row->kode_jam_antrian == 'F1'){
                    $JamAntrian = 'Jam 14-15 (14.00 - 14.30)';
                }elseif($row->kode_jam_antrian == 'F2'){
                    $JamAntrian = 'Jam 14-15 (14.30 - 15.00)';
                }elseif($row->kode_jam_antrian == 'G1'){
                    $JamAntrian = 'Jam 15-16 (15.00 - 15.30)';
                }elseif($row->kode_jam_antrian == 'G2'){
                    $JamAntrian = 'Jam 15-16 (15.30 - 16.00)';
                }elseif($row->kode_jam_antrian == 'H1'){
                    $JamAntrian = 'Jam 16-17 (16.00 - 16.30)';
                }elseif($row->kode_jam_antrian == 'H2'){
                    $JamAntrian = 'Jam 16-17 (16.30 - 17.00)';
                }else{
                    $JamAntrian = "Undifined Kode";
                }
            }else{
                $JamAntrian = "Undifined";
            }
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row->kode_antrian ?></td>
              <td><?php echo $row->Name ?></td>
              <td><?php echo $TipeAntrian ?></td>
              <td><?php echo $row->tanggal_masuk ?></td>
              <td><?php echo $JamAntrian ?></td>
              <td><?php echo $Status ?></td>
            </tr>
            <?php }?> 
            <tr style="text-align: center;">
                <td colspan="6">
                    Total Terlayani
                </td>
                <td>
                    <?= @$JumlahTerlayani ?>
                </td>
            </tr>
             <tr style="text-align: center;">
                <td colspan="6">
                    Total Lost
                </td>
                <td>
                    <?= @$JumlahLost ?>
                </td>
            </tr>
        </table>
    </div>
    <div style="text-align: right; padding-right: 5%;">
        <br>
        <p>.........................., <?= @$date_now ?></p>
        <br>
        <br>
        <br>
        <p>(__________________________)</p>
    </div>
</div>
</body>
</html>