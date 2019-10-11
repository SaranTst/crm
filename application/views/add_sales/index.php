
    <div class="cd-content-wrapper">
    <div class="container-fluid">

     	<div class="row mb-3" id="header-table">
			<div class="col-md-4 pt-2">
			  <a href="javascript:void(0)" class="btn crm-btn-green btn-lg btn-block"><i class="fa fa-user fa-fw"></i><p>Add Sales</p></a>
			</div>
			<div class="col-md-8"></div>
		</div> <!-- #header-table -->

		<div class="row mb-3">
        <div class="col-md-6">
          <ul class="nav nav-pills nav-pills-add-sales">
            <li class="nav-item p-1">
              <a class="nav-link active" id="GENERAL-tab" data-toggle="tab" href="#GENERAL" role="tab" aria-controls="GENERAL" aria-selected="true">GENERAL DETAIL</a>
            </li>
          </ul>
        </div>
        <div class="col-md-6"></div>
      </div>

      <div class="tab-content">
      <div class="tab-pane fade show active" id="GENERAL" role="tabpanel" aria-labelledby="GENERAL-tab">
        
        <form id="add-sales">
          <div class="jumbotron jumbotron-fluid p-3">
            <div class="container-fluid">
              
              <div class="row">
                <div class="col-md-7">
                  <h3 id="id-jumbotron-add-sales">1.</h3>
                </div>
                <div class="col-md-5"></div>
              </div>

              <div class="row">
                <div class="col-md-3 mb-3">
                  <div class="z-depth-1-half text-center">
                    <img src="<?php echo base_url(); ?>images/180.png" id="preview-add-sales-1" class="img-thumbnail" style="height: 180px;">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Upload Image" id="show-file-name-add-sales-1" disabled>
                        <ul class="mb-4">
                          <li><small class="text-muted">*Maximum Size 1 MB</small></li>
                          <li><small class="text-muted">*Please select the picture first</small></li>
                        </ul>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <input id="input-file-add-sales-1" type="file" name="add_sales[0][img_add_sales]" class="form-control" accept="image/*" style="visibility: hidden; position: absolute;">
                      <button type="button" class="btn crm-btn-gray btn-lg btn-block" style="border-radius: 0;" id="btn-upload-file-add-sales-1" onclick="upload_and_preview('input-file-add-sales-1' ,'show-file-name-add-sales-1' ,'preview-add-sales-1')"><i class="fa fa-upload" style="padding-right: 10px;"></i>Upload Image</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Prefix</label>
                        <select class="custom-select" name="add_sales[0][prefix]">
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
                        <label>ID</label>
                        <input type="text" class="form-control" placeholder="Position" name="add_sales[0][id]">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Thai)" name="add_sales[0][name_surname_th]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Name - Surname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Name - Surname (Eng)" name="add_sales[0][name_surname_eng]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Thai)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Thai)" name="add_sales[0][nickname_th]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nickname (Eng)</label>
                    <input type="text" class="form-control" placeholder="Nickname (Eng)" name="add_sales[0][nickname_eng]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="add_sales[0][e_mail]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Tel.</label>
                    <input type="text" class="form-control" placeholder="Tel." name="add_sales[0][tel]">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <label>Date Birthday</label>
                  <div class="form-group row">
                    <div class="col-10">
                      <input type="text" class="form-control" name="add_sales[0][date_birthday]" id="date-birthday">
                    </div>
                    <div class="col text-center">
                      <i class="fa fa-calendar fa-lg"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Position</label>
                    <select class="custom-select" name="add_sales[0][position]">
                      <option value="" selected>Choose Position</option>
                      <option value="1">Position 1</option>
                      <option value="2">Position 2</option>
                      <option value="3">Position 3</option>
                      <option value="4">Position 4</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="custom-select" name="add_sales[0][department]">
                      <option value="" selected>Choose Department</option>
                      <option value="1">Department 1</option>
                      <option value="2">Department 2</option>
                      <option value="3">Department 3</option>
                      <option value="4">Department 4</option>
                      <option value="5">Department 5</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Zone</label>
                    <select class="custom-select" name="add_sales[0][zone]">
                      <option value="" selected>Choose Zone</option>
                      <option value="1">Zone 1</option>
                      <option value="2">Zone 2</option>
                      <option value="3">Zone 3</option>
                      <option value="4">Zone 4</option>
                      <option value="5">Zone 5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
              	<div class="col-md-6">
                  <div class="form-group">
                    <label>County</label>
                    <input type="text" class="form-control" placeholder="County" name="add_sales[0][county]">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Brand</label>
                    <select class="custom-select" name="add_sales[0][brand]">
                      <option value="" selected>Choose Brand</option>
                      <option value="1">Brand 1</option>
                      <option value="2">Brand 2</option>
                      <option value="3">Brand 3</option>
                      <option value="4">Brand 4</option>
                      <option value="5">Brand 5</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-2 text-center">
                  <a href="javascript:void(0)" class="btn crm-btn-orange btn-lg btn-block"><p>SAVE</p></a>
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

    $('#date-birthday').datepicker({
      format: "dd-mm-yyyy",
      language: "th",
      autoclose: true
    })

  </script>