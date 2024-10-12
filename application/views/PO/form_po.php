<?php $this->load->view('Tamplates/header');?>
<style>
    /*.pagination>li:first-child>a{
        width: 76px;
    }
    .pagination>li>a{
        height: 40px;
    }*/

    .select2-container .select2-selection--single{
        /*height: 100px;*/
    }
</style>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> Master Data</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url().'PO/List_po' ?>" Target="_blank">PO</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PO
                            </h2>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#insert" data-toggle="tab">INPUT PO</a></li>
                            </ul>

                            <!-- Tab panes -->
           <div class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="insert">
                <?php 
                // echo @$url_save; 
                ?>
                <form id="form_kepegawaian" method="post" action="<?php echo @$url_save; ?>" enctype="multipart/form-data">
                  <div id="Pegawai_data" name="Pegawai_data">
                    <table>
                        <tr style="height: 10px;"></tr>
                        <tr>
                            <td>
                                <label class="form-label">Nomor PO</label>
                            </td>
                            <td style="width: 50px;" align="center">:</td>
                            <td>
                                <input type="test" class="form-control" name="header[nomor_po]" id="nomor_po" placeholder="Nomor PO" value="<?= @$PO ?>" required="" readonly="">
                            </td>
                            <td></td>
                            <td style="width: 50px;" align="center"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 10px;"></tr>
                        <tr>
                            <td>
                                <label class="form-label">Tanggal PO</label>
                            </td>
                            <td style="width: 50px;" align="center">:</td>
                            <td>
                                <input type="text" class="form-control" name="header[tanggal_po]" id="tgl_po" placeholder="2020-12-22" value="" autofocus="">
                            </td>
                            <td></td>
                            <td style="width: 50px;" align="center"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 10px;"></tr>
                        <tr>
                            <td>
                                <label class="form-label">Nama PO</label>
                            </td>
                            <td style="width: 50px;" align="center">:</td>
                            <td>
                                <input type="text" class="form-control" name="header[nama_po]" id="nama_po" placeholder="Nama PO" value="" onkeypress="return /[a-z ]/i.test(event.key)" required="">
                            </td>
                            <td></td>
                            <td style="width: 50px;" align="center"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 10px;"></tr>
                    </table>
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 3%;">
                                <label class="form-label">Keterangan</label>
                            </td>
                            <td style="width: 5%;" align="center">:</td>
                            <td style="width: 40%;">
                                <textarea rows="4" name="header[keterangan]" id="keterangan" class="form-control no-resize" placeholder="Keterangan ..."required=""></textarea>
                            </td>
                            <td></td>
                            <td style="width: 10%;" align="center"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 10px;"></tr>
                    </table>
                </div>
                  <!-- START CODING BAGIAN FORM LAMA -->
                  <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <button type="button" id="addrow" class="btn btn-default">Tambah</button>
                            <!-- <button type="button" id="show_addrow" class="show_addrow btn btn-default">Show Add Row</button> -->
                            <!-- <button type="button" class="btn btn-danger">Out</button> -->
                            <!-- <button type="button" class="btn bg-red btn-block waves-effect">OUT</button> -->
                            <!-- <table>
                              <tr>
                                <td>
                                  <input type='text' id='datepicker' class='datepicker form-control' placeholder='Please choose a date...'>
                                </td>
                                <td>
                                  <input type='text' id='date_in2' name='date_in2' class='form-control'>
                                </td>
                              </tr>
                            </table> -->
                            
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
                        </div>

                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                  </div>
                <!-- START BAGIAN CODING DIV ELEMENT PEMBANTU -->
                  <div class="form-group" style="display: none;">
                    <input type="text" class="form-control" name="header[created_by]" id="created_by" placeholder="Created By" value="<?= @$created_by ?>">
                  </div>
                <!-- END BAGIAN CODING DIV ELEMENT PEMBANTU -->
                <table style="width: 100%;">
                    <tr>
                        <td style="text-align: right;">
                            <button type="submit" name="save_kepegawaian" value="save_kepegawaian" class="btn btn-primary waves-effect">
                                <i class="material-icons">save</i>
                                <span>Simpan</span>
                            </button>
                        </td>
                    </tr>
                </table>
                </form>
              </div><!-- #END# Exportable Table -->


<script src="<?php echo base_url("assets/js/jquery.min.js"); ?>" type="text/javascript"></script>
<!-- SELECT JS 2 -->
    <script src="<?php echo base_url();?>assets/new/js/select2.min.js"></script>

<script>
        function hanyaAngka(evt) {//START CODING LOCK NUMBER IN TEXTBOX
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }//END CODING LOCK NUMBER IN TEXTBOX

    

</script>

<script>

    $(document).ready(function () {

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
            col4 = "<td><input type='text' id='jumlah-" + row + "' name='detail["+row+"][qty]' onkeypress='return hanyaAngka(event)' class='form-control sum'/></td>";
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
                        .append("<option value='" + value.id_sparepart + "'>"
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
            url: "<?php echo site_url('PO/getDetailSparepart') ?>/" + value,
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
        var sum = 0;
        $(".sumtotal").each(function () {
            //add only if the value is number
            var value = $(this).val();
            if (!isNaN(value) && value.length != 0) {
                sum += parseFloat(value);
            }
            $("#total").val(sum);
        });
    }
</script>

<?php $this->load->view('Tamplates/footer_v2');?>