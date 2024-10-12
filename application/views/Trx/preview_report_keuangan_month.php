<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Keuangan Bulanan ADI MOTOR</h1>
<center>
<?php
    $print_keuangan = base_url('TRX/cetak_report_keuangan_month?Year='.@$year_now);
?>
    <a href="<?= @$print_keuangan ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$year_now ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Bulan</td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr>
            <tr style="text-align: center;">
                <td>Januari</td>
                <td><?= @$TotalDebitJanuari ?></td>
                <td><?= @$TotalKreditJanuari ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Februari</td>
                <td><?= @$TotalDebitFebruari ?></td>
                <td><?= @$TotalKreditFebruari ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Maret</td>
                <td><?= @$TotalDebitMaret ?></td>
                <td><?= @$TotalKreditMaret ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>April</td>
                <td><?= @$TotalDebitApril ?></td>
                <td><?= @$TotalKreditApril ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Mei</td>
                <td><?= @$TotalDebitMei ?></td>
                <td><?= @$TotalKreditMei ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Juni</td>
                <td><?= @$TotalDebitJuni ?></td>
                <td><?= @$TotalKreditJuni ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Juli</td>
                <td><?= @$TotalDebitJuli ?></td>
                <td><?= @$TotalKreditJuli ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Agustus</td>
                <td><?= @$TotalDebitAgustus ?></td>
                <td><?= @$TotalKreditAgustus ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Oktober</td>
                <td><?= @$TotalDebitOktober ?></td>
                <td><?= @$TotalKreditOktober ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>November</td>
                <td><?= @$TotalDebitNovember ?></td>
                <td><?= @$TotalKreditNovember ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Desember</td>
                <td><?= @$TotalDebitDesember ?></td>
                <td><?= @$TotalKreditDesember ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Total</td>
                <td><?= @$TotalDebitAlll ?></td>
                <td><?= @$TotalKreditAlll ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Total Kas</td>
                <td colspan="2"><?= @$TotalKas ?></td>
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