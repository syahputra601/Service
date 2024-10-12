<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Keuangan Tahunan ADI MOTOR</h1>
<center>
<?php
    $print_keuangan = base_url('TRX/cetak_report_keuangan_year?Year='.@$year_now);
?>
    <a href="<?= @$print_keuangan ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$year_now ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Tahun</td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr>
            <tr style="text-align: center;">
                <td><?= @$year_now ?></td>
                <td><?= @$DebitYearTotal ?></td>
                <td><?= @$KreditYearTotal ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Total Kas</td>
                <td colspan="2"><?= @$YearAllTotal ?></td>
            </tr>
        </table>
    </div>
    <br>
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