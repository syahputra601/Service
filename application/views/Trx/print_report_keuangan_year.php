<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Keuangan Tahunan ADI MOTOR</h1>
<br>
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
                <td>Total</td>
                <td colspan="2"><?= @$YearAllTotal ?></td>
            </tr>
        </table>
    </div>
    <br>
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