<html>
<head>
    <title>Cetak Struk Antrian</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Pengajuan PO ADI MOTOR</h1>
<center>
<?php
    $print_po = base_url('PO/cetak_report_po?date_start='.@$date_start.'&date_end='.@$date_end);
?>
    <a href="<?= @$print_po ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>Nomor PO</td>
                <td>Tanggal</td>
                <td>SKU</td>
                <td>Qty</td>
                <td>Harga</td>
            </tr>
            <?php
            $no=0;
            foreach($PO as $row){
              $no++;
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row->nomor_po ?></td>
              <td><?php echo $row->tanggal_po ?></td>
              <td><?php echo $row->sku_detail ?></td>
              <td><?php echo $row->qty_detail ?></td>
              <td><?php echo $row->total_harga ?></td>
            </tr>
            <?php }?> 
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