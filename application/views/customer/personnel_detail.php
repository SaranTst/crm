        <form id="personnel-detail">
          <?php 
          $data_personnel = array();
          if (isset($datas) && !empty($datas)) {
            if ($datas['status']==1) {
              $data_personnel = $datas['data'][0]['personnel_detail'];
            }
          }

          $size_personnel = sizeof($data_personnel);
          if ($size_personnel>0) {
            foreach ($data_personnel as $k_personnel => $val_personnel) { 
          ?>
          <div class="jumbotron jumbotron-fluid p-3" id="dom-personnel-<?php echo ($k_personnel+1); ?>">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="ajax_delete_personnel(<?php echo $val_personnel['ID'].','.($k_personnel+1); ?>)"></i></div>
                <div class="col-md-7">
                  <h3 id="id-jumbotron-personnel"><?php echo ($k_personnel+1); ?>.</h3>
                  <input type="hidden" class="form-control" name="personnel_detail[<?php echo ($k_personnel); ?>][id_colum]" value="<?php echo $val_personnel['ID']; ?>" readonly>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-5 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][relationship]">
                        <option value="" selected readonly hidden>Choose Relationship</option>
                        <?php foreach (ARR_RELATIONSHIP as $key => $value) { ?>
                        <option value="<?php echo $value; ?>" <?php echo $val_personnel['RELATIONSHIP']==$value ? 'selected' : ''; ?>><?php echo $value; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo sizeof($data_personnel)>0&&$val_personnel['IMAGE'] ?  base_url().$val_personnel['IMAGE'] : base_url().'images/180.png'; ?>" id="preview-personnel-<?php echo ($k_personnel+1); ?>" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="hidden" class="form-control" name="personnel_detail[<?php echo ($k_personnel); ?>][old_img_personnel]" value="<?php echo $val_personnel['IMAGE']; ?>" readonly>
                        <input type="text" class="form-control" placeholder="Upload Image" name="personnel_detail[<?php echo ($k_personnel); ?>][img_personnel]" id="show-file-name-personnel-<?php echo ($k_personnel+1); ?>" value="<?php echo $val_personnel['IMAGE']; ?>" readonly>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-personnel-<?php echo ($k_personnel+1); ?>" type="file" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-personnel-<?php echo ($k_personnel+1); ?>" onclick="upload_and_preview_ajax('input-file-personnel-<?php echo ($k_personnel+1); ?>' ,'show-file-name-personnel-<?php echo ($k_personnel+1); ?>' ,'preview-personnel-<?php echo ($k_personnel+1); ?>')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][prefix]">
                          <option value="" selected readonly hidden>Choose Prefix</option>
                          <?php foreach (ARR_PREFIX_TH as $key => $value) { ?>
                          <option value="<?php echo $key; ?>" <?php echo $val_personnel['PREFIX']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Position</label>
                        <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][position]">
                        <option value="" selected readonly hidden>Select a Position</option>
                        <?php foreach (ARR_POSITION as $key => $value) { 

                          $selected=$val_personnel['POSITION_ID']==$key ? "selected" : "";
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
                    <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="personnel_detail[<?php echo ($k_personnel); ?>][name_surname_th]" value="<?php echo $val_personnel['FIRST_NAME_TH'].' '.$val_personnel['LAST_NAME_TH']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="personnel_detail[<?php echo ($k_personnel); ?>][name_surname_eng]" value="<?php echo $val_personnel['FIRST_NAME_ENG'].' '.$val_personnel['LAST_NAME_ENG']; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="personnel_detail[<?php echo ($k_personnel); ?>][e_mail]" value="<?php echo $val_personnel['EMAIL']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel.</label>
                    <input type="text" class="form-control" placeholder="Tel." name="personnel_detail[<?php echo ($k_personnel); ?>][tel]" value="<?php echo $val_personnel['TELEPHONE']; ?>" maxlength="10">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="personnel_detail[<?php echo ($k_personnel); ?>][date_birthday]" id="date-birthday-<?php echo ($k_personnel+1); ?>" value="<?php echo $val_personnel['BIRTHDAY']; ?>" autocomplete="off">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Gender</label>
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][gender]">
                      <option value="" selected readonly hidden>Choose Gender</option>
                      <?php foreach (ARR_GENDER_TH as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['GENDER']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Salesperson</label>
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][salesperson]">
                      <option value="" selected readonly hidden>Choose Salesperson</option>
                      <?php foreach ($sales as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['SALES_ID']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Channal</label>
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][contact_channal]">
                      <option value="" selected readonly hidden>Choose Contact Channal</option>
                      <?php foreach (ARR_CONTACT_CHANNAL as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['CONTACT_CHANNAL']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" class="form-control" placeholder="Event" name="personnel_detail[<?php echo ($k_personnel); ?>][event]" value="<?php echo $val_personnel['EVENT']; ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <label>Date Stamp</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="personnel_detail[<?php echo ($k_personnel); ?>][date_stamp]" id="date-stamp-<?php echo ($k_personnel+1); ?>" value="<?php echo $val_personnel['DATE_STAMP']; ?>" autocomplete="off">
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
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][brands]">
                      <option value="" selected readonly hidden>Choose Brands</option>
                      <?php foreach ($brands as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['BRANDS_ID']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Model</label>
                    <input type="text" class="form-control" placeholder="Model" name="personnel_detail[<?php echo ($k_personnel); ?>][model]" value="<?php echo $val_personnel['MODEL']; ?>">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][status]">
                      <option value="" selected readonly hidden>Choose Status</option>
                      <?php foreach (ARR_STATUS_TH as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['STATUS']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confident (%)</label>
                    <select class="custom-select" name="personnel_detail[<?php echo ($k_personnel); ?>][confident]">
                      <option value="" selected readonly hidden>Choose Confident</option>
                      <?php foreach (ARR_CONFIDENT as $key => $value) { ?>
                      <option value="<?php echo $key; ?>" <?php echo $val_personnel['CONFIDENT']==$key ? 'selected' : ''; ?>><?php echo $value; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" class="form-control" placeholder="Remarks" name="personnel_detail[<?php echo ($k_personnel); ?>][remarks]" value="<?php echo $val_personnel['REMARKS']; ?>">
                  </div>
                </div>
              </div>

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
          <?php }
          }else{ ?>
          <div class="jumbotron jumbotron-fluid p-3" id="dom-personnel-1">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2"><i class="fa fa-times fa-2x float-right mb-3" data-toggle="tooltip" data-placement="top" title="Delete" onclick="$('#dom-personnel-1').remove();"></i></div>
                <div class="col-md-7">
                  <h3 id="id-jumbotron-personnel">1.</h3>
                  <input type="hidden" class="form-control" name="personnel_detail[0][id_colum]" value="" readonly>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-5 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="personnel_detail[0][relationship]">
                        <option value="" selected readonly hidden>Choose Relationship</option>
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
                          <option value="" selected readonly hidden>Choose Prefix</option>
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
                          if (!empty(ARR_POSITION_OPTGROUP[$key])) {
                            echo '<optgroup label="'.ARR_POSITION_OPTGROUP[$key].'">';
                            echo '<option value="'.$key.'">'.$value.'</option>';
                          }else{
                            echo '<option value="'.$key.'">'.$value.'</option>';
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
                    <input type="text" class="form-control" placeholder="Tel." name="personnel_detail[0][tel]" maxlength="10">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="personnel_detail[0][date_birthday]" id="date-birthday-1" autocomplete="off">
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
                      <option value="" selected readonly hidden>Choose Gender</option>
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
                      <option value="" selected readonly hidden>Choose Contact Channal</option>
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
                      <input type="text" class="form-control" name="personnel_detail[0][date_stamp]" id="date-stamp-1" autocomplete="off">
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
                      <option value="" selected readonly hidden>Choose Status</option>
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
                      <option value="" selected readonly hidden>Choose Confident</option>
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

            </div>
          </div> <!-- .jumbotron jumbotron-fluid p-3 -->
          <?php } ?>
        </form>

        <div class="row">
          <div class="col">
            <div class="form-group row">
              <!-- Left column -->
              <div class="col-md-10"></div>
              <!-- Right column -->
              <div class="col-md-2">
                <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block" id="add_content_personnel_detail"><i class="fa fa-plus fa-fw fa-lg"></i></a>
              </div>
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
        </div> <!-- End Button Save -->

  <script type="text/javascript">

    var size_personnel = <?php echo $size_personnel; ?>;

    $(document).ready(function(){

      for (var i = 1; i <= size_personnel; i++){
        $('#date-birthday-'+i).datepicker({
          format: "yyyy-mm-dd",
          language: "th",
          autoclose: true
        })

        $('#date-stamp-'+i).datepicker({
          format: "yyyy-mm-dd",
          language: "th",
          autoclose: true
        })
      }

      /* Add Dom PERSONNEL DETAIL */
      $('#add_content_personnel_detail').click(function(){

        // Clone Dom
        var clone_dom_personnel = $("form#personnel-detail").last().clone();

        // Edit Dom
        var id_dom_personnel = clone_dom_personnel.find('.jumbotron.jumbotron-fluid.p-3').last().attr('id').substring(14);
        var new_id_dom_personnel = parseInt(id_dom_personnel) + 1;
        var key_arr_dom_personnel = parseInt(id_dom_personnel) - 1;
        var new_key_arr_dom_personnel = key_arr_dom_personnel + 1;

        clone_dom_personnel.find('#dom-personnel-'+id_dom_personnel).attr('id', 'dom-personnel-'+new_id_dom_personnel);
        clone_dom_personnel.find('#id-jumbotron-personnel').text(new_id_dom_personnel+'.');

        // Remove Value Input Box
        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][img_personnel]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][img_personnel]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][old_img_personnel]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][old_img_personnel]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][name_surname_th]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][name_surname_th]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][name_surname_eng]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][name_surname_eng]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][e_mail]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][e_mail]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][tel]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][tel]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][event]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][event]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][model]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][model]');

        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][remarks]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][remarks]');


        // Remove Value Select Box
        clone_dom_personnel.find('select option:selected').removeAttr('selected'); // remove all selected in select

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][relationship]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][relationship]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][prefix]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][prefix]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][position]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][position]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][gender]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][gender]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][salesperson]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][salesperson]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][contact_channal]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][contact_channal]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][brands]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][brands]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][status]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][status]');

        clone_dom_personnel.find('select[name="personnel_detail['+key_arr_dom_personnel+'][confident]"]').attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][confident]');



        clone_dom_personnel.find('#date-birthday-'+id_dom_personnel).val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][date_birthday]').attr('id', 'date-birthday-'+new_id_dom_personnel);

        clone_dom_personnel.find('#date-stamp-'+id_dom_personnel).val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][date_stamp]').attr('id', 'date-stamp-'+new_id_dom_personnel);

        clone_dom_personnel.find('.fa.fa-times').attr('onclick', "$('#dom-personnel-"+new_id_dom_personnel+"').remove();");
        clone_dom_personnel.find('input[name="personnel_detail['+key_arr_dom_personnel+'][id_colum]"]').val("").attr('name', 'personnel_detail['+new_key_arr_dom_personnel+'][id_colum]');

        // Edit Box Upload Image
        clone_dom_personnel.find('#input-file-personnel-'+id_dom_personnel).attr('id', 'input-file-personnel-'+new_id_dom_personnel);
        clone_dom_personnel.find('#show-file-name-personnel-'+id_dom_personnel).attr('id', 'show-file-name-personnel-'+new_id_dom_personnel);
         clone_dom_personnel.find('#preview-personnel-'+id_dom_personnel).attr('id', 'preview-personnel-'+new_id_dom_personnel).attr('src', base_url+'images/180.png');
        clone_dom_personnel.find('#btn-upload-file-personnel-'+id_dom_personnel).attr('onclick', "upload_and_preview_ajax('input-file-personnel-"+new_id_dom_personnel+"' ,'show-file-name-personnel-"+new_id_dom_personnel+"' ,'preview-personnel-"+new_id_dom_personnel+"')").attr('id', 'btn-upload-file-personnel-'+new_id_dom_personnel);

        // Appent Dom
        clone_dom_personnel.children().last().appendTo("form#personnel-detail");

        // Datepicker New Dom
        $('#date-birthday-'+new_id_dom_personnel).datepicker({
          format: "yyyy-mm-dd",
          language: "th",
          autoclose: true
        })

        // Datepicker New Dom
        $('#date-stamp-'+new_id_dom_personnel).datepicker({
          format: "yyyy-mm-dd",
          language: "th",
          autoclose: true
        })

      });


      $('#save-customer').click(function(e) {
        var url = base_url+'api/customers_personnel/update_customers_personnel/'+id_customer;
        var formDataAjax = {};
        formDataArrPersonnel = $("form#personnel-detail").serializeArray();
        for (var i = 0; i < formDataArrPersonnel.length; i++){
          if (formDataArrPersonnel[i]['value']) {
            formDataAjax[formDataArrPersonnel[i]['name']] = formDataArrPersonnel[i]['value'];
          }
        }
        formDataAjax['user_create'] = ID_LOGIN;
        
        if (formDataAjax) {
          // Modal Process
          Swal.fire({
            title: 'แก้ไขข้อมูล',
            html: 'กำลังบันทึกข้อมูล กรุณารอสักครู่ !!! <b></b>',
            allowOutsideClick: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
              Swal.showLoading()
            },
          })

          setTimeout(function(){
            $.ajax({
              url: url,
              type:"POST",
              data: formDataAjax,
              dataType:"json",
              success: function( resp ){
                
                if (resp.status==1) {
                  Swal.fire({
                    title: 'Success!',
                    text: 'บันทึก / แก้ไข ข้อมูลเรียบร้อย',
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
          }, 2000);
        }
       

      });

    });

    function ajax_delete_personnel(id, id_dom) {

      Swal.fire({
        title: 'Are you sure?',
        text: "คุณต้องการลบข้อมูลนี้ใช่หรือไม่",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes',
        cancelButtonText: 'No',
      }).then((result) => {
        if (typeof result.dismiss === "undefined") {

          var url = base_url+'api/customers_personnel/delete_customers_personnel/'+id;
          var formData = {};
          formData['user_delete'] = ID_LOGIN;

          $.ajax({
            url: url,
            type:"POST",
            data: formData,
            dataType:"json",
              success: function( resp ){

              if (resp.status==1) {

                Swal.fire({
                  type: 'success',
                  title: resp.message,
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000
                })
                $('#dom-personnel-'+id_dom).remove();
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
      })
    }

  </script>