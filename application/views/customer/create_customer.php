<!-- Add FontAwesome in select -->
<style type="text/css">
  select {
    font-family: 'FontAwesome', 'sans-serif';
    color: red;
  }
</style>

    <div class="cd-content-wrapper">
    <div class="container-fluid">
      <div class="row mb-3" id="header-table">
        <div class="col-md-4">
          <ul class="nav nav-pills">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-2">
          
        </div>
        <div class="col-md-3 pt-2">
          <a href="<?php echo base_url(); ?>customer/more_create_customer" class="btn crm-btn-gray btn-lg btn-block"><i class="fa fa-arrow-right fa-fw"></i><p>&nbsp; More info</p></a>
        </div>
        <div class="col-md-3 pt-2">
          <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="summit-customer"><i class="fa fa-check fa-fw"></i><p>&nbsp; SUMMIT</p></a>
        </div>
      </div>

      <div class="tab-content">
        <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <?php
        $j_status = 1;
        $j_message = '';

        if (isset($datas) && !empty($datas)) {
          if ($datas['status']==1) {
            $data = $datas['data'][0];
          }else{
            $j_status = $datas['status'];
            $j_message = $datas['message'];
            $data = array();
          }
        }else{
          $data = array();
        }?>
        <form id="add-customers">  
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-8">
                  <h3>1.Detail Hospital</h3>
                </div>
                <div class="col-md-4">
                  <div class="form-group row">
                    <label class="col-md-3 col-form-label">Rating</label>
                    <div class="col">
                      <select class="custom-select" name="rating_hospital">
                        <option value="" selected readonly hidden>Choose Rating</option>
                        <?php foreach (ARR_RATING as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" style="font-size: 1em;" <?php echo sizeof($data)>0 && $data['RATING_HOSPITAL']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data)>0&&$data['IMAGE_HOSPITAL'] ?  base_url().$data['IMAGE_HOSPITAL'] : base_url().'images/180.png'; ?>" id="preview-hospital" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="old_image_hospital" value="<?php echo sizeof($data)>0 ? $data['IMAGE_HOSPITAL'] : ''; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="image_hospital" id="show-file-name-hospital" value="<?php echo sizeof($data)>0 ? $data['IMAGE_HOSPITAL'] : ''; ?>" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-hospital" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview_ajax('input-file-hospital' ,'show-file-name-hospital' ,'preview-hospital')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Customer ID</label>
                        <input type="text" class="form-control" placeholder="Customer ID" name="customer_id_hospital" value="<?php echo sizeof($data)>0 ? $data['CUSTOMER_ID_HOSPITAL'] : ''; ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Hospital Name (Thai)</label>
                        <input type="text" class="form-control" placeholder="Hospital Name (Thai)" name="hospital_name_th" value="<?php echo sizeof($data)>0 ? $data['HOSPITAL_NAME_TH'] : ''; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Order amount</label>
                    <input type="text" class="form-control" placeholder="Order amount" name="order_amount_hospital" value="<?php echo sizeof($data)>0 ? $data['ORDER_AMOUNT_HOSPITAL'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Hospital Name (Eng)</label>
                    <input type="text" class="form-control" placeholder="Hospital Name (Eng)" name="hospital_name_eng" value="<?php echo sizeof($data)>0 ? $data['HOSPITAL_NAME_ENG'] : ''; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->

          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <h3>2.Detail Doctor</h3>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="relationship_doctor">
                        <option value="" selected readonly hidden>Choose Relationship</option>
                        <?php foreach (ARR_RELATIONSHIP as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['RELATIONSHIP_DOCTOR']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data)>0&&$data['IMAGE_DOCTOR'] ?  base_url().$data['IMAGE_DOCTOR'] : base_url().'images/180.png'; ?>" id="preview-doctor" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="old_image_doctor" value="<?php echo sizeof($data)>0 ? $data['IMAGE_DOCTOR'] : ''; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="image_doctor" id="show-file-name-doctor" value="<?php echo sizeof($data)>0 ? $data['IMAGE_DOCTOR'] : ''; ?>" readonly>
                        <ul class="mb-4">
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-doctor" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview_ajax('input-file-doctor' ,'show-file-name-doctor' ,'preview-doctor')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ผอ.รพ. Name - Surname</label>
                        <input type="text" class="form-control" placeholder="ผอ.รพ. Name - Surname" name="name_surname_doctor" value="<?php echo sizeof($data)>0 ? $data['NAME_SURNAME_DOCTOR'] : ''; ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" name="e_mail_doctor" value="<?php echo sizeof($data)>0 ? $data['E_MAIL_DOCTOR'] : ''; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="birthday_doctor" id="date-birthday-doctor" value="<?php echo sizeof($data)>0 ? $data['BIRTHDAY_DOCTOR'] : ''; ?>">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel</label>
                    <input type="text" class="form-control" placeholder="Telephone" name="telephone_doctor" value="<?php echo sizeof($data)>0 ? $data['TELEPHONE_DOCTOR'] : ''; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->

          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-7">
                  <h3>3.Detail Purchase</h3>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-4 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="relationship_purchase">
                        <option value="" selected readonly hidden>Choose Relationship</option>
                        <?php foreach (ARR_RELATIONSHIP as $key => $value) { ?>
                        <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['RELATIONSHIP_PURCHASE']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data)>0&&$data['IMAGE_PURCHASE'] ?  base_url().$data['IMAGE_PURCHASE'] : base_url().'images/180.png'; ?>" id="preview-purchase" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="old_image_purchase" value="<?php echo sizeof($data)>0 ? $data['IMAGE_PURCHASE'] : ''; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="image_purchase" id="show-file-name-purchase" value="<?php echo sizeof($data)>0 ? $data['IMAGE_PURCHASE'] : ''; ?>" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-purchase" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" onclick="upload_and_preview_ajax('input-file-purchase' ,'show-file-name-purchase' ,'preview-purchase')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>จัดซื้อ Name - Surname (Thai)</label>
                        <input type="text" class="form-control" placeholder="ผอ.รพ. Name - Surname" name="name_surname_purchase" value="<?php echo sizeof($data)>0 ? $data['NAME_SURNAME_PURCHASE'] : ''; ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>E-mail</label>
                        <input type="text" class="form-control" placeholder="E-mail" name="e_mail_purchase" value="<?php echo sizeof($data)>0 ? $data['E_MAIL_PURCHASE'] : ''; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="birthday_purchase" id="date-birthday-purchase" value="<?php echo sizeof($data)>0 ? $data['BIRTHDAY_PURCHASE'] : ''; ?>">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel</label>
                    <input type="text" class="form-control" placeholder="Telephone" name="telephone_purchase" value="<?php echo sizeof($data)>0 ? $data['TELEPHONE_PURCHASE'] : ''; ?>">
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->

          <input type="hidden" class="form-control" name="user_create" value="<?php echo $this->session->userdata("sale")['ID_EMPLOYEE']; ?>">
        </form>

        </div>
      </div> <!-- .tab-content -->
    </div> <!-- .container-fluid -->
    </div> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->

  <script type="text/javascript">

  var id = '<?php echo sizeof($data)>0 ? $id : ''; ?>';
  var j_status = <?php echo $j_status; ?>;
  var j_message = '<?php echo $j_message; ?>';
    
  $(document).ready(function(){

    console.log(j_status);

    // if data null show modal alert
    if (j_status==0) {
      Swal.fire({
        title: 'Warning!',
        text: j_message,
        type: 'warning'
      }).then((result) => {
        window.location.href = base_url+'customer';
      })
    }

    $('#date-birthday-doctor').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

    $('#date-birthday-purchase').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

    $('#summit-customer').click(function(e) {
      var url = base_url+'api/customers/update_customers/'+id;
      var formDataBrand = checkForm('add-customers');

      if (formDataBrand) {
        $.ajax({
          url: url,
          type:"POST",
          data: formDataBrand,
          dataType:"json",
          success: function( resp ){
            
            if (resp.status==1) {
              Swal.fire({
                title: 'Success!',
                text: resp.message,
                type: 'success'
              }).then((result) => {
                window.location.href = base_url+'customer';
              })
            }else{
              Swal.fire({
                title: 'Warning!',
                text: resp.message,
                type: 'warning'
              })
            }
          },
          error: function( jqXhr, textStatus, errorThrown ){
            Swal.fire({
              title: jqXhr.status,
              text: errorThrown,
              type: 'error'
            })
          }
        });
      }
    });


    $("input", $("form#add-customers")).on("keyup", function(){
      $(this).removeClass("border border-danger").siblings("small.text-danger").css("display","none");
    })
    $("select", $("form#add-customers")).on("change", function(){
      $(this).removeClass("border border-danger").siblings("small.text-danger").css("display","none");
    })

    function checkForm(idform) {
     $("form#"+idform).removeClass("border border-danger").siblings("small.text-danger").remove();
      var formDataArr = $("form#"+idform).serializeArray();
      var formData = {};
      for (var i = 0; i < formDataArr.length; i++){

        if (formDataArr[i]['value'] || formDataArr[i]['name']=='image_hospital' || formDataArr[i]['name']=='old_image_hospital' || formDataArr[i]['name']=='image_doctor' || formDataArr[i]['name']=='old_image_doctor' || formDataArr[i]['name']=='image_purchase' || formDataArr[i]['name']=='old_image_purchase') {
          formData[formDataArr[i]['name']] = formDataArr[i]['value'];
        }else{
          $("[name='"+formDataArr[i]['name']+"']").removeClass("border border-danger").siblings("small.text-danger").remove();
          $("[name='"+formDataArr[i]['name']+"']").addClass("border border-danger").parent().last().append('<small class="text-danger" style="display: block;">*กรุณากรอกข้อมูล '+formDataArr[i]['name']+'</small>');
          $("[name='"+formDataArr[i]['name']+"']").focus();
          return false
        }
      }
      return formData;
    }

  });
  </script>