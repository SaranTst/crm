
    <div class="cd-content-wrapper">
    <div class="container-fluid">

   	<div class="row mb-3" id="header-table">
			<div class="col-md-4 pt-2">
			  <a href="javascript:void(0)" class="btn crm-btn-light-green-add-sales btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; Add Sales</a>
			</div>
			<div class="col-md-8"></div>
		</div> <!-- #header-table -->

		<div class="row mb-3">
        <div class="col-md-4">
          <ul class="nav nav-pills nav-pills-add-sales nav-fill flex-column flex-sm-row">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-8"></div>
    </div>

    <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <?php
        $j_status = 1;
        $j_message = '';

        // Cehack Datas
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
        }

        // Check Brand
        if ($brands['status']==1) {
          $data_brand = $brands['data'];
        }else {
          $data_brand = array();
        } ?>
        <form id="add-sales">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data)>0&&$data['IMAGE'] ?  base_url().$data['IMAGE'] : base_url().'images/180.png'; ?>" id="preview-add-sales" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="old_image" value="<?php echo sizeof($data)>0 ? $data['IMAGE'] : ''; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="image" id="show-file-name-add-sales" value="<?php echo sizeof($data)>0 ? $data['IMAGE'] : ''; ?>" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-add-sales" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-add-sales" onclick="upload_and_preview_ajax('input-file-add-sales' ,'show-file-name-add-sales' ,'preview-add-sales')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="prefix">
                          <option value="" selected readonly hidden>Choose Prefix</option>
                          <?php foreach (ARR_PREFIX_TH as $key => $value) { ?>
                          <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['PREFIX']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="ID" name="id_employee" value="<?php echo sizeof($data)>0 ? $data['ID_EMPLOYEE'] : ''; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="name_surname_th" value="<?php echo sizeof($data)>0 ? $data['FIRST_NAME_TH'].' '.$data['LAST_NAME_TH'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="name_surname_eng" value="<?php echo sizeof($data)>0 ? $data['FIRST_NAME_ENG'].' '.$data['LAST_NAME_ENG'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" name="nickname_th" value="<?php echo sizeof($data)>0 ? $data['NICKNAME_TH'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" name="nickname_eng" value="<?php echo sizeof($data)>0 ? $data['NICKNAME_ENG'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="e_mail" value="<?php echo sizeof($data)>0 ? $data['EMAIL'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel.</label>
                    <input type="text" class="form-control" placeholder="Tel." name="telephone" value="<?php echo sizeof($data)>0 ? $data['TELEPHONE'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="birthday" id="date-birthday" value="<?php echo sizeof($data)>0 ? $data['BIRTHDAY'] : ''; ?>" autocomplete="off">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Position</label>
                    <select class="custom-select" name="position_id">
                    <option value="" selected readonly hidden>Select a Position</option>
                    <?php foreach (ARR_POSITION as $key => $value) { 

                      $selected="";
                      sizeof($data)>0 && $data['POSITION_ID']==$key ? $selected="selected" : $selected="";
                      if (!empty(ARR_POSITION_OPTGROUP[$key])) {
                        echo '<optgroup label="'.ARR_POSITION_OPTGROUP[$key].'">';
                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                      }else{
                        echo '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                      }
                    } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="custom-select" name="department_id">
                      <option value="" selected readonly hidden>Choose Department</option>
                      <?php foreach (ARR_DEPARTMENT_ADMIN_SALE as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['DEPARTMENT_ID']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Zone</label>
                    <select class="custom-select" name="zone_id">
                      <option value="" selected readonly hidden>Choose Zone</option>
                      <?php foreach (ARR_ZONE as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['ZONE_ID']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brand</label>
                    <select class="custom-select" name="brand_id">
                      <option value="" selected readonly hidden>Select a Brand</option>
                      <?php foreach ($data_brand as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['BRAND_ID']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-2 text-center">
                  <input type="hidden" class="form-control" name="user_create" value="<?php echo $this->session->userdata("sale")['ID_EMPLOYEE']; ?>">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="insert-sales"><p>SAVE</p></a>
                </div>
                <div class="col-md-4"></div>
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
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

    // if data null show modal alert
    if (j_status==0) {
      Swal.fire({
        title: 'Warning!',
        text: j_message,
        type: 'warning'
      }).then((result) => {
        window.location.href = base_url+'sales';
      })
    }

    $('#date-birthday').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

    $('#insert-sales').click(function(e) {
      var url = base_url+'api/sales/update_sales/'+id;
      var formDataSale = checkForm('add-sales');

      if (formDataSale) {
        $.ajax({
          url: url,
          type:"POST",
          data: formDataSale,
          dataType:"json",
          success: function( resp ){
            if (resp.status==1) {
              Swal.fire({
                title: 'Success!',
                text: resp.message,
                type: 'success'
              }).then((result) => {
                window.location.href = base_url+'sales';
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


    $("input", $("form#add-sales")).on("keyup", function(){
      $(this).removeClass("border border-danger").siblings("small.text-danger").css("display","none");
    })
    $("select", $("form#add-sales")).on("change", function(){
      $(this).removeClass("border border-danger").siblings("small.text-danger").css("display","none");
    })

    function checkForm(idform) {
     $("form#"+idform).removeClass("border border-danger").siblings("small.text-danger").remove();
      var formDataArr = $("form#"+idform).serializeArray();
      var formData = {};
      for (var i = 0; i < formDataArr.length; i++){

        if (formDataArr[i]['value'] || formDataArr[i]['name']=='image' || formDataArr[i]['name']=='old_image') {
          formData[formDataArr[i]['name']] = formDataArr[i]['value'];
        }else{
          $("[name='"+formDataArr[i]['name']+"']").removeClass("border border-danger").siblings("small.text-danger").remove();
          $("[name='"+formDataArr[i]['name']+"']").addClass("border border-danger").parent().last().append('<small class="text-danger" style="display: block;">*กรุณากรอกข้อมูล '+formDataArr[i]['name']+'</small>');
          return false
        }
      }
      return formData;
    }

  });

  </script>