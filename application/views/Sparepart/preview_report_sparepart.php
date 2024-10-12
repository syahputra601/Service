<html>
<head>
    <title>Cetak Struk Antrian</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Sparepart ADI MOTOR</h1>
<center>
<?php
    $print_sparepart = base_url('Sparepart/cetak_report_sparepart?date_start='.@$date_start.'&date_end='.@$date_end);
?>
    <a href="<?= @$print_sparepart ?>" target="_blank">Cetak Data</a><br><br>
</center>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>SKU</td>
                <td>Nama Sparepart</td>
                <td>Qty</td>
                <td>Harga</td>
                <td>Tanggal</td>
                <td>Status</td>
            </tr>
            <?php
            $no=0;
            foreach($Sparepart as $row){
              $no++;
            if($row->status == 0){
                $Status = "Stok Kosong";
            }elseif($row->status == 1){
                $Status = "Stok Tersedia";
            }else{
                $Status = "Undifined";
            }
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row->sku ?></td>
              <td><?php echo $row->nama_sparepart ?></td>
              <td><?php echo $row->qty ?></td>
              <td><?php echo $row->harga ?></td>
              <td><?php echo $row->tanggal ?></td>
              <td><?php echo $Status ?></td>
            </tr>
            <?php }?> 
            <tr style="text-align: center;">
                <td colspan="6">
                    Total Stok Tersedia
                </td>
                <td>
                    <?= @$JumlahTersedia ?>
                </td>
            </tr>
             <tr style="text-align: center;">
                <td colspan="6">
                    Total Stok Kosong
                </td>
                <td>
                    <?= @$JumlahTidakTersedia ?>
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