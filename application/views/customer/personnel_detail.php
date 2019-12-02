        <form id="personnel-detail">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-7">
                  <!-- <h3 id="id-jumbotron-personnel">1.</h3> -->
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-5 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="personnel_detail[0][relationship]">
                        <option value="" selected disabled hidden>Choose Relationship</option>
                        <?php foreach (ARR_RELATIONSHIP as $key => $value) { ?>
                        <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-personnel-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="personnel_detail[0][old_img_personnel]" value="" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="personnel_detail[0][img_personnel]" id="show-file-name-personnel-1" value="" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-personnel-1" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-personnel-1" onclick="upload_and_preview_ajax('input-file-personnel-1' ,'show-file-name-personnel-1' ,'preview-personnel-1')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="personnel_detail[0][prefix]">
                          <option value="" selected disabled hidden>Choose Prefix</option>
                          <?php foreach (ARR_PREFIX_TH as $key => $value) { ?>
                          <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="personnel_detail[0][position]">
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
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="personnel_detail[0][name_surname_th]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="personnel_detail[0][name_surname_eng]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="personnel_detail[0][e_mail]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel.</label>
                    <input type="text" class="form-control" placeholder="Tel." name="personnel_detail[0][tel]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="personnel_detail[0][date_birthday]" id="date-birthday">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="custom-select" name="personnel_detail[0][gender]">
                      <option value="" selected disabled hidden>Choose Gender</option>
                      <?php foreach (ARR_GENDER_TH as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Salesperson</label>
                    <select class="custom-select" name="personnel_detail[0][salesperson]">
                      <option value="" selected readonly hidden>Choose Salesperson</option>
                      <?php foreach ($sales as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Channal</label>
                    <select class="custom-select" name="personnel_detail[0][contact_channal]">
                      <option value="" selected disabled hidden>Choose Contact Channal</option>
                      <?php foreach (ARR_CONTACT_CHANNAL as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" class="form-control" placeholder="Event" name="personnel_detail[0][event]">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Date Stamp</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="personnel_detail[0][date_stamp]" id="date-stamp">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brands</label>
                    <select class="custom-select" name="personnel_detail[0][brands]">
                      <option value="" selected readonly hidden>Choose Brands</option>
                      <?php foreach ($brands as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" placeholder="Model" name="personnel_detail[0][model]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select" name="personnel_detail[0][status]">
                      <option value="" selected disabled hidden>Choose Status</option>
                      <?php foreach (ARR_STATUS_TH as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confident (%)</label>
                    <select class="custom-select" name="personnel_detail[0][confident]">
                      <option value="" selected disabled hidden>Choose Confident</option>
                      <?php foreach (ARR_CONFIDENT as $key => $value) { ?>
                      <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" placeholder="Remarks" name="personnel_detail[0][remarks]">
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- <div class="col-md-3"></div>
                <div class="col-md-3 mb-2 text-right">
                  <a href="javascript:void(0)" class="btn crm-btn-gray btn-lg btn-block"><p>Add Name</p></a>
                </div>
                <div class="col-md-3 mb-2">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block"><p>SAVE</p></a>
                </div>
                <div class="col-md-3"></div> -->
                <div class="col-md-4"></div> 
                <div class="col-md-4 mb-3 text-center">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="save-customer"><p>SAVE</p></a>
                </div>
                <div class="col-md-4"></div> 
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
        </form>

  <script type="text/javascript">

    $('#date-birthday').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

    $('#date-stamp').datepicker({
      format: "yyyy-mm-dd",
      language: "th",
      autoclose: true
    })

  </script>