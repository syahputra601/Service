<html>
<head>
    <title>Cetak Laporan</title>
</head>
<body>
<h1 style="text-align: center;">Laporan Penitipan Motor ADI MOTOR</h1>
<div style="padding-left: 5%; padding-right: 5%;">
    <div>
        <p>Periode : <?= @$date_start." - ".@$date_end ?></p>
        <table border="1" style="width: 100%;">
            <tr style="text-align: center;">
                <td>Nomor Penitipan</td>
                <td>Nomor Kendaraan</td>
                <td>Nama Pemilik</td>
                <td>Telepon</td>
                <td>Nama Penerima</td>
                <td>Tanggal Penitipan</td>
                <td>Tanggal Ambil</td>
            </tr>
            <?php
            $no=0;
            foreach($Penitipan as $row){
            $no++;
            ?>
            <tr style="text-align: center;">
              <td><?php echo $row->no_penitipan ?></td>
              <td><?php echo $row->no_kendaraan ?></td>
              <td><?php echo $row->nama_pemilik ?></td>
              <td><?php echo $row->no_telp ?></td>
              <td><?php echo $row->nama_penerima ?></td>
              <td><?php echo $row->tgl_penitipan ?></td>
              <td><?php echo $row->tgl_ambil ?></td>
            </tr>
            <?php }?> 
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