<?php $this->load->view('Tamplates/header');?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb breadcrumb-bg-red">
                  <li class=""><i class="material-icons">library_books</i>
                  <a href="" Target="_blank">Master Data</a>
                  </li>
                  <li class=""><i class="material-icons">library_books</i>
                  <a href="<?php echo base_url().'User' ?>" Target="_blank">User</a>
                  </li>
                  <li class="active"><i class="material-icons">library_books</i>
                  <a href="" Target="_blank">Edit User</a>
                  </li>
              </ol>
            </div>

<?php
        foreach ($header as $row_header) {
            $Vid = $row_header["id"];
            $Vname = $row_header["Name"];
            $Vusername = $row_header["Username"];
            $Vpassword = $row_header["Password"];
            $Vstatus = $row_header["Role"];
        }
?>

            <!-- Advanced Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2> Nama : <u><?php echo @$Vname; ?></u> ||  Username : <u><?php echo @$Vusername; ?></u></h2>
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation" action="<?=base_url("User/edit_user");?>" method="POST">
                                <div class="form-group form-float hide">
                                    <div class="form-line">
                                        <input type="number" class="form-control" id="EditUserID" name="EditUserID" value="<?php echo @$Vid;?>" required readonly="">
                                        <label class="form-label">ID</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="EditUserFirstName" name="EditUserFirstName" value="<?php echo @$Vname;?>" required onkeypress="return /[a-z ]/i.test(event.key)">
                                        <label class="form-label">Nama</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float hide">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="OldUserUsername" name="OldUserUsername" value="<?php echo @$Vusername;?>" required>
                                        <label class="form-label">Username User Old</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" id="EditUserUsername" name="EditUserUsername" value="<?php echo @$Vusername;?>" required>
                                        <label class="form-label">Username User</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control" id="EditUserPasswordOld" name="EditUserPasswordOld" value="<?php echo @$Vpassword;?>" required>
                                        <label class="form-label">Old Password User</label>
                                    </div>
                                    <div class="demo-checkbox">
                                        <input type="checkbox" id="basic_checkbox_2" class="filled-in" onclick="EnableDisableTextBox(this)" />
                                        <label for="basic_checkbox_2">Change Password</label>
                                    </div>
                                    <button type="button" id="showAccessCode" onclick="ShowPassword()" class="btn btn-default waves-effect">
                                      <i class="material-icons">visibility</i>
                                      <span class="icon-name">Show</owspan>
                                    </button>
                                    <button type="button" style="display:none" id="hideAccessCode" onclick="HidePassword()" class="btn btn-default waves-effect">
                                      <i class="material-icons">visibility_off</i>
                                      <span class="icon-name">Hide</owspan>
                                    </button>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line" id="myDIV" style="display: none">
                                        <input type="text" class="form-control" id="EditUserPasswordNew" name="EditUserPasswordNew" value="">
                                        <label class="form-label">New Password User</label>
                                    </div>
                                    <!-- <div class="help-info">Min. 10, Max. 10 characters</div> -->
                                </div>
                                <div class="form-group form-float">
                                    <div class="row clearfix">
                                        <div class="col-sm-3">
                                            <label class="form-label">Status User</label>
                                            <select class="form-control show-tick" id="EditUserStatus" name="EditUserStatus">
                                                <?php 
                                                if($Vstatus == 0){?>
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="0" selected="">Admin Kasir</option>
                                                    <option value="1">Pemilik</option>
                                                    <option value="2">Pelanggan</option>
                                                    <option value="00">Bloked</option>
                                                <?php
                                                }elseif($Vstatus == 1){?>
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="0">Admin Kasir</option>
                                                    <option value="1" selected="">Pemilik</option>
                                                    <option value="2">Pelanggan</option>
                                                    <option value="00">Bloked</option>
                                                <?php
                                                }elseif($Vstatus == 2){?>
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="0">Admin Kasir</option>
                                                    <option value="1">Pemilik</option>
                                                    <option value="2" selected="">Pelanggan</option>
                                                    <option value="00">Bloked</option>
                                                <?php
                                                }elseif($Vstatus == 00){?>
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="0">Admin Kasir</option>
                                                    <option value="1">Pemilik</option>
                                                    <option value="2">Pelanggan</option>
                                                    <option value="00" selected="">Bloked</option>
                                                <?php
                                                }else{?>
                                                    <option value="" selected="">-- Pilih Status --</option>
                                                    <option value="0">Admin Kasir</option>
                                                    <option value="1">Pemilik</option>
                                                    <option value="2">Pelanggan</option>
                                                    <option value="00">Bloked</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary waves-effect" type="submit" name="UpdateUser" id="UpdateUser" value="UpdateUser">Update</button>
                                <a href="<?php echo base_url('User')?>">
                                    <button class="btn btn-danger waves-effect pull-right" type="button">
                                        Back
                                    </button>
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Advanced Validation -->

            <div class="row clearfix">

            </div>
        </div>
    </section>


<script>

    $(document).ready(function(){
        //tampilButtonSubmit();
        //ValidasiPassword();
        DisableOldPass();
    });

        function hanyaAngka(evt) {
          var charCode = (evt.which) ? evt.which : event.keyCode
           if (charCode > 31 && (charCode < 48 || charCode > 57))
 
            return false;
          return true;
        }

      function DisableOldPass(){
        document.getElementById("EditUserPasswordOld").readOnly = true;
      }

    // function ValidasiPassword(){
    //   var fnew = $('#EditUserPasswordOld').val();  
    //   var fconfirm = $('#EditUserPasswordNew').val();
    //     if(fnew==fconfirm){
    //       //document.getElementById("submit").disabled = false;
    //     }else if(fnew != '' && fconfirm==''){

    //     }else if(fnew!=fconfirm){
    //       alert('Password tidak sama, masukkan kembali password yang benar.');
    //       //document.getElementById("submit").disabled = true;
    //     }
    // }

    function hideButtonSubmit(){
      document.getElementById('UpdateUser').style.display = "none"
    }

    function tampilButtonSubmit(){
      document.getElementById('UpdateUser').style.display = "block"
    }

    //add this coding in button submit
    //style="display:none;"
    //add this coding in btton submit

        //START CODING MENAMPILKAN DATA BERDASARKAN NO REFERENCE
          // $('#EditUserUsername').on('input',function(){            
          //       var username=$(this).val();
          //       $.ajax({
          //           type : "POST",
          //           url  : "<?php echo base_url('Actions/cek_edit_user')?>",
          //           dataType : "JSON",
          //           data : {username: username},
          //           cache:false,
          //           success: function(data){
          //               $.each(data,function(username){
          //                   // $('[name="reference_no"]').val(data.Phonenumber);
          //                   // $('[name="parent_outlet"]').val(data.id_outlet);
          //                   if(data.username == username){//Ketika Role = 0 (Admin)
          //                       tampilButtonSubmit();  
          //                   }else if(username == ''){
          //                       tampilButtonSubmit(); 
          //                   }else if(data.username != username){
          //                       hideButtonSubmit();
          //                   }

          //               });
                        
          //           }
          //       });
          //       return false;
          // });
          //END CODING MENAMPILKAN DATA BERDASARKAN NO REFERENCE

      function EnableDisableTextBox(basic_checkbox_2) {
        var EditUserPassword = document.getElementById("EditUserPasswordOld");
        var x = document.getElementById("myDIV");
        EditUserPassword.readOnly = basic_checkbox_2.checked ? false : true;
            var EditUserPassword = document.getElementById("EditUserPasswordOld");
            var x = document.getElementById("myDIV");
            EditUserPassword.readOnly = basic_checkbox_2.checked ? false : true;
            if (!EditUserPassword.readOnly) {
                EditUserPassword.focus();
                x.style.display = "block";
            }else if(EditUserPassword.readOnly){
                x.style.display = "none";
            }
        }

    function ShowPassword()
    {
        if(document.getElementById("EditUserPasswordOld").value!="")
        {
            document.getElementById("EditUserPasswordOld").type="text";
            document.getElementById("showAccessCode").style.display="none";
            document.getElementById("hideAccessCode").style.display="block";
        }
        if(document.getElementById("EditUserPasswordNew").value!="")
        {
            document.getElementById("EditUserPasswordNew").type="text";
            document.getElementById("showAccessCode").style.display="none";
            document.getElementById("hideAccessCode").style.display="block";
        }
    }

    function HidePassword()
    {
        if(document.getElementById("EditUserPasswordOld").type == "text")
        {
            document.getElementById("EditUserPasswordOld").type="password"
            document.getElementById("showAccessCode").style.display="block";
            document.getElementById("hideAccessCode").style.display="none";
        }
        if(document.getElementById("EditUserPasswordNew").type == "text")
        {
            document.getElementById("EditUserPasswordNew").type="password"
            document.getElementById("showAccessCode").style.display="block";
            document.getElementById("hideAccessCode").style.display="none";
        }
    }

</script>

<?php $this->load->view('Tamplates/footer');?>