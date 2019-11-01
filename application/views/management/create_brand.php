
    <div class="cd-content-wrapper">
    <div class="container-fluid">

    <div class="row mb-3" id="header-table">
      <div class="col-md-4 pt-2">
        <a href="javascript:void(0)" class="btn crm-btn-light-green-add-sales btn-lg btn-block no-hover"><i class="fa fa-user fa-fw"></i>&nbsp; Add Brand</a>
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
        <form id="add-brands">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data)>0&&$data['LOGO'] ?  base_url().$data['LOGO'] : base_url().'images/180.png'; ?>" id="preview-add-brands" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="old_image" value="<?php echo sizeof($data)>0 ? $data['LOGO'] : ''; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="image" id="show-file-name-add-brands" value="<?php echo sizeof($data)>0 ? $data['LOGO'] : ''; ?>" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-add-brands" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-add-brands" onclick="upload_and_preview_ajax('input-file-add-brands' ,'show-file-name-add-brands' ,'preview-add-brands')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Vendor Name</label>
                        <input type="text" class="form-control" placeholder="Vendor Name" name="vendor_name" value="<?php echo sizeof($data)>0 ? $data['VENDOR_NAME'] : ''; ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>County</label>
                        <input type="text" class="form-control" placeholder="County" name="county" value="<?php echo sizeof($data)>0 ? $data['COUNTY'] : ''; ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Team</label>
                    <input type="text" class="form-control" placeholder="Team" name="team" value="<?php echo sizeof($data)>0 ? $data['TEAM'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Expertise</label>
                    <select class="custom-select" name="expertise">
                      <option value="" selected readonly hidden>Choose Expertise</option>
                      <?php foreach (ARR_EXPERTISE as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo sizeof($data)>0 && $data['EXPERTISE']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Solution/Equipment</label>
                    <input type="text" class="form-control" placeholder="Solution Equipment" name="solution_equipment" value="<?php echo sizeof($data)>0 ? $data['SOLUTION_EQUIPMENT'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo sizeof($data)>0 ? $data['ADDRESS'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Website</label>
                    <input type="text" class="form-control" placeholder="Website" name="website" value="<?php echo sizeof($data)>0 ? $data['WEBSITE'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Person RA</label>
                    <input type="text" class="form-control" placeholder="Contact Person RA" name="contact_person_ra" value="<?php echo sizeof($data)>0 ? $data['CONTACT_PERSON_RA'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Inter Support</label>
                    <input type="text" class="form-control" placeholder="Contact Inter Support" name="contact_inter_support" value="<?php echo sizeof($data)>0 ? $data['CONTACT_INTER_SUPPORT'] : ''; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Manufacturing</label>
                    <input type="text" class="form-control" placeholder="Manufacturing" name="manufacturing" value="<?php echo sizeof($data)>0 ? $data['MANUFACTURING'] : ''; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-2 text-center">
                  <input type="hidden" class="form-control" name="user_create" value="<?php echo $this->session->userdata("sale")['ID_SALE']; ?>">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="insert-brands"><p>SAVE</p></a>
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
        window.location.href = base_url+'management';
      })
    }

    $('#insert-brands').click(function(e) {
      var url = base_url+'api/brands/update_brands/'+id;
      var formDataBrand = checkForm('add-brands');

      if (formDataBrand) {
        $.ajax({
          url: url,
          type:"POST",
          data: formDataBrand,
          dataType:"json",
          success: function( resp ){
            console.log(resp)
            if (resp.status==1) {
              Swal.fire({
                title: 'Success!',
                text: resp.message,
                type: 'success'
              }).then((result) => {
                window.location.href = base_url+'management';
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


    $("input", $("form#add-brands")).on("keyup", function(){
      $(this).removeClass("border border-danger").siblings("small.text-danger").css("display","none");
    })
    $("select", $("form#add-brands")).on("change", function(){
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