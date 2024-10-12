<html>
<head>
    <title>Cetak Nota Pembayaran</title>
</head>
<body>
<?php
    foreach ($TrxHeader as $header) {
        $id_transaksi = $header['id_transaksi'];
        $no_invoice = $header['no_invoice'];
        $tanggal = $header['tanggal'];
        $no_nota = $header['no_nota'];
        $nama_pel = $header['nama_pel'];
        $jenis_service = $header['jenis_service'];
        $nip = $header['nip'];
        $biaya_jasa = $header['biaya_jasa'];
        $keterangan = $header['keterangan'];
        $total = $header['total'];
    }
$TotalFixGrand = $biaya_jasa + @$TotalGrand;
?>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <h2>Nota Pembayaran</h2>
        <div style="height: 7px;"></div>
        <table border="0" style="width: 100%;">
            <tr>
                <td>ADI MOTOR</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>SERVICE MOTOR</td>
                <td>NO. NOTA</td>
                <td><center>:</center></td>
                <td><?= @$no_nota ?></td>
            </tr>
            <tr>
                <td>CENGKARENG, JAKARTA BARAT</td>
                <td>Tanggal</td>
                <td><center>:</center></td>
                <td><?= @$tanggal ?></td>
            </tr>
        </table>
        <div style="height: 25px;"></div>
        <table border="0" style="width: 50%;">
            <tr>
                <td>Nama Pelanggan</td>
                <td><center>:</center></td>
                <td style="width: 45%;"><?= @$nama_pel ?></td>
            </tr>
        </table>
        <div style="height: 10px;"></div>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>No</td>
                <td>Nama Spare Part</td>
                <td>Harga Satuan</td>
                <td>Qty</td>
                <td>Total</td>
            </tr>
            <?php
            $no=0;
            foreach($TrxDetail as $detail){
            $no++;
            $Join = $detail->harga_total / $detail->qty_detail;
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $detail->nama_sparepart_detail ?></td>
              <td><?php echo $Join ?></td>
              <td><?php echo $detail->qty_detail ?></td>
              <td><?php echo $detail->harga_total ?></td>
            </tr>
            <?php }?> 
            <tr style="text-align: center;"> 
                <td colspan="4">Biaya Jasa</td>
                <td><?= @$biaya_jasa ?></td>
            </tr>
            <tr style="text-align: center;"> 
                <td colspan="4">Grand Total</td>
                <td><?= @$TotalGrand ?></td>
            </tr>
        </table>
    </div>
    <br>
    <div style="text-align: right; padding-right: 5%;">
        <br>
        <p>TANGGERANG, <?= @$date_now ?></p>
        <p>HORMAT KAMI</p>
        <br>
        <br>
        <br>
        <?php
        if($this->session->userdata('role') == 0){
        ?>
        <b><u><?= @$nama ?></u></b>
        <?php
        }
        ?>
        <p style="padding-right: 35px;">Kasir</p>
    </div>
</div>
</body>
</html>