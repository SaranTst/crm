        <form id="personnel-detail">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-7">
                  <h3 id="id-jumbotron-personnel">1.</h3>
                </div>
                <div class="col-md-5">
                  <div class="form-group row">
                    <label class="col-md-5 col-form-label">Relationship</label>
                    <div class="col">
                      <select class="custom-select" name="personnel_detail[0][relationship]">
                        <option value="" selected>Choose Relationship</option>
                        <option value="1">Relationship 1</option>
                        <option value="2">Relationship 2</option>
                        <option value="3">Relationship 3</option>
                        <option value="4">Relationship 4</option>
                        <option value="5">Relationship 5</option>
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
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-personnel-1" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-personnel-1" type="file" name="personnel_detail[0][img_personnel]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-personnel-1" onclick="upload_and_preview('input-file-personnel-1' ,'show-file-name-personnel-1' ,'preview-personnel-1')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="personnel_detail[0][prefix]">
                          <option value="" selected>Choose Prefix</option>
                          <option value="1">Prefix 1</option>
                          <option value="2">Prefix 2</option>
                          <option value="3">Prefix 3</option>
                          <option value="4">Prefix 4</option>
                          <option value="5">Prefix 5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Position</label>
                        <input type="text" class="form-control" placeholder="Position" name="personnel_detail[0][position]">
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
                      <option value="" selected>Choose Gender</option>
                      <option value="1">Male</option>
                      <option value="2">Female</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Salesperson</label>
                    <input type="text" class="form-control" placeholder="Salesperson" name="personnel_detail[0][salesperson]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact Channal</label>
                    <select class="custom-select" name="personnel_detail[0][contact_channal]">
                      <option value="" selected>Choose Contact Channal</option>
                      <option value="1">Contact Channal 1</option>
                      <option value="2">Contact Channal 2</option>
                      <option value="3">Contact Channal 3</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Event</label>
                    <input type="text" class="form-control" placeholder="Position" name="personnel_detail[0][event]">
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
                      <option value="" selected>Choose Brands</option>
                      <option value="1">Brands 1</option>
                      <option value="2">Brands 2</option>
                      <option value="3">Brands 3</option>
                      <option value="4">Brands 4</option>
                      <option value="5">Brands 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Model</label>
                    <select class="custom-select" name="personnel_detail[0][model]">
                      <option value="" selected>Choose Model</option>
                      <option value="1">Model 1</option>
                      <option value="2">Model 2</option>
                      <option value="3">Model 3</option>
                      <option value="4">Model 4</option>
                      <option value="5">Model 5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select" name="personnel_detail[0][status]">
                      <option value="" selected>Choose Status</option>
                      <option value="1">Status 1</option>
                      <option value="2">Status 2</option>
                      <option value="3">Status 3</option>
                      <option value="4">Status 4</option>
                      <option value="5">Status 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Confident (%)</label>
                    <input type="text" class="form-control" placeholder="Confident (%)" name="personnel_detail[0][confident]">
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
        </form>

  <script type="text/javascript">

    $('#date-birthday').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })

    $('#date-stamp').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })

  </script>