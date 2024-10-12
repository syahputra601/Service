<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Form</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Kode Antrian</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Form Transaksi</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Form Transaksi
                            </h2>
                        </div>
                        <div class="body">
                            <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 100%; text-align: center;">
                                            <!-- <label class="form-label">Kode Antrian :</label> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 100%; text-align: center;">
                                            <div style="width: 100%; padding-left: 43%; padding-right: 43%;">
                                                <input type="hidden" class="form-control" name="header[kode_antrian]" id="kode_antrian" placeholder="Kode Antrian" required="" value="<?= @$kode_antrian ?>">
                                                <input type="hidden" class="form-control" name="header[username]" id="username" placeholder="Kode Antrian" required="" value="<?= @$username ?>">
                                                <input type="hidden" class="form-control" name="header[created_by]" id="created_by" placeholder="Created By" required="" value="<?= @$created_by ?>">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table style="width: 100%;" border="0">
                                    <tr>
                                        <td style="width: 4%;">
                                            <label class="form-label">No Invoice :</label>
                                        </td>
                                        <td style="width: 10%;">
                                            <input type="hidden" class="form-control" name="header[no_invoice]" id="no_invoice" value="<?= @$no_invoice ?>" placeholder="No Invoice" readonly>
                                            <label class="form-label"><?= @$no_invoice ?></label>
                                        </td>
                                        <td style="width: 20%;"></td>
                                        <td style="width: 3%;">
                                            <label class="form-label">Tanggal :</label>
                                        </td>
                                        <td style="width: 5%;">
                                            <input type="hidden" class="form-control" name="header[tanggal]" id="tgl_trx" value="<?= @$date_in ?>" placeholder="Tanggal" readonly>
                                            <label class="form-label"><?= @$date_in ?></label>
                                        </td>
                                    </tr>
                                    <tr style="height: 15px;"></tr>
                                </table>
                                <table style="width: 100%;" border="0">
                                    <tr>
                                        <td style="width: 15%;">
                                            <label class="form-label">No Nota</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="header[no_nota]" id="no_nota" placeholder="No Nota" value="" required="">
                                        </td>
                                        <td style="width: 15%;"></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Nama Pelanggan</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="header[nama_pel]" id="nama_pelanggan" placeholder="Nama Pelanggan" value="" onkeypress="return /[a-z ]/i.test(event.key)" required="">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Jenis Transaksi</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <select class="form-control" name="header[jenis_service]" id="jenis_transaksi" required="">
                                                <option value="00">--Pilih Data--</option>
                                                <option value="ServiceUmum">Service Umum</option>
                                                <option value="HomeService">Home Service</option>
                                            </select>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Nama Mekanik</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <select class="form-control" name="header[nip]" id="nama_mekanik" required="">
                                                <option value="00" selected="">--Pilih Data--</option>
                                                <?php
                                                foreach ($select_mekanik as $value ) {
                                                ?>
                                                <option value="<?php echo $value['nip']; ?>" >
                                                <?php echo $value['nama_mekanik']; ?>
                                                </option>
                                                <?php  } ?>
                                            </select>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Biaya Jasa Service</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <!-- onkeyup="copytextbox();" -->
                                            <input type="number" class="form-control" name="header[biaya_jasa]" id="biaya_jasa" placeholder="Biaya Jasa Service" onkeyup="copytextbox();" value="0" required="">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Merk Motor</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="header[merk_motor]" id="merk_motor" placeholder="Merk Motor" value="" required="">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Model Motor</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="header[model_motor]" id="model_motor" placeholder="Model Motor" value="" required="">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Tipe Motor</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="header[tipe_motor]" id="tipe_motor" placeholder="Tipe Motor" value="" required="">
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 10px;"></tr>
                                    <tr>
                                        <td>
                                            <label class="form-label">Keterangan</label>
                                        </td>
                                        <td>
                                            <center>
                                                <label class="form-label">:</label>
                                            </center>
                                        </td>
                                        <td>
                                            <textarea rows="4" name="header[keterangan]" id="keterangan" class="form-control no-resize" placeholder="Keterangan ..."required=""></textarea>
                                        </td>
                                        <td></td>
                                    </tr>
                                    <tr style="height: 15px;"></tr>
                                </table>
                                <div class="">
                                    <div class="panel panel-green">
                                        <div class="panel-heading">
                                            <button type="button" id="addrow" class="btn btn-default">Tambah</button>
                                        </div>
                                        <!-- /.panel-heading -->
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" style="width: 100%;" id="tabledata">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th style="width: 15%;">SKU</th>
                                                        <th style="width: 30%;">Nama Sparepart</th>
                                                        <th>Harga</th>
                                                        <th>Jumlah</th>
                                                        <!-- <th>Keterangan</th> -->
                                                        <th>Total Harga</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <!-- add row using javascript -->
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th colspan="5" style="text-align: right"><label class="form-label" for="total" style="padding-top: 6px;">Total :</label></th>
                                                    <th>
                                                        <div class="form-group">
                                                            <?php
                                                            $total = array(
                                                                "name" => "header[total]",
                                                                "id" => "total",
                                                                "type" => "text",
                                                                "class" => "form-control",
                                                                "readonly" => "true",
                                                            );

                                                            echo form_input($total);
                                                            ?>
                                                        </div>
                                                    </th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <!-- /.table-responsive -->
                                       <?php
                                       // echo form_submit("save","Save","class='btn btn-success'") ;
                                       ?>
                                       <table style="width: 100%;" border="0">
                                            <tr style=""></tr>
                                            <tr>
                                                <td>
                                                    <center>
                                                            <button class="btn btn-primary waves-effect" id="SaveTrx" name="SaveTrx" type="submit">
                                                            Simpan
                                                        </button>
                                                    </center>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                </div>
                                
                            </form>
                        </div>
                      <!-- #END# Exportable Table -->
                    </div>
                </div>
            </div>

<script>
        function hanyaAngka(evt) {//START CODING LOCK NUMBER IN TEXTBOX
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }//END CODING LOCK NUMBER IN TEXTBOX

        function validate() {
          var element = document.getElementById('nama');
          element.value = element.value.replace(/[^a-zA-Z0-9@]+/, '');
        };

    $('#tgl').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>

<script>

    $(document).ready(function () {

        // biayaJasaAuto();
        copytextbox();

        $('#tgl_po').datepicker({//'#date_from, #date_out'
            dateFormat: 'yy-mm-dd'
        });

        $("#addrow").click(function () {
            var trCount = $("#tabledata tr").length;
            var no = trCount - 1;
            var row = trCount - 2;

            trO = "<tr>";
            col0 = "<td>" + no + "</td>";
            col1 = "<td><select id='idbarang-" + row + "' name='detail["+row+"][sku]' class='combo form-control'></select></td>";
            col2 = "<td><input type='text' id='namasparepart-" + row + "' name='detail["+row+"][nama_sparepart]' class='form-control' readonly/></td>";
            col3 = "<td><input type='text' id='harga-" + row + "' name='harga"+row+"' class='form-control' disabled/></td>";
            col4 = "<td><input type='text' id='qty-" + row + "' name='detail["+row+"][qty]' onkeypress='return hanyaAngka(event)' class='form-control sum'/></td>";
            // col5 = "<td><input type='text' id='jumlahbeli-" + row + "' name='detail["+row+"][jumlahbeli]' class='form-control'/></td>";
            col6 = "<td><input type='text' id='total-" + row + "' name='detail["+row+"][total_harga]' class='form-control sumtotal' readonly/></td>";
            col7 = "<td><button type='submit' id='delete-" + row + "' class='btn btn-default rowdel'>delete</button></td>";
            trC = "</tr>";

            th = trO + col0 + col1 + col2 + col3 + col4 + col6 + col7 + trC;//+ col5
            $("#tabledata tbody").append(th);

            $(".rowdel").click(function () {
                var tr = $(this).parent().parent();//tr
                tr.remove();
                calculate();
            });

            fillCombo(row);
            return false;
        });
    });

    function fillCombo(row) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('PO/getSparepart') ?>",
            dataType: "json",
            success: function (data) {
                $('#idbarang-' + row).empty();
                $('#idbarang-' + row)
                    .append("<option value=''>-</option");
                $.each(data, function (key, value) {
                    $('#idbarang-' + row)
                        .append("<option value='" + value.sku + "'>"
                            + value.sku +"</option>");
                });
            }
        });
    }

    $(document).delegate(".combo", "change", function () {
        var value = $(this).val();
        var id = $(this).attr('id');
        id = id.split("-")[1];

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Trx/getDetailSparepart') ?>/" + value,
            dataType: "json",
            success: function (value) {
                $("#namasparepart-"+id).val(value[0].nama_sparepart);
                $("#harga-"+id).val(value[0].harga);
            }

        });
    });

    $(document).delegate("#idpel", "change", function () {
        var value = $(this).val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url('cpelanggan/getPelanggan') ?>/" + value,
            dataType: "json",
            success: function (value, status) {
                $("#namapel").val(value[0].namapel), $("#alamatpel").val(value[0].alamatpel);

            }

        });
    });

    $(document).delegate(".sum", "blur", function () {
        var value = $(this).val();
        var id = $(this).attr("id");
        var rows = id.split("-");
        var row = rows[1];

        var cost = $("#harga-" + row).val();
        var amount = cost * value;

        $("#total-" + row).val(amount);
        calculate();
    });

    // $('.sum').blur(function(){
    //     var id = $(this).attr('id');
    //     id = id.split('-')[1];
    //     var qty = $(this).val();
    //     var price = $('#harga-'+id).val();
    //     var total = (qty * price);
    //     $('#total-'+id).val();
    // })

    function calculate() {
        var biayaJasa = document.getElementById("biaya_jasa").value;
        // var IDbiayaJasa = document.getElementById("biaya_jasa");
        var sum = 0;
        var total = 0;
        var nol = 0;
        $(".sumtotal").each(function () {
            //add only if the value is number
            var value = $(this).val();
            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
            // if(biayaJasa == ''){
            //     // total = sum += parseFloat(nol);
            //     nol = 0;
            // }
            // else if(biayaJasa != '' || biayaJasa >= 0){
            //     // total = sum += parseFloat(biayaJasa);
            //     nol = biayaJasa;
            // }
            // else{
            //     nol = 200;
            // }
            // $("#total").val(sum+=parseFloat(nol));
        });
        if(biayaJasa == ''){
            nol = 0;
        }
        else if(biayaJasa != '' || biayaJasa >= 0){
            nol = biayaJasa;
        }
        else{
            nol = 200;
        }
        // $("#addrow").click(function () {

        // });
        // if(biayaJasa != '' || biayaJasa >= 0){

        // }else{

        // }
        $("#total").val(sum+=parseFloat(nol));
    }

    function biayaJasaAuto(){
        var biayaJasa = document.getElementById("biaya_jasa").value;
        var nol = 0;
        if(biayaJasa == '' || biayaJasa == 0){
            $("#total").val(nol);
        }else if(biayaJasa != '' || biayaJasa >= 0){
            $("#total").val(biayaJasa);
        }else{
            calculate();
        }
    }

    function copytextbox() {
        var add = document.getElementById("addrow");
        // var nol = 0;
        // document.getElementById('txtSecond').value = document.getElementById('txtFirst').value;
        // add.onclick = function(){
        //     var Total = calculate();
        // }
        document.getElementById('total').value = document.getElementById('biaya_jasa').value;
    }
</script>

<script>

    
</script>

<?php $this->load->view('Tamplates/footer');?>

