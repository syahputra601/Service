<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
              <ol class="breadcrumb breadcrumb-bg-red">
                  <li><a href="javascript:void(0);"><i class="material-icons">home</i> SPK Sparepart</a></li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="javascript:void(0);">Hasil Perangkingan</a>
                  </li>
              </ol>
            </div>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                SPK Oli Terbaik Untuk di Stok Lebih Banyak
                            </h2>
                        </div>
                        <div class="body">
                            <div style="height: 100%;">
                                <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                    <table border="1" style="width: 100%; height: 100%:">
                                        <tr>
                                            <td colspan="9" style="text-align: center;">
                                                <h4>HITUNG MATRIKS PERBANDINGAN KRITERIA</h4>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>KRITERIA</td>
                                            <td>SISA STOK</td>
                                            <td>PENJUALAN</td>
                                            <td>MERK</td>
                                            <td colspan="3">NILAI EIGEN</td>
                                            <td>JUMLAH</td>
                                            <td>RATA-RATA</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>SISA STOK</td>
                                            <td>
                                                <input type="text" class="form-control" name="ss_ss" id="ss_ss" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)" value="1" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ss" id="p_ss" placeholder="3" onkeypress="return /[0-9.]/i.test(event.key)" value="3" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ss" id="m_ss" placeholder="8" onkeypress="return /[0-9.]/i.test(event.key)" value="8" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_ss_1" id="ne1_ss_1" placeholder="0.68" readonly value="0.6858710562414266118">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_ss_1" id="ne2_ss_1" placeholder="0.69" readonly value="0.69236095084237249019">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_ss_1" id="ne3_ss_1" placeholder="0.66" readonly value="0.66666666666666666667">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_ss_1" id="j_ss_1" placeholder="2.04" readonly value="2.04489867375046576866">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_ss_1" id="rr_ss_1" placeholder="1" readonly value="0.68163289125015525622">
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>PENJUALAN</td>
                                            <td>
                                                <input type="text" class="form-control" name="ss_p" id="ss_p" placeholder="0.33" onkeypress="return /[0-9.]/i.test(event.key)" value="0.333" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_p" id="p_p" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)" value="1" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_p" id="m_p" placeholder="3" onkeypress="return /[0-9.]/i.test(event.key)" value="3" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_p_2" id="ne1_p_2" placeholder="0.22" readonly value="0.22839506172839506173">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_p_2" id="ne2_p_2" placeholder="0.23" readonly value="0.2307869836141241634">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_p_2" id="ne3_p_2" placeholder="0.25" readonly value="0.25">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_p_2" id="j_p_2" placeholder="0.70" readonly value="0.70918204534251922513">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_p_2" id="rr_p_2" placeholder="0.23" readonly value="0.23639401511417307504">
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>MERK</td>
                                            <td>
                                                <input type="text" class="form-control" name="ss_m" id="ss_m" placeholder="0.12" onkeypress="return /[0-9.]/i.test(event.key)" value="0.125" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_m" id="p_m" placeholder="0.33" onkeypress="return /[0-9.]/i.test(event.key)" value="0.333" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_m" id="m_m" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)" value="1" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_m_3" id="ne1_m_3" placeholder="0.08" readonly value="0.08573388203017832647">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_m_3" id="ne2_m_3" placeholder="0.07" readonly value="0.07685206554350334641">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_m_3" id="ne3_m_3" placeholder="0.08" readonly value="0.08333333333333333333">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_m_3" id="j_m_3" placeholder="0.24" readonly value="0.24591928090701500621">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_m_3" id="rr_m_3" placeholder="0.08" readonly value="0.08197309363567166874">
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>
                                                <div style="color: red;">JUMLAH</div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ss_j" id="ss_j" placeholder="1.458" readonly value="1.458">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_j" id="p_j" placeholder="4.33" readonly value="4.333">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_j" id="m_j" placeholder="12" readonly value="12">
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_j" id="rr_j" placeholder="1" readonly value="1">
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 40%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td>
                                                <label>LAMDA MAX</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td style="width: 37%;">
                                                <input type="text" class="form-control" name="lamda_max_tbl1" id="lamda_max_tbl1" placeholder="3.00" readonly value="3.00179315">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CI</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="ci_tbl1" id="ci_tbl1" placeholder="0.001" readonly value="0.00089658">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CR</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="cr_tbl1" id="cr_tbl1" placeholder="0.003" readonly value="0.00154583">
                                            </td>
                                        </tr>
                                    </table>
                                    <div style="display: none;">
                                       <table border="0" style="width: 50%; height: 100%;">
                                            <tr style="height: 20px;"></tr>
                                            <tr>
                                                <td style="width: 10%;">
                                                    <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_jml_tbl1" name="hitung_jml_tbl1">Hitung Jumlah</button>
                                                </td>
                                                <td style="width: 3%;">
                                                    <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                                </td>
                                                <td style="width: 10%;">
                                                    <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ne_tbl1" name="hitung_ne_tbl1">Hitung Nilai Eigen</button>
                                                </td>
                                                <td style="width: 3%;">
                                                    <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                                </td>
                                                <td style="width: 10%;">
                                                    <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_j_rr_tbl1" name="hitung_j_rr_tbl1">Hitung Jumlah & Rata-Rata</button>
                                                </td>
                                                <td style="width: 3%;">
                                                    <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                                </td>
                                                <td style="width: 10%;">
                                                    <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_rr_tbl1" name="hitung_rr_tbl1">Hitung Rata-Rata</button>
                                                </td>
                                                <td style="width: 3%;">
                                                    <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                                </td>
                                                <td style="width: 10%;">
                                                    <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ci_cr_tbl1" name="hitung_ci_cr_tbl1">Hitung CI & CR</button>
                                                </td>
                                            </tr>
                                        </table> 
                                    </div>
                                    
                                    <!-- <table style="width: 55%;" border="0">
                                        <tr style="height: 50px;"></tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                    Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table> -->
                                </form>
                            </div>
                            <div style="height: 65px;"></div>
                            <div style="height: 100%;">
                                <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                    <table border="1" style="width: 100%; height: 100%:">
                                        <tr>
                                            <td colspan="9" style="text-align: center;">
                                                <h4>MATRIKS PERBANDINGAN ALTERNATIF "SISA STOK"</h4>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>SISA STOK</td>
                                            <td>YAMALUBE</td>
                                            <td>AHM</td>
                                            <td>SHELL</td>
                                            <td colspan="3">NILAI EIGEN</td>
                                            <td>JUMLAH</td>
                                            <td>RATA-RATA</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>YAMALUBE</td>
                                            <td>
                                                <input type="text" class="form-control" name="yml_yml" id="yml_yml" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ahm_yml2" id="ahm_yml" placeholder="0.5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="shl_yml" id="shl_yml" placeholder="3" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_yml_1" id="ne1_yml_1" placeholder="0.30" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_yml_1" id="ne2_yml_1" placeholder="0.29" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_yml_1" id="ne3_yml_1" placeholder="0.33" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_yml_1" id="j_yml_1" placeholder="0.92" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_yml_1" id="rr_yml_1" placeholder="0.30" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>AHM</td>
                                            <td>
                                                <input type="text" class="form-control" name="yml_ahm" id="yml_ahm" placeholder="2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ahm_ahm" id="ahm_ahm" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="shl_ahm" id="shl_ahm" placeholder="5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_ahm_2" id="ne1_ahm_2" placeholder="0.60" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_ahm_2" id="ne2_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_ahm_2" id="ne3_ahm_2" placeholder="0.55" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_ahm_2" id="j_ahm_2" placeholder="1.74" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_ahm_2" id="rr_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>SHELL</td>
                                            <td>
                                                <input type="text" class="form-control" name="yml_shl" id="yml_shl" placeholder="0.33" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ahm_shl" id="ahm_shl" placeholder="0.2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="shl_shl" id="shl_shl" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne1_shl_3" id="ne1_shl_3" placeholder="0.09" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne2_shl_3" id="ne2_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ne3_shl_3" id="ne3_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="j_shl_3" id="j_shl_3" placeholder="0.32" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_shl_3" id="rr_shl_3" placeholder="0.10" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>
                                                <div style="color: red;">JUMLAH</div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="yml_j" id="yml_j" placeholder="3.333" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="ahm_j" id="ahm_j" placeholder="1.7" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="shl_j" id="shl_j" placeholder="9" readonly>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_j2" id="rr_j2" placeholder="1" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 40%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td>
                                                <label>LAMDA MAX</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td style="width: 37%;">
                                                <input type="text" class="form-control" name="lamda_max_tbl2" id="lamda_max_tbl2" placeholder="3.06857" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CI</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="ci_tbl2" id="ci_tbl2" placeholder="0.03428" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CR</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="cr_tbl2" id="cr_tbl2" placeholder="0.05912" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 50%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_jml_tbl2" name="hitung_jml_tbl2">Hitung Jumlah</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ne_tbl2" name="hitung_ne_tbl2">Hitung Nilai Eigen</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_j_rr_tbl2" name="hitung_j_rr_tbl2">Hitung Jumlah & Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_rr_tbl2" name="hitung_rr_tbl2">Hitung Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ci_cr_tbl2" name="hitung_ci_cr_tbl2">Hitung CI & CR</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <table style="width: 55%;" border="0">
                                        <tr style="height: 50px;"></tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                    Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table> -->
                                </form>
                            </div>
                            <div style="height: 65px;"></div>
                            <div style="height: 100%;">
                                <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                    <table border="1" style="width: 100%; height: 100%:">
                                        <tr>
                                            <td colspan="9" style="text-align: center;">
                                                <h4>MATRIKS PERBANDINGAN ALTERNATIF "PENJUALAN"</h4>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>PENJUALAN</td>
                                            <td>YAMALUBE</td>
                                            <td>AHM</td>
                                            <td>SHELL</td>
                                            <td colspan="3">NILAI EIGEN</td>
                                            <td>JUMLAH</td>
                                            <td>RATA-RATA</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>YAMALUBE</td>
                                            <td>
                                                <input type="text" class="form-control" name="p_yml_yml" id="p_yml_yml" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ahm_yml" id="p_ahm_yml" placeholder="0.5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_shl_yml" id="p_shl_yml" placeholder="3" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne1_yml_1" id="p_ne1_yml_1" placeholder="0.30" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne2_yml_1" id="p_ne2_yml_1" placeholder="0.29" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne3_yml_1" id="p_ne3_yml_1" placeholder="0.33" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_j_yml_1" id="p_j_yml_1" placeholder="0.92" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_rr_yml_1" id="p_rr_yml_1" placeholder="0.30" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>AHM</td>
                                            <td>
                                                <input type="text" class="form-control" name="p_yml_ahm" id="p_yml_ahm" placeholder="2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ahm_ahm" id="p_ahm_ahm" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_shl_ahm" id="p_shl_ahm" placeholder="5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne1_ahm_2" id="p_ne1_ahm_2" placeholder="0.60" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne2_ahm_2" id="p_ne2_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne3_ahm_2" id="p_ne3_ahm_2" placeholder="0.55" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_j_ahm_2" id="p_j_ahm_2" placeholder="1.74" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_rr_ahm_2" id="p_rr_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>SHELL</td>
                                            <td>
                                                <input type="text" class="form-control" name="p_yml_shl" id="p_yml_shl" placeholder="0.33" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ahm_shl" id="p_ahm_shl" placeholder="0.2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_shl_shl" id="p_shl_shl" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne1_shl_3" id="p_ne1_shl_3" placeholder="0.09" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne2_shl_3" id="p_ne2_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ne3_shl_3" id="p_ne3_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_j_shl_3" id="p_j_shl_3" placeholder="0.32" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_rr_shl_3" id="p_rr_shl_3" placeholder="0.10" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>
                                                <div style="color: red;">JUMLAH</div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_yml_j" id="p_yml_j" placeholder="3.333" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_ahm_j" id="p_ahm_j" placeholder="1.7" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="p_shl_j" id="p_shl_j" placeholder="9" readonly>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_j3" id="rr_j3" placeholder="1" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 40%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td>
                                                <label>LAMDA MAX</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td style="width: 37%;">
                                                <input type="text" class="form-control" name="lamda_max_tbl3" id="lamda_max_tbl3" placeholder="3.06857" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CI</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="ci_tbl3" id="ci_tbl3" placeholder="0.03428" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CR</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="cr_tbl3" id="cr_tbl3" placeholder="0.05912" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 50%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_jml_tbl3" name="hitung_jml_tbl3">Hitung Jumlah</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ne_tbl3" name="hitung_ne_tbl3">Hitung Nilai Eigen</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_j_rr_tbl3" name="hitung_j_rr_tbl3">Hitung Jumlah & Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_rr_tbl3" name="hitung_rr_tbl3">Hitung Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ci_cr_tbl3" name="hitung_ci_cr_tbl3">Hitung CI & CR</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <table style="width: 55%;" border="0">
                                        <tr style="height: 50px;"></tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                    Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table> -->
                                </form>
                            </div>
                            <div style="height: 65px;"></div>
                            <div style="height: 100%;">
                                <form id="" action="<?php echo @$url_save; ?>" method="POST">
                                    <table border="1" style="width: 100%; height: 100%:">
                                        <tr>
                                            <td colspan="9" style="text-align: center;">
                                                <h4>MATRIKS PERBANDINGAN ALTERNATIF "MERK"</h4>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>MERK</td>
                                            <td>YAMALUBE</td>
                                            <td>AHM</td>
                                            <td>SHELL</td>
                                            <td colspan="3">NILAI EIGEN</td>
                                            <td>JUMLAH</td>
                                            <td>RATA-RATA</td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>YAMALUBE</td>
                                            <td>
                                                <input type="text" class="form-control" name="m_yml_yml" id="m_yml_yml" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ahm_yml" id="m_ahm_yml" placeholder="0.5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_shl_yml" id="m_shl_yml" placeholder="3" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne1_yml_1" id="m_ne1_yml_1" placeholder="0.30" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne2_yml_1" id="m_ne2_yml_1" placeholder="0.29" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne3_yml_1" id="m_ne3_yml_1" placeholder="0.33" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_j_yml_1" id="m_j_yml_1" placeholder="0.92" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_rr_yml_1" id="m_rr_yml_1" placeholder="0.30" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>AHM</td>
                                            <td>
                                                <input type="text" class="form-control" name="m_yml_ahm" id="m_yml_ahm" placeholder="2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ahm_ahm" id="m_ahm_ahm" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_shl_ahm" id="m_shl_ahm" placeholder="5" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne1_ahm_2" id="m_ne1_ahm_2" placeholder="0.60" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne2_ahm_2" id="m_ne2_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne3_ahm_2" id="m_ne3_ahm_2" placeholder="0.55" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_j_ahm_2" id="m_j_ahm_2" placeholder="1.74" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_rr_ahm_2" id="m_rr_ahm_2" placeholder="0.58" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>SHELL</td>
                                            <td>
                                                <input type="text" class="form-control" name="m_yml_shl" id="m_yml_shl" placeholder="0.33" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ahm_shl" id="m_ahm_shl" placeholder="0.2" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_shl_shl" id="m_shl_shl" placeholder="1" onkeypress="return /[0-9.]/i.test(event.key)">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne1_shl_3" id="m_ne1_shl_3" placeholder="0.09" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne2_shl_3" id="m_ne2_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ne3_shl_3" id="m_ne3_shl_3" placeholder="0.11" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_j_shl_3" id="m_j_shl_3" placeholder="0.32" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_rr_shl_3" id="m_rr_shl_3" placeholder="0.10" readonly>
                                            </td>
                                        </tr>
                                        <tr style="text-align: center;">
                                            <td>
                                                <div style="color: red;">JUMLAH</div>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_yml_j" id="m_yml_j" placeholder="3.333" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_ahm_j" id="m_ahm_j" placeholder="1.7" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="m_shl_j" id="m_shl_j" placeholder="9" readonly>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="text" class="form-control" name="rr_j4" id="rr_j4" placeholder="1" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 40%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td>
                                                <label>LAMDA MAX</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td style="width: 37%;">
                                                <input type="text" class="form-control" name="lamda_max_tbl4" id="lamda_max_tbl4" placeholder="3.06857" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CI</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="ci_tbl4" id="ci_tbl4" placeholder="0.03428" readonly>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <label>CR</label>
                                            </td>
                                            <td><center>:</center></td>
                                            <td>
                                                <input type="text" class="form-control" name="cr_tbl4" id="cr_tbl4" placeholder="0.05912" readonly>
                                            </td>
                                        </tr>
                                    </table>
                                    <table border="0" style="width: 50%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_jml_tbl4" name="hitung_jml_tbl4">Hitung Jumlah</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ne_tbl4" name="hitung_ne_tbl4">Hitung Nilai Eigen</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_j_rr_tbl4" name="hitung_j_rr_tbl4">Hitung Jumlah & Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_rr_tbl4" name="hitung_rr_tbl4">Hitung Rata-Rata</button>
                                            </td>
                                            <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_ci_cr_tbl4" name="hitung_ci_cr_tbl4">Hitung CI & CR</button>
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- <table style="width: 55%;" border="0">
                                        <tr style="height: 50px;"></tr>
                                        <tr>
                                            <td>
                                                <button class="btn btn-primary waves-effect pull-left" type="submit">
                                                    Simpan
                                                </button>
                                            </td>
                                        </tr>
                                    </table> -->
                                </form>
                            </div>
                            <div style="height: 65px;"></div>
                            <form>
                                <table border="1" style="width: 40%; height: 100%;">
                                    <tr style="height: 20px;"></tr>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">
                                            <h4>PERANGKINGAN</h4>
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>
                                            <label>YAMALUBE</label>
                                        </td>
                                        <td><center>:</center></td>
                                        <td style="width: 37%;">
                                            <input type="text" class="form-control" name="pr_yml" id="pr_yml" placeholder="3.2458" readonly>
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>
                                            <label>AHM</label>
                                        </td>
                                        <td><center>:</center></td>
                                        <td>
                                            <input type="text" class="form-control" name="pr_ahm" id="pr_ahm" placeholder="0.5064" readonly>
                                        </td>
                                    </tr>
                                    <tr style="text-align: center;">
                                        <td>
                                            <label>SHELL</label>
                                        </td>
                                        <td><center>:</center></td>
                                        <td>
                                            <input type="text" class="form-control" name="pr_shl" id="pr_shl" placeholder="0.2478" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <!-- <label>SHELL</label> -->
                                        </td>
                                        <td><center></center></td>
                                        <td>
                                            <input type="text" class="form-control" name="hs_pr" id="hs_pr" placeholder="1.0000" readonly>
                                        </td>
                                    </tr>
                                </table>
                                <table border="0" style="width: 50%; height: 100%;">
                                        <tr style="height: 20px;"></tr>
                                        <tr>
                                            <td style="width: 10%;">
                                                <button class="btn btn-default waves-effect pull-left" type="button" id="hitung_pr" name="hitung_pr">Hitung Perangkingan</button>
                                            </td>
                                            <!-- <td style="width: 3%;">
                                                <div class="demo-google-material-icon"> <i class="material-icons">arrow_forward</i></div>
                                            </td> -->
                                        </tr>
                                    </table>
                            </form>
                            <div style="height: 65px;"></div>
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

    $('#tgl_penitipan, #tgl_ambil').datepicker({//'#date_from, #date_out'
        dateFormat: 'yy-mm-dd'
    });

</script>
<script type="text/javascript">
  $(document).ready(function(){
    // cek();
  });
</script>
<script type="text/javascript">
  var target=document.getElementById("ss_ss");
  var isi_target = $("#ss_ss").val()
  var batas_karakter=1;
  function cek(){
    // jika jumlah karakter yg diketikkan lebih dari atau sama dengan 100
    if(target.value.length > batas_karakter ){
    //disable textarea
    // target.readOnly=true;
    //memberikan warna merah pada text pemberitahuan
    // document.getElementById("notif").style.color="red";
    // menampilkan pemberitahuan 
    // document.getElementById("notif").innerHTML="Maksimal 1 Karakter! Dan hanya angka antara 1 - 9 !";
    alert("Maksimal Hanya 1");
    }
    if(target.value == 0){
    //memberikan warna merah pada text pemberitahuan
    // document.getElementById("notif").style.color="red";
    // menampilkan pemberitahuan 
    // document.getElementById("notif").innerHTML="Tidak boleh input angka 0 !" + target.value;
    alert("Maksimal Hanya 2");
    }
    //jika tidak 
else{
    alert("Maksimal Hanya 13");
    //hitung jumlah karakter yg sudah diketikkan
    var jumlah_karakter=target.value.length;
    // untuk mengetahui jumlah karakter yg tersisa, maka batas_karakter dikurangi karakter yg telah diketikkan
    var sisa=batas_karakter-jumlah_karakter;
    // tampilkan pemberitahuan berapa karakter lagi yg tersisa
    // document.getElementById("notif").innerHTML=sisa+" Karakter tersisa !";
    // target.readOnly=true;
    }
}
</script>
<script type='text/javascript' src="<?php echo base_url();?>asset/js/big/big.js"></script>
<script type='text/javascript' src="<?php echo base_url();?>asset/js/big/big.min.js"></script>
<script>
    //START TABEL 1
    $("#hitung_jml_tbl1").click(function () {
            // console.log("Test");
            var ss_ss = document.getElementById('ss_ss').value;
            var ss_p = document.getElementById('ss_p').value;
            var ss_m = document.getElementById('ss_m').value;
            var p_ss = document.getElementById('p_ss').value;
            var p_p = document.getElementById('p_p').value;
            var p_m = document.getElementById('p_m').value;
            var m_ss = document.getElementById('m_ss').value;
            var m_p = document.getElementById('m_p').value;
            var m_m = document.getElementById('m_m').value;
            var a = new Big(ss_ss);
            var b = new Big(ss_p);
            var c = new Big(ss_m);
            
            var d = new Big(p_ss);
            var e = new Big(p_p);
            var f = new Big(p_m);
            
            var g = new Big(m_ss);
            var h = new Big(m_p);
            var i = new Big(m_m);
            // var total;
            // total = parseInt(ss_ss) + parseInt(ss_p) + parseInt(ss_m)
            // hasil = total.toFixed(4);
            hitung_j_ss = a.plus(b).plus(c);
            hitung_j_p = d.plus(e).plus(f);
            hitung_j_m = g.plus(h).plus(i);
            // hitung_2 = a.plus(hit);
            document.getElementById('ss_j').value = hitung_j_ss;
            document.getElementById('p_j').value = hitung_j_p;
            document.getElementById('m_j').value = hitung_j_m;
    });
    $("#hitung_ne_tbl1").click(function () {
        var ss_ss = document.getElementById('ss_ss').value;
        var ss_p = document.getElementById('ss_p').value;
        var ss_m = document.getElementById('ss_m').value;
        var p_ss = document.getElementById('p_ss').value;
        var p_p = document.getElementById('p_p').value;
        var p_m = document.getElementById('p_m').value;
        var m_ss = document.getElementById('m_ss').value;
        var m_p = document.getElementById('m_p').value;
        var m_m = document.getElementById('m_m').value;

        var ss_j = document.getElementById('ss_j').value;
        var p_j = document.getElementById('p_j').value
        var m_j = document.getElementById('m_j').value

        var a = new Big(ss_ss);
        var b = new Big(ss_p);
        var c = new Big(ss_m);
            
        var d = new Big(p_ss);
        var e = new Big(p_p);
        var f = new Big(p_m);
        
        var g = new Big(m_ss);
        var h = new Big(m_p);
        var i = new Big(m_m);

        var big_ss_j = new Big(ss_j);
        var big_p_j = new Big(p_j);
        var big_m_j = new Big(m_j);

        document.getElementById('ne1_ss_1').value = a.div(big_ss_j);
        document.getElementById('ne1_p_2').value = b.div(big_ss_j);
        document.getElementById('ne1_m_3').value = c.div(big_ss_j);
        document.getElementById('ne2_ss_1').value = d.div(big_p_j);
        document.getElementById('ne2_p_2').value = e.div(big_p_j);
        document.getElementById('ne2_m_3').value = f.div(big_p_j);
        document.getElementById('ne3_ss_1').value = g.div(big_m_j);
        document.getElementById('ne3_p_2').value = h.div(big_m_j);
        document.getElementById('ne3_m_3').value = i.div(big_m_j);
    });
    $("#hitung_j_rr_tbl1").click(function () {
        var ne1_ss_1 = document.getElementById('ne1_ss_1').value;
        var ne1_p_2 = document.getElementById('ne1_p_2').value;
        var ne1_m_3 = document.getElementById('ne1_m_3').value;
        var ne2_ss_1 = document.getElementById('ne2_ss_1').value;
        var ne2_p_2 = document.getElementById('ne2_p_2').value;
        var ne2_m_3 = document.getElementById('ne2_m_3').value;
        var ne3_ss_1 = document.getElementById('ne3_ss_1').value; 
        var ne3_p_2 = document.getElementById('ne3_p_2').value;
        var ne3_m_3 = document.getElementById('ne3_m_3').value;

        var a = new Big(ne1_ss_1);
        var b = new Big(ne1_p_2);
        var c = new Big(ne1_m_3);

        var d = new Big(ne3_ss_1);
        var e = new Big(ne3_p_2);
        var f = new Big(ne3_m_3);

        var d2 = new Big(ne2_ss_1);
        var e2 = new Big(ne2_p_2);
        var f2 = new Big(ne2_m_3);

        document.getElementById('j_ss_1').value = a.plus(d).plus(d2);
        document.getElementById('j_p_2').value = b.plus(e).plus(e2);
        document.getElementById('j_m_3').value = c.plus(f).plus(f2);

        var j_ss_1 = document.getElementById('j_ss_1').value;
        var j_p_2 = document.getElementById('j_p_2').value;
        var j_m_3 = document.getElementById('j_m_3').value;

        var g = new Big(j_ss_1);
        var h = new Big(j_p_2);
        var i = new Big(j_m_3);

        document.getElementById('rr_ss_1').value = g.div(3);
        document.getElementById('rr_p_2').value = h.div(3);
        document.getElementById('rr_m_3').value = i.div(3);     
    });
    $("#hitung_rr_tbl1").click(function () {
        var rr_ss_1 = document.getElementById('rr_ss_1').value;
        var rr_p_2 = document.getElementById('rr_p_2').value;
        var rr_m_3 = document.getElementById('rr_m_3').value;

        var a = new Big(rr_ss_1);
        var b = new Big(rr_p_2);
        var c = new Big(rr_m_3);

        document.getElementById('rr_j').value = a.plus(b).plus(c);
    });
    $("#hitung_ci_cr_tbl1").click(function () {
        var ss_j = document.getElementById('ss_j').value;
        var rr_ss_1 = document.getElementById('rr_ss_1').value;

        var a = new Big(ss_j);
        var b = new Big(rr_ss_1);
        ab = a.times(b);

        var p_j = document.getElementById('p_j').value;
        var rr_p_2 = document.getElementById('rr_p_2').value;

        var c = new Big(p_j);
        var d = new Big(rr_p_2);
        cd = c.times(d);

        var m_j = document.getElementById('m_j').value;
        var rr_m_3 = document.getElementById('rr_m_3').value;

        var e = new Big(m_j);
        var f = new Big(rr_m_3);
        ef = e.times(f);

        lamda = ab.plus(cd).plus(ef);
        lamda_fix = lamda.toFixed(8);
        document.getElementById('lamda_max_tbl1').value = lamda_fix;

        var lamda_max = document.getElementById('lamda_max_tbl1').value;

        var lm = new Big(lamda_max);
        var n = new Big(3);
        kurang1 = lm.minus(n);
        kurang2 =  n.minus(1);
        ci = kurang1.div(kurang2);
        ci_fix = ci.toFixed(8);

        document.getElementById('ci_tbl1').value = ci_fix;

        var ci_tbl = document.getElementById('ci_tbl1').value;
        var tbl_ci = new Big(ci_tbl);
        var fix_ci = new Big(ci_fix);
        cr = fix_ci.div(0.58);
        cr_fix = cr.toFixed(8);

        document.getElementById('cr_tbl1').value = cr_fix;
    });
    //END TABEL 1
    //START TABEL 2
    $("#hitung_jml_tbl2").click(function () {
        // console.log("Test");
        var yml_yml = document.getElementById('yml_yml').value;
        var yml_ahm = document.getElementById('yml_ahm').value;
        var yml_shl = document.getElementById('yml_shl').value;
        var ahm_yml = document.getElementById('ahm_yml').value;
        var ahm_ahm = document.getElementById('ahm_ahm').value;
        var ahm_shl = document.getElementById('ahm_shl').value;
        var shl_yml = document.getElementById('shl_yml').value;
        var shl_ahm = document.getElementById('shl_ahm').value;
        var shl_shl = document.getElementById('shl_shl').value;

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);
        // var total;
        // total = parseInt(ss_ss) + parseInt(ss_p) + parseInt(ss_m)
        // hasil = total.toFixed(4);
        hitung_j_yml = a.plus(b).plus(c);
        hitung_j_ahm = d.plus(e).plus(f);
        hitung_j_shl = g.plus(h).plus(i);
        // hitung_2 = a.plus(hit);
        document.getElementById('yml_j').value = hitung_j_yml;
        document.getElementById('ahm_j').value = hitung_j_ahm;
        document.getElementById('shl_j').value = hitung_j_shl;
    });
    $("#hitung_ne_tbl2").click(function () {
        var yml_yml = document.getElementById('yml_yml').value;
        var yml_ahm = document.getElementById('yml_ahm').value;
        var yml_shl = document.getElementById('yml_shl').value;
        var ahm_yml = document.getElementById('ahm_yml').value;
        var ahm_ahm = document.getElementById('ahm_ahm').value;
        var ahm_shl = document.getElementById('ahm_shl').value;
        var shl_yml = document.getElementById('shl_yml').value;
        var shl_ahm = document.getElementById('shl_ahm').value;
        var shl_shl = document.getElementById('shl_shl').value;

        var yml_j = document.getElementById('yml_j').value;
        var ahm_j = document.getElementById('ahm_j').value
        var shl_j = document.getElementById('shl_j').value

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);

        var big_yml_j = new Big(yml_j);
        var big_ahm_j = new Big(ahm_j);
        var big_shl_j = new Big(shl_j);

        document.getElementById('ne1_yml_1').value = a.div(big_yml_j);
        document.getElementById('ne1_ahm_2').value = b.div(big_yml_j);
        document.getElementById('ne1_shl_3').value = c.div(big_yml_j);
        document.getElementById('ne2_yml_1').value = d.div(big_ahm_j);
        document.getElementById('ne2_ahm_2').value = e.div(big_ahm_j);
        document.getElementById('ne2_shl_3').value = f.div(big_ahm_j);
        document.getElementById('ne3_yml_1').value = g.div(big_shl_j);
        document.getElementById('ne3_ahm_2').value = h.div(big_shl_j);
        document.getElementById('ne3_shl_3').value = i.div(big_shl_j);
    });
    $("#hitung_j_rr_tbl2").click(function () {
        var ne1_yml_1 = document.getElementById('ne1_yml_1').value;
        var ne1_ahm_2 = document.getElementById('ne1_ahm_2').value;
        var ne1_shl_3 = document.getElementById('ne1_shl_3').value;
        var ne2_yml_1 = document.getElementById('ne2_yml_1').value;
        var ne2_ahm_2 = document.getElementById('ne2_ahm_2').value;
        var ne2_shl_3 = document.getElementById('ne2_shl_3').value;
        var ne3_yml_1 = document.getElementById('ne3_yml_1').value; 
        var ne3_ahm_2 = document.getElementById('ne3_ahm_2').value;
        var ne3_shl_3 = document.getElementById('ne3_shl_3').value;

        var a = new Big(ne1_yml_1);
        var b = new Big(ne1_ahm_2);
        var c = new Big(ne1_shl_3);

        var d = new Big(ne3_yml_1);
        var e = new Big(ne3_ahm_2);
        var f = new Big(ne3_shl_3);

        var d2 = new Big(ne2_yml_1);
        var e2 = new Big(ne2_ahm_2);
        var f2 = new Big(ne2_shl_3);

        document.getElementById('j_yml_1').value = a.plus(d).plus(d2);
        document.getElementById('j_ahm_2').value = b.plus(e).plus(e2);
        document.getElementById('j_shl_3').value = c.plus(f).plus(f2);

        var j_yml_1 = document.getElementById('j_yml_1').value;
        var j_ahm_2 = document.getElementById('j_ahm_2').value;
        var j_shl_3 = document.getElementById('j_shl_3').value;

        var g = new Big(j_yml_1);
        var h = new Big(j_ahm_2);
        var i = new Big(j_shl_3);

        document.getElementById('rr_yml_1').value = g.div(3);
        document.getElementById('rr_ahm_2').value = h.div(3);
        document.getElementById('rr_shl_3').value = i.div(3);     
    });
    $("#hitung_rr_tbl2").click(function () {
        var rr_yml_1 = document.getElementById('rr_yml_1').value;
        var rr_ahm_2 = document.getElementById('rr_ahm_2').value;
        var rr_shl_3 = document.getElementById('rr_shl_3').value;

        var a = new Big(rr_yml_1);
        var b = new Big(rr_ahm_2);
        var c = new Big(rr_shl_3);

        document.getElementById('rr_j2').value = a.plus(b).plus(c);
    });
    $("#hitung_ci_cr_tbl2").click(function () {
        var yml_j = document.getElementById('yml_j').value;
        var rr_yml_1 = document.getElementById('rr_yml_1').value;

        var a = new Big(yml_j);
        var b = new Big(rr_yml_1);
        ab = a.times(b);

        var ahm_j = document.getElementById('ahm_j').value;
        var rr_ahm_2 = document.getElementById('rr_ahm_2').value;

        var c = new Big(ahm_j);
        var d = new Big(rr_ahm_2);
        cd = c.times(d);

        var shl_j = document.getElementById('shl_j').value;
        var rr_shl_3 = document.getElementById('rr_shl_3').value;

        var e = new Big(shl_j);
        var f = new Big(rr_shl_3);
        ef = e.times(f);

        lamda = ab.plus(cd).plus(ef);
        lamda_fix = lamda.toFixed(8);
        document.getElementById('lamda_max_tbl2').value = lamda_fix;

        var lamda_max = document.getElementById('lamda_max_tbl2').value;

        var lm = new Big(lamda_max);
        var n = new Big(3);
        kurang1 = lm.minus(n);
        kurang2 =  n.minus(1);
        ci = kurang1.div(kurang2);
        ci_fix = ci.toFixed(8);

        document.getElementById('ci_tbl2').value = ci_fix;

        var ci_tbl = document.getElementById('ci_tbl2').value;
        var tbl_ci = new Big(ci_tbl);
        var fix_ci = new Big(ci_fix);
        cr = fix_ci.div(0.58);
        cr_fix = cr.toFixed(8);

        document.getElementById('cr_tbl2').value = cr_fix;
    });
    //END TABEL 2
    //START TABEL 3
    $("#hitung_jml_tbl3").click(function () {
        // console.log("Test");
        var yml_yml = document.getElementById('p_yml_yml').value;
        var yml_ahm = document.getElementById('p_yml_ahm').value;
        var yml_shl = document.getElementById('p_yml_shl').value;
        var ahm_yml = document.getElementById('p_ahm_yml').value;
        var ahm_ahm = document.getElementById('p_ahm_ahm').value;
        var ahm_shl = document.getElementById('p_ahm_shl').value;
        var shl_yml = document.getElementById('p_shl_yml').value;
        var shl_ahm = document.getElementById('p_shl_ahm').value;
        var shl_shl = document.getElementById('p_shl_shl').value;

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);
        // var total;
        // total = parseInt(ss_ss) + parseInt(ss_p) + parseInt(ss_m)
        // hasil = total.toFixed(4);
        hitung_j_yml = a.plus(b).plus(c);
        hitung_j_ahm = d.plus(e).plus(f);
        hitung_j_shl = g.plus(h).plus(i);
        // hitung_2 = a.plus(hit);
        document.getElementById('p_yml_j').value = hitung_j_yml;
        document.getElementById('p_ahm_j').value = hitung_j_ahm;
        document.getElementById('p_shl_j').value = hitung_j_shl;
    });
    $("#hitung_ne_tbl3").click(function () {
        var yml_yml = document.getElementById('p_yml_yml').value;
        var yml_ahm = document.getElementById('p_yml_ahm').value;
        var yml_shl = document.getElementById('p_yml_shl').value;
        var ahm_yml = document.getElementById('p_ahm_yml').value;
        var ahm_ahm = document.getElementById('p_ahm_ahm').value;
        var ahm_shl = document.getElementById('p_ahm_shl').value;
        var shl_yml = document.getElementById('p_shl_yml').value;
        var shl_ahm = document.getElementById('p_shl_ahm').value;
        var shl_shl = document.getElementById('p_shl_shl').value;

        var yml_j = document.getElementById('p_yml_j').value;
        var ahm_j = document.getElementById('p_ahm_j').value
        var shl_j = document.getElementById('p_shl_j').value

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);

        var big_yml_j = new Big(yml_j);
        var big_ahm_j = new Big(ahm_j);
        var big_shl_j = new Big(shl_j);

        document.getElementById('p_ne1_yml_1').value = a.div(big_yml_j);
        document.getElementById('p_ne1_ahm_2').value = b.div(big_yml_j);
        document.getElementById('p_ne1_shl_3').value = c.div(big_yml_j);
        document.getElementById('p_ne2_yml_1').value = d.div(big_ahm_j);
        document.getElementById('p_ne2_ahm_2').value = e.div(big_ahm_j);
        document.getElementById('p_ne2_shl_3').value = f.div(big_ahm_j);
        document.getElementById('p_ne3_yml_1').value = g.div(big_shl_j);
        document.getElementById('p_ne3_ahm_2').value = h.div(big_shl_j);
        document.getElementById('p_ne3_shl_3').value = i.div(big_shl_j);
    });
    $("#hitung_j_rr_tbl3").click(function () {
        var ne1_yml_1 = document.getElementById('p_ne1_yml_1').value;
        var ne1_ahm_2 = document.getElementById('p_ne1_ahm_2').value;
        var ne1_shl_3 = document.getElementById('p_ne1_shl_3').value;
        var ne2_yml_1 = document.getElementById('p_ne2_yml_1').value;
        var ne2_ahm_2 = document.getElementById('p_ne2_ahm_2').value;
        var ne2_shl_3 = document.getElementById('p_ne2_shl_3').value;
        var ne3_yml_1 = document.getElementById('p_ne3_yml_1').value; 
        var ne3_ahm_2 = document.getElementById('p_ne3_ahm_2').value;
        var ne3_shl_3 = document.getElementById('p_ne3_shl_3').value;

        var a = new Big(ne1_yml_1);
        var b = new Big(ne1_ahm_2);
        var c = new Big(ne1_shl_3);

        var d = new Big(ne3_yml_1);
        var e = new Big(ne3_ahm_2);
        var f = new Big(ne3_shl_3);

        var d2 = new Big(ne2_yml_1);
        var e2 = new Big(ne2_ahm_2);
        var f2 = new Big(ne2_shl_3);

        document.getElementById('p_j_yml_1').value = a.plus(d).plus(d2);
        document.getElementById('p_j_ahm_2').value = b.plus(e).plus(e2);
        document.getElementById('p_j_shl_3').value = c.plus(f).plus(f2);

        var j_yml_1 = document.getElementById('p_j_yml_1').value;
        var j_ahm_2 = document.getElementById('p_j_ahm_2').value;
        var j_shl_3 = document.getElementById('p_j_shl_3').value;

        var g = new Big(j_yml_1);
        var h = new Big(j_ahm_2);
        var i = new Big(j_shl_3);

        document.getElementById('p_rr_yml_1').value = g.div(3);
        document.getElementById('p_rr_ahm_2').value = h.div(3);
        document.getElementById('p_rr_shl_3').value = i.div(3);     
    });
    $("#hitung_rr_tbl3").click(function () {
        var rr_yml_1 = document.getElementById('p_rr_yml_1').value;
        var rr_ahm_2 = document.getElementById('p_rr_ahm_2').value;
        var rr_shl_3 = document.getElementById('p_rr_shl_3').value;

        var a = new Big(rr_yml_1);
        var b = new Big(rr_ahm_2);
        var c = new Big(rr_shl_3);

        document.getElementById('rr_j3').value = a.plus(b).plus(c);
    });
    $("#hitung_ci_cr_tbl3").click(function () {
        var yml_j = document.getElementById('p_yml_j').value;
        var rr_yml_1 = document.getElementById('p_rr_yml_1').value;

        var a = new Big(yml_j);
        var b = new Big(rr_yml_1);
        ab = a.times(b);

        var ahm_j = document.getElementById('p_ahm_j').value;
        var rr_ahm_2 = document.getElementById('p_rr_ahm_2').value;

        var c = new Big(ahm_j);
        var d = new Big(rr_ahm_2);
        cd = c.times(d);

        var shl_j = document.getElementById('p_shl_j').value;
        var rr_shl_3 = document.getElementById('p_rr_shl_3').value;

        var e = new Big(shl_j);
        var f = new Big(rr_shl_3);
        ef = e.times(f);

        lamda = ab.plus(cd).plus(ef);
        lamda_fix = lamda.toFixed(8);
        document.getElementById('lamda_max_tbl3').value = lamda_fix;

        var lamda_max = document.getElementById('lamda_max_tbl3').value;

        var lm = new Big(lamda_max);
        var n = new Big(3);
        kurang1 = lm.minus(n);
        kurang2 =  n.minus(1);
        ci = kurang1.div(kurang2);
        ci_fix = ci.toFixed(8);

        document.getElementById('ci_tbl3').value = ci_fix;

        var ci_tbl = document.getElementById('ci_tbl3').value;
        var tbl_ci = new Big(ci_tbl);
        var fix_ci = new Big(ci_fix);
        cr = fix_ci.div(0.58);
        cr_fix = cr.toFixed(8);

        document.getElementById('cr_tbl3').value = cr_fix;
    });
    //END TABEL 3
    //START TABEL 4
    $("#hitung_jml_tbl4").click(function () {
        // console.log("Test");
        var yml_yml = document.getElementById('m_yml_yml').value;
        var yml_ahm = document.getElementById('m_yml_ahm').value;
        var yml_shl = document.getElementById('m_yml_shl').value;
        var ahm_yml = document.getElementById('m_ahm_yml').value;
        var ahm_ahm = document.getElementById('m_ahm_ahm').value;
        var ahm_shl = document.getElementById('m_ahm_shl').value;
        var shl_yml = document.getElementById('m_shl_yml').value;
        var shl_ahm = document.getElementById('m_shl_ahm').value;
        var shl_shl = document.getElementById('m_shl_shl').value;

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);
        // var total;
        // total = parseInt(ss_ss) + parseInt(ss_p) + parseInt(ss_m)
        // hasil = total.toFixed(4);
        hitung_j_yml = a.plus(b).plus(c);
        hitung_j_ahm = d.plus(e).plus(f);
        hitung_j_shl = g.plus(h).plus(i);
        // hitung_2 = a.plus(hit);
        document.getElementById('m_yml_j').value = hitung_j_yml;
        document.getElementById('m_ahm_j').value = hitung_j_ahm;
        document.getElementById('m_shl_j').value = hitung_j_shl;
    });
    $("#hitung_ne_tbl4").click(function () {
        var yml_yml = document.getElementById('m_yml_yml').value;
        var yml_ahm = document.getElementById('m_yml_ahm').value;
        var yml_shl = document.getElementById('m_yml_shl').value;
        var ahm_yml = document.getElementById('m_ahm_yml').value;
        var ahm_ahm = document.getElementById('m_ahm_ahm').value;
        var ahm_shl = document.getElementById('m_ahm_shl').value;
        var shl_yml = document.getElementById('m_shl_yml').value;
        var shl_ahm = document.getElementById('m_shl_ahm').value;
        var shl_shl = document.getElementById('m_shl_shl').value;

        var yml_j = document.getElementById('m_yml_j').value;
        var ahm_j = document.getElementById('m_ahm_j').value
        var shl_j = document.getElementById('m_shl_j').value

        var a = new Big(yml_yml);
        var b = new Big(yml_ahm);
        var c = new Big(yml_shl);

        var d = new Big(ahm_yml);
        var e = new Big(ahm_ahm);
        var f = new Big(ahm_shl);
        
        var g = new Big(shl_yml);
        var h = new Big(shl_ahm);
        var i = new Big(shl_shl);

        var big_yml_j = new Big(yml_j);
        var big_ahm_j = new Big(ahm_j);
        var big_shl_j = new Big(shl_j);

        document.getElementById('m_ne1_yml_1').value = a.div(big_yml_j);
        document.getElementById('m_ne1_ahm_2').value = b.div(big_yml_j);
        document.getElementById('m_ne1_shl_3').value = c.div(big_yml_j);
        document.getElementById('m_ne2_yml_1').value = d.div(big_ahm_j);
        document.getElementById('m_ne2_ahm_2').value = e.div(big_ahm_j);
        document.getElementById('m_ne2_shl_3').value = f.div(big_ahm_j);
        document.getElementById('m_ne3_yml_1').value = g.div(big_shl_j);
        document.getElementById('m_ne3_ahm_2').value = h.div(big_shl_j);
        document.getElementById('m_ne3_shl_3').value = i.div(big_shl_j);
    });
    $("#hitung_j_rr_tbl4").click(function () {
        var ne1_yml_1 = document.getElementById('m_ne1_yml_1').value;
        var ne1_ahm_2 = document.getElementById('m_ne1_ahm_2').value;
        var ne1_shl_3 = document.getElementById('m_ne1_shl_3').value;
        var ne2_yml_1 = document.getElementById('m_ne2_yml_1').value;
        var ne2_ahm_2 = document.getElementById('m_ne2_ahm_2').value;
        var ne2_shl_3 = document.getElementById('m_ne2_shl_3').value;
        var ne3_yml_1 = document.getElementById('m_ne3_yml_1').value; 
        var ne3_ahm_2 = document.getElementById('m_ne3_ahm_2').value;
        var ne3_shl_3 = document.getElementById('m_ne3_shl_3').value;

        var a = new Big(ne1_yml_1);
        var b = new Big(ne1_ahm_2);
        var c = new Big(ne1_shl_3);

        var d = new Big(ne3_yml_1);
        var e = new Big(ne3_ahm_2);
        var f = new Big(ne3_shl_3);

        var d2 = new Big(ne2_yml_1);
        var e2 = new Big(ne2_ahm_2);
        var f2 = new Big(ne2_shl_3);

        document.getElementById('m_j_yml_1').value = a.plus(d).plus(d2);
        document.getElementById('m_j_ahm_2').value = b.plus(e).plus(e2);
        document.getElementById('m_j_shl_3').value = c.plus(f).plus(f2);

        var j_yml_1 = document.getElementById('m_j_yml_1').value;
        var j_ahm_2 = document.getElementById('m_j_ahm_2').value;
        var j_shl_3 = document.getElementById('m_j_shl_3').value;

        var g = new Big(j_yml_1);
        var h = new Big(j_ahm_2);
        var i = new Big(j_shl_3);

        document.getElementById('m_rr_yml_1').value = g.div(3);
        document.getElementById('m_rr_ahm_2').value = h.div(3);
        document.getElementById('m_rr_shl_3').value = i.div(3);     
    });
    $("#hitung_rr_tbl4").click(function () {
        var rr_yml_1 = document.getElementById('m_rr_yml_1').value;
        var rr_ahm_2 = document.getElementById('m_rr_ahm_2').value;
        var rr_shl_3 = document.getElementById('m_rr_shl_3').value;

        var a = new Big(rr_yml_1);
        var b = new Big(rr_ahm_2);
        var c = new Big(rr_shl_3);

        document.getElementById('rr_j4').value = a.plus(b).plus(c);
    });
    $("#hitung_ci_cr_tbl4").click(function () {
        var yml_j = document.getElementById('m_yml_j').value;
        var rr_yml_1 = document.getElementById('m_rr_yml_1').value;

        var a = new Big(yml_j);
        var b = new Big(rr_yml_1);
        ab = a.times(b);

        var ahm_j = document.getElementById('m_ahm_j').value;
        var rr_ahm_2 = document.getElementById('m_rr_ahm_2').value;

        var c = new Big(ahm_j);
        var d = new Big(rr_ahm_2);
        cd = c.times(d);

        var shl_j = document.getElementById('m_shl_j').value;
        var rr_shl_3 = document.getElementById('m_rr_shl_3').value;

        var e = new Big(shl_j);
        var f = new Big(rr_shl_3);
        ef = e.times(f);

        lamda = ab.plus(cd).plus(ef);
        lamda_fix = lamda.toFixed(8);
        document.getElementById('lamda_max_tbl4').value = lamda_fix;

        var lamda_max = document.getElementById('lamda_max_tbl4').value;

        var lm = new Big(lamda_max);
        var n = new Big(3);
        kurang1 = lm.minus(n);
        kurang2 =  n.minus(1);
        ci = kurang1.div(kurang2);
        ci_fix = ci.toFixed(8);

        document.getElementById('ci_tbl4').value = ci_fix;

        var ci_tbl = document.getElementById('ci_tbl4').value;
        var tbl_ci = new Big(ci_tbl);
        var fix_ci = new Big(ci_fix);
        cr = fix_ci.div(0.58);
        cr_fix = cr.toFixed(8);

        document.getElementById('cr_tbl4').value = cr_fix;
    });
    //END TABEL 4
    //START HITUNG PERANGKINGAN
    $("#hitung_pr").click(function () {
        var rr_ss_1 = document.getElementById('rr_ss_1').value;
        var rr_yml_1 = document.getElementById('rr_yml_1').value;
        var a = new Big(rr_ss_1);
        var b = new Big(rr_yml_1);
        ab = a.times(b);

        var rr_p_2 = document.getElementById('rr_p_2').value;
        var p_rr_yml_1 = document.getElementById('p_rr_yml_1').value;
        var c = new Big(rr_p_2);
        var d = new Big(p_rr_yml_1);
        cd = c.times(d);

        var rr_m_3 = document.getElementById('rr_m_3').value;
        var m_rr_yml_1 = document.getElementById('m_rr_yml_1').value;
        var e = new Big(rr_m_3);
        var f = new Big(m_rr_yml_1);
        ef = e.times(f);

        pr_yml = ab.plus(cd).plus(ef);
        pr_yml_fix = pr_yml.toFixed(4);

        var rr_ss_1_2 = document.getElementById('rr_ss_1').value;
        var rr_ahm_2 = document.getElementById('rr_ahm_2').value;
        var a2 = new Big(rr_ss_1_2);
        var b2 = new Big(rr_ahm_2);
        ab2 = a2.times(b2);

        var rr_p_2_2 = document.getElementById('rr_p_2').value;
        var p_rr_ahm_2 = document.getElementById('p_rr_ahm_2').value;
        var c2 = new Big(rr_p_2_2);
        var d2 = new Big(p_rr_ahm_2);
        cd2 = c2.times(d2);

        var rr_m_3_2 = document.getElementById('rr_m_3').value;
        var m_rr_ahm_2 = document.getElementById('m_rr_ahm_2').value;
        var e2 = new Big(rr_m_3_2);
        var f2 = new Big(m_rr_ahm_2);
        ef2 = e2.times(f2);

        pr_ahm = ab2.plus(cd2).plus(ef2);
        pr_ahm_fix = pr_ahm.toFixed(4);

        var rr_ss_1_3 = document.getElementById('rr_ss_1').value;
        var rr_shl_3 = document.getElementById('rr_shl_3').value;
        var a3 = new Big(rr_ss_1_3);
        var b3 = new Big(rr_shl_3);
        ab3 = a3.times(b3);

        var rr_p_2_3 = document.getElementById('rr_p_2').value;
        var p_rr_shl_3 = document.getElementById('p_rr_shl_3').value;
        var c3 = new Big(rr_p_2_3);
        var d3 = new Big(p_rr_shl_3);
        cd3 = c3.times(d3);

        var rr_m_3_3 = document.getElementById('rr_m_3').value;
        var m_rr_shl_3 = document.getElementById('m_rr_shl_3').value;
        var e3 = new Big(rr_m_3_3);
        var f3 = new Big(m_rr_shl_3);
        ef3 = e3.times(f3);

        pr_shl = ab3.plus(cd3).plus(ef3);
        pr_shl_fix = pr_shl.toFixed(4);

        pr_yml_fix_big = new Big(pr_yml_fix);
        pr_ahm_fix_big = new Big(pr_ahm_fix);
        pr_shl_fix_big = new Big(pr_shl_fix);

        hs_pr = pr_yml_fix_big.plus(pr_ahm_fix_big).plus(pr_shl_fix_big);
        hs_pr_fix = hs_pr.toFixed(4);

        document.getElementById('pr_yml').value = pr_yml_fix;
        document.getElementById('pr_ahm').value = pr_ahm_fix;
        document.getElementById('pr_shl').value = pr_shl_fix;
        document.getElementById('hs_pr').value = hs_pr_fix;
    });
    //END HITUNG PERANGKINGAN
</script>

<?php $this->load->view('Tamplates/footer');?>

