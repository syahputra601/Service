<html>
<head>
    <title>Cetak Struk Antrian</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Transaksi ADI MOTOR</h1>
<br>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor</td>
                <td>No Invoice</td>
                <td>Tanggal</td>
                <td>No Nota</td>
                <td>Nama Pelanggan</td>
                <td>Jenis Trx</td>
                <td>Total</td>
            </tr>
            <?php
            $no=0;
            foreach($Trx as $row){
              $no++;
            if($row->jenis_service == "ServiceUmum"){
                $JenisService = "Service Umum";
            }elseif($row->jenis_service == "HomeService"){
                $JenisService = "Home Service";
            }else{  
                $JenisService = "Undifined";
            }
            ?>
            <tr style="text-align: center;">
              <td><?php echo $no ?></td>
              <td><?php echo $row->no_invoice ?></td>
              <td><?php echo $row->tanggal ?></td>
              <td><?php echo $row->no_nota ?></td>
              <td><?php echo $row->nama_pel ?></td>
              <td><?php echo $JenisService ?></td>
              <td><?php echo $row->total ?></td>
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
        <br>
        <p>(__________________________)</p>
    </div>
</div>
</body>
</html>