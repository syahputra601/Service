<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Keuangan Harian ADI MOTOR</h1>
<br>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <h2>Laporan Keuangan Harian Debit</h2>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>Nomor Invoice</td>
                <td>Tanggal Debit</td>
                <td>Debit</td>
            </tr>
            <?php
            $no=0;
            foreach($Debit as $row_debit){
            $no++;
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row_debit->no_invoice ?></td>
              <td><?php echo $row_debit->tanggal ?></td>
              <td><?php echo $row_debit->total ?></td>
            </tr>
            <?php }?> 
        </table>
    </div>
    <br>
    <div>
        <h2>Laporan Keuangan Harian Kredit</h2>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>Nomor PO</td>
                <td>Tanggal Kredit</td>
                <td>Kredit</td>
            </tr>
            <?php
            $no=0;
            foreach($Kredit as $row_kredit){
            $no++;
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row_kredit->nomor_po ?></td>
              <td><?php echo $row_kredit->tanggal_po ?></td>
              <td><?php echo $row_kredit->total ?></td>
            </tr>
            <?php }?> 
        </table>
    </div>
    <br>
    <div>
        <h2>Total Debit & Kredit</h2>
        <!-- <p>Periode : <?= @$date_start." - ".@$date_end ?></p> -->
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td></td>
                <td>Debit</td>
                <td>Kredit</td>
            </tr>
            <tr style="text-align: center;">
                <td>Total</td>
                <td><?= @$DebitTotal ?></td>
                <td><?= @$KreditTotal ?></td>
            </tr>
            <tr style="text-align: center;">
                <td>Total Kas</td>
                <td colspan="2"><?= @$KasTotal ?></td>
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
        <br>
        <p>(__________________________)</p>
    </div>
</div>
</body>
</html>